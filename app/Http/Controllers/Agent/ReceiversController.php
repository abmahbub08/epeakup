<?php

namespace App\Http\Controllers\Agent;

use App\Client;
use App\Receiver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReceiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('agent')->id();
        $receivers = Receiver::orderBy('created_at', 'desc')->where('agent_id', $id)->get();
        return view('agent.receivers.index',compact('receivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::guard('agent')->id();
        $clients = Client::orderBy('created_at','desc')->where('agent_id',$id)->get();

        if($clients->count() == 0)
        {
            return redirect()->route('clients.create')->with('info', "You have to create client first");
        }

        return view('agent.receivers.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'client_name'=>'required|numeric',
            'first_name' => 'required|max:255|string',
            'last_name' => 'required|max:255|string',
            'account_number' => 'required|confirmed|max:13|regex:/(01)[0-9]{9}/',
            'payment_method' => 'required|string|max:100',
            'account_type' => 'nullable|string|max:100',
            'policy' => 'required|max:2',
            'agreement' => 'required|max:2'
        ]);

        Receiver::create([
            'client_id' => $request->client_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'account_number' => $request->account_number,
            'payment_method' => $request->payment_method,
            'account_type' => $request->account_type,
            'agent_id' => $id = Auth::guard('agent')->id(),
        ]);

        return back()->with('success', 'Receiver Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receiver = Receiver::find($id);
        $agent = Auth::guard('agent')->id();
        $clients = Client::orderBy('created_at','desc')->where('agent_id',$agent)->get();
        return view('agent.receivers.edit',compact('clients','receiver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'client_name'=>'required|numeric',
            'first_name' => 'required|max:255|string',
            'last_name' => 'required|max:255|string',
            'account_number' => 'required|confirmed|max:13|regex:/(01)[0-9]{9}/',
            'payment_method' => 'required|string|max:100',
            'account_type' => 'nullable|string|max:100',
            'policy' => 'required|max:2',
            'agreement' => 'required|max:2'
        ]);

        $receiver = Receiver::find($id);
        $receiver->client_id = $request->client_name;
        $receiver->first_name = $request->first_name;
        $receiver->last_name = $request->last_name;
        $receiver->account_number = $request->account_number;
        $receiver->payment_method = $request->payment_method;
        $receiver->account_type = $request->account_type;
        $receiver->agent_id = Auth::guard('agent')->id();
        $receiver->save();

        return redirect()->route('receivers.index')->with('success', 'Receiver Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Receiver::destroy($id);
        return back()->with('success', 'Data deleted successfully');
    }
}
