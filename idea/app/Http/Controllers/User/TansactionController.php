<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Country;
use App\Http\Controllers\Controller;
use App\Mail\NotifyRecipientOfMoney;
use App\Order;
use App\Reason;
use App\Recipient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Stripe\Charge;
use Stripe\Stripe;

class TansactionController extends Controller
{
    public function sendInfo(Request $request)
    {
        $this->validate($request,[
            'country_id' => 'required|string|max:20',
            'service_id' => 'required|string|max:20',
            'payment_network_id' => 'required|numeric',
            'amount' => 'required',
        ]);
        $country = explode('-',$request->country_id,2);
        $service = explode('-',$request->service_id,2);

        session(['order' => $request->except(['_token','amount'])]);
        session()->put('order.country_id', $country[0]);
        session()->put('order.service_id', $service[0]);
        $amount = number_format($request->amount, 2);
        session()->put('order.amount', $amount);
        return redirect()->route('recipientsAdd');
    }

    // check payment method and redirect them
    public function checkPaymentMethod(Request $request)
    {
        $this->validate($request,[
            'payMethod'=>'required',
            'discount'=>'nullable|numeric|min:0|max:100'
        ]);

        if($request->payMethod == "poli"){
            return back()->with('warning', 'This service not available Now');
            $discount = $request->discount;
            $fees = session('order')['fees'];
            $result = $discount * $fees * .01;
            $discountAmount = $fees - $result;

            session()->put('order.discountAmount', $discountAmount);
            return 'You get '.$discount. '% discount after discount Amount: '.session('order.discountAmount');

        }

        if($request->payMethod == "card"){
            // return back()->with('warning', 'This service not available Now');
            return redirect()->route('cdCard');
        }

        if($request->payMethod == "paypal"){
            return redirect()->route('paypal.create');
        }

    }

    //card(debit/credit)  check out
    public function cardCheckOut(Request $request)
    {
        // dd(session('recipient'));
        extract(session('recipient'));
        $recipient_id = Recipient::insertGetId([
            'country_id' => session('order')['country_id'],
            'user_id' => Auth::id(),
            'account_number' => '+88'.$account_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'city' => $city,
            'phone' => '+88'.$phone,
            'email' => $email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        extract(session('order'));
        Stripe::setApiKey("sk_test_NdkSq2SXe3UltdIQpnCpmTBr002d6fNVzT");
        $charge = Charge::create([
            'amount' => $totalpay * 100,
            'currency' => $currency,
            'source' => $request->stripeToken,
            'receipt_email' => auth()->user()->email,
        ]);
        $orderId = strtoupper("od").time();
        $order = Order::create([
            'orderId'=> $orderId,
            'country_id'=> $country_id,
            'user_id'=> auth()->id(),
            'charge_id'=> $charge->id,
            'receipt_url'=> $charge->receipt_url,
            'recipient_id'=> $recipient_id,
            'reason_id'=> $reason_id,
            'service_id'=> $service_id,
            'payment_network_id'=> $payment_network_id,
            'amount'=> $amount,
            'totalpay'=> $totalpay,
            'recipient_amount'=> $reciAmount,
            'agent_type'=> $agent_type,
        ]);

        session()->forget(['order', 'recipient']);

        // send OTP sms
        $phone = ltrim($order->recipient->phone,"+");
        Nexmo::message()->send([
            'to'   => $phone,
            'from' => 'Epeakup',
            'text' => "Dear ".$first_name.", You have a money order from ".$order->user->firstName." ".$order->user->lastName." Amount TK ".$reciAmount." ($".$amount." AUD) in your ".$order->payment_network->name." Account. It will take about 5-10 minutes. Stay with epeakup."
        ]);

        //send mail to a Recipient 
        Mail::to($order->user->email)
                ->send(new NotifyRecipientOfMoney($order));


        return redirect()->route('index')->with('success', 'Your Transaction request Successfull');

    }


    public function poliBankinfo(Request $request)
    {
        return redirect()->route('paymentWithPoli');
    }

    //check out with poli
    public function checkOutWithPoli(Request $request)
    {
        extract(session('recipient'));
        extract(session('order'));
        $recipient_id = Recipient::insertGetId([
            'country_id' => session('order')['country_id'],
            'user_id' => Auth::id(),
            'account_number' => '+88'.$account_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'city' => $city,
            'phone' => '+88'.$phone,
            'email' => $email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        $orderId = strtoupper("od").time();
        $order = Order::create([
            'orderId'=> $orderId,
            'country_id'=> $country_id,
            'user_id'=> auth()->id(),
            'recipient_id'=> $recipient_id,
            'reason_id'=> $reason_id,
            'service_id'=> $service_id,
            'payment_network_id'=> $payment_network_id,
            'amount'=> $amount,
            'totalpay'=> $totalpay,
            'recipient_amount'=> $reciAmount,
            'agent_type'=> $agent_type,
        ]);

        // send OTP sms
        $phone = ltrim($order->recipient->phone,"+");
        Nexmo::message()->send([
            'to'   => $phone,
            'from' => 'Epeakup',
            'text' => "Dear ".$first_name.", You have a money order from ".$order->user->firstName." ".$order->user->lastName." Amount TK ".$reciAmount." ($".$amount." AUD) in your ".$order->payment_network->name." Account. It will take about 5-10 minutes. Stay with epeakup."
        ]);

        //send mail to a Recipient 
        Mail::to($order->user->email)
                ->send(new NotifyRecipientOfMoney($order));

        session()->forget(['order', 'recipient']);

        return redirect()->route('index')->with('success', 'Your Transaction request Successfull');
    }




    //Paypal payment method execute
    public function paypalCreate()
    {
//        return session('order');
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdRWwswJ08L1xJQl3SCaRq6kkKpxuw1q_ok_p5JK2USEjBMa8FLZoNhpyaznwAPS1BbBIOqpapMAuTsx',     // ClientID
                'ELNG8E6geCwNYztH2gnXDqrW8Kd03zkiFF5vX_TWlNI8JCqoCZz2dUgaS8AHmqrteJNaYqtXOgxcF9k-'      // ClientSecret
            )
        );
        $apiContext->setConfig(
                  array(
                    'mode' => 'live',
                  )
            );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new Amount();
        $amount->setCurrency(session('order')['currency'])
                ->setTotal(session('order')['totalpay']);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription("Money Order")
                    ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("https://epeakup.com/execute-payment")
                     ->setCancelUrl("https://epeakup.com/cancel");

        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
        $payment->create($apiContext);
        return redirect($payment->getApprovalLink());
    }



    //Paypal payment method execute
    public function paypalExecute()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdRWwswJ08L1xJQl3SCaRq6kkKpxuw1q_ok_p5JK2USEjBMa8FLZoNhpyaznwAPS1BbBIOqpapMAuTsx',     // ClientID
                'ELNG8E6geCwNYztH2gnXDqrW8Kd03zkiFF5vX_TWlNI8JCqoCZz2dUgaS8AHmqrteJNaYqtXOgxcF9k-'      // ClientSecret
            )
        );
        $apiContext->setConfig(
                  array(
                    'mode' => 'live',
                  )
            );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $amount->setCurrency(session('order')['currency']);
        $amount->setTotal(session('order')['totalpay']);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);

        extract(session('recipient'));
        $recipient_id = Recipient::insertGetId([
            'country_id' => session('order')['country_id'],
            'user_id' => Auth::id(),
            'account_number' => '+88'.$account_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'city' => $city,
            'phone' => '+88'.$phone,
            'email' => $email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        extract(session('order'));
        $orderId = strtoupper("od").time();
        $order = Order::create([
            'orderId'=> $orderId,
            'country_id'=> $country_id,
            'user_id'=> auth()->id(),
            'charge_id'=> $result->id,
            'recipient_id'=> $recipient_id,
            'reason_id'=> $reason_id,
            'service_id'=> $service_id,
            'payment_network_id'=> $payment_network_id,
            'amount'=> $amount,
            'totalpay'=> $totalpay,
            'recipient_amount'=> $reciAmount,
            'agent_type'=> $agent_type,
        ]);

        //Forget sessions of order
        session()->forget(['order', 'recipient']);
        
        // send OTP sms
        $phone = ltrim($order->recipient->phone,"+");
        Nexmo::message()->send([
            'to'   => $phone,
            'from' => 'Epeakup',
            'text' => "Dear ".$first_name.", You have a money order from ".$order->user->firstName." ".$order->user->lastName." Amount TK ".$reciAmount." ($".$amount." AUD) in your ".$order->payment_network->name." Account. It will take about 5-10 minutes. Stay with epeakup."
        ]);

        //send mail to a Recipient       
        Mail::to($order->user->email)
                ->send(new NotifyRecipientOfMoney($order));


        return redirect()->route('index')->with('success', 'Your Transaction request Successfull');
    }




}
