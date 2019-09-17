<?php

namespace App\Http\Controllers\Agent;

use App\Agent;
use App\Balance;
use App\Client;
use App\Receiver;
use App\TemporaryTransaction;
use App\Transaction;
use GuzzleHttp\Cookie\SetCookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;

class SendMoneyController extends Controller
{
    public function sendMoneyStep($id = 1){


        if (TemporaryTransaction::where('user_id',Auth::guard('agent')->user()->id)->exists())

            return redirect()->route('sendMoneyPreview');

        $data['clients'] = Client::where('agent_id',Auth::guard('agent')->user()->id)->pluck('phone');

        return view('agent.send-money.step1',$data);
    }
    public function sendMoney(Request $request){


        if (Cookie::has('data')){

            return redirect()->route('sendMoneyPreview');
        }else{

            if (1 == decrypt($request->step)){

                $data['details'] = $request->all();
                return view('agent.send-money.step2',$data);
            }

            if (2 == decrypt($request->step)){
                $data['details'] = $request->all();
                $q = '+'.$request->australian_number;
                $user = Client::select( '*' )->where('phone',$q)->first();
                $data['clients'] = Receiver::where('agent_id',Auth::guard('agent')->user()->id);
                if (!empty($user))
                $data['clients'] =$data['clients']->where('client_id',$user->id);
                   $data['clients']=$data['clients']->pluck('account_number');
                return view('agent.send-money.step3',$data);
            }
            if (3 == decrypt($request->step)){
                $data['details'] = $request->all();

                return view('agent.send-money.step4',$data);
            }

            if (4 == decrypt($request->step)){
                $data = $request->all();
                $data['traking_number'] = \Faker\Provider\Uuid::randomNumber();

               $temp = new TemporaryTransaction();
               $temp->user_id = Auth::guard('agent')->user()->id;
               $temp->value = \GuzzleHttp\json_encode($data);
               $temp->save();
                return redirect()->route('sendMoneyPreview');
            }
            return redirect()->route('sendMoneyStep');
        }
    }

    public function resend(Request $request){
       $data = [];
       $tr = Transaction::join('clients','clients.id','transactions.client_id')
           ->join('receivers','receivers.id','transactions.receiver_id')
           ->select(
               'receivers.payment_method',
               DB::raw("CONCAT(clients.first_name,' ', clients.last_name) as sender_name"),
               DB::raw("CONCAT(receivers.first_name,' ', receivers.last_name) as receiver_name"),

               'clients.phone as australian_number',
               'receivers.account_number as receiver_number',
               'receivers.account_number as confirm_receiver_number',
               'clients.email as sender_email'
           )
           ->where('transactions.id',$request->id)
           ->first()->toArray();
       ;


        $data['details'] = $tr;
        $data['details']['id'] = encrypt(3);
        $australian_number = explode('+61', $data['details']['australian_number']);
        $data['details']['australian_number'] = (isset($australian_number[1])) ? $australian_number[1] : '';

        return view('agent.send-money.step4',$data);
    }
    public function sendMoneyPreview(){

        $request = TemporaryTransaction::where('user_id',Auth::guard('agent')->user()->id)->first();


        if (!empty($request)){
            $request = (object)\GuzzleHttp\json_decode($request->value,true);


            return view('agent.send-money.preview')->with('request',$request);
        }else
            return redirect()->route('sendMoneyStep');

    }
    public function PayNow(){
        $request = TemporaryTransaction::where('user_id',Auth::guard('agent')->user()->id)->first();

        if (!empty($request))
            $request = (object)\GuzzleHttp\json_decode($request->value,true);


        DB::beginTransaction();

        try {
            $name = (!empty($request->sender_name)) ? explode(' ',$request->sender_name) : '';
            $receiver_name = (!empty($request->receiver_name)) ? explode(' ',$request->receiver_name) : '';
          $client = Client::where( 'phone','+61'.$request->australian_number)->first();
          if (empty($client))
          $client =   Client::create([
                'first_name'=> (isset($name[0])) ? $name[0] : '',
                'last_name'=> (isset($name[1])) ? $name[1] : '',
                'phone'=> '+61'.$request->australian_number,
                'email'=> $request->sender_email,
                'agent_id'=> Auth::guard('agent')->user()->id,
            ]);
           $receiver = Receiver::where('account_number',$request->receiver_number)->first();
           if (empty($receiver))
          $receiver =  Receiver::create([
              'client_id' => $client->id,
              'first_name'=> (isset($receiver_name[0])) ? $receiver_name[0] : '',
              'last_name'=> (isset($receiver_name[1])) ? $receiver_name[1] : '',
              'account_number' => $request->receiver_number,
              'payment_method' => $request->payment_method,
              'account_type' => 'Personal',
              'agent_id' => $id = Auth::guard('agent')->id(),
          ]);

            $id = Auth::guard('agent')->user()->id;
            //find balance
            $balance = Balance::where('agent_id', $id)->first();
            //check balance
            if ($request->aud_amount > $balance->balance) {
                return back()->with('warning', 'You can send only equal or less then of your Balance');
            }
            $charge = ($request->payment_method == 'bkash') ? getCharge(1) : getCharge(2);

            $total_pay = $request->aud_amount + $charge;
            //calculate remaining balance
            $remainingBalance = $balance->balance - $request->aud_amount;
            //update balance
            $data = $balance->update(['balance' => $remainingBalance]);

            Transaction::create([
                'agent_id' => Auth::guard('agent')->id(),
                'client_id' => $client->id,
                'receiver_id' => $receiver->id,
                'amount' =>$total_pay,
                'bd_received_amount' => round(getAudCurrency($request->aud_amount),2)
            ]);

            TemporaryTransaction::where('user_id',Auth::guard('agent')->user()->id)->delete();
            //redirect to transaction page


            DB::commit();
               return redirect()->route('sendMoneyStep')
                   ->with('success', 'Your balance successfully transfer');;
            // all good
        } catch (\Exception $e) {

            DB::rollback();

            // something went wrong
        }

    }
    public function PayBack(){
        TemporaryTransaction::where('user_id',Auth::guard('agent')->user()->id)->delete();
        return redirect()->route('sendMoneyStep');
    }
    public function searchUser(Request $request){
        $q = '+'.$request->q;
        $user = Client::select( '*')
               ->where('phone',$q)
               ->first();
        if (!empty($user))
        $user->phone = explode('+61',$user->phone)[1];
      return response()->json(['success'=>true,'data'=>$user]);

    }
    public function searchClient(Request $request){

        $q = '+'.$request->q;
        $data['client'] = Client::where('phone',$request->q)->first();

        $data['transactions'] = Transaction::join('clients','clients.id','transactions.client_id')
                 ->join('receivers','receivers.id','transactions.receiver_id')
                ->select(
                    'transactions.id'
                    ,'transactions.amount'
                    ,'transactions.created_at'
                    ,'transactions.status'
                    ,'receivers.payment_method'
                    ,'receivers.first_name'
                    ,'receivers.last_name'
                    ,'receivers.account_number'
                    ,'transactions.bd_received_amount'

                )
                ->where('clients.phone',$request->q)
                ->groupBy('id')
                ->take(10)
                 ->orderby('created_at','desc')->get();

        if (!empty($data['client']))
     return view('agent.transactions.history',$data);
     return redirect()->back()->with('info','No Client found with this mobile number');

    }

    public function searchReceiver(Request $request){
        $q = '0'.$request->q;


        $user = Receiver::select(
            '*'
        )
               ->where('account_number',$q)

               ->first();
      return response()->json(['success'=>true,'data'=>$user]);

    }

    public function contactUs(Request $request){
        if ($request->method() == "GET")
        return view('agent.contact-us.index');
        else{
            $data = $request->all();


            Mail::send('email.template',['data'=>$data] , function ($message) use ($data) {
                $message->to(env("ADMIN_EMAIL"), 'contact-us')->from('noreply@epeakup.com', 'Epeakup(contact-us)')->subject($data['subject']);
            });
           return redirect()->back()->with('success','Email send sent successfully.Admin will contact with you');
        }
    }
}
