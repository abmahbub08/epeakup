<?php

namespace App\Http\Controllers\Agent;

use App\Client;
use App\Balance;
use App\Receiver;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    //Show all transaction
    public function index()
    {
        $id = Auth::guard('agent')->user()->id;
        $transactions = Transaction::orderBy('created_at','desc')->where('agent_id', $id)->get();
        return view('agent.transactions.index', compact('transactions'));
    }

    //transfer balance from agent account to recipient
    public function create()
    {
        $id = Auth::guard('agent')->user()->id;
        $clients = Client::where('agent_id', $id)->get();
        //check client have or not
        if ($clients->count() == 0) {
            return redirect()->route('clients.create')->with('info', 'You have to add client information first');
        }
        //check receiver have or not
        $receiver = Receiver::where('agent_id',$id)->get();

        if ($receiver->count() == 0) {
            return redirect()->route('receivers.create')->with('info', 'You have to add receiver information first');
        }
        return view('agent.transactions.create', compact('clients'));
    }

    //store data
    public function store(Request $request)
    {
        $this->validate($request, [
            'sender_name' => 'required|numeric',
            'receiver_name' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);
        #agent id
        $id = Auth::guard('agent')->user()->id;
        //find balance
        $balance = Balance::where('agent_id', $id)->first();
        //check balance
        if ($request->amount > $balance->balance) {
            return back()->with('warning', 'You can send only equal or less then of your Balance');
        }
        //calculate remaining balance
        $remainingBalance = $balance->balance - $request->amount;
        //update balance
        $data = $balance->update(['balance' => $remainingBalance]);
        //store data
        $charge = ($request->payment_method == 'bkash') ? getCharge(1) : getCharge(2);
        Transaction::create([
            'agent_id' => $id,
            'client_id' => $request->sender_name,
            'receiver_id' => $request->receiver_name,
            'amount' => $request->amount*($charge/100)
        ]);
        //redirect to transaction page
        return redirect()->route('agent.transactions')
            ->with('success', 'Your balance successfully transfer');
    }

    //get receiver for client
    public function clientReceiver($id)
    {
        return Receiver::orderBy('created_at', 'desc')->where('client_id',$id)->get();
    }

}
