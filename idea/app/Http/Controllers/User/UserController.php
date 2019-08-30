<?php

namespace App\Http\Controllers\User;

use App\Country;
use App\Order;
use App\PaymentMethodDiscount;
use App\PaymentNetwork;
use App\Reason;
use App\Recipient;
use App\Service;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // Get services by id
    public function getservice($id)
    {
        return Service::where('country_id',$id)->get();
    }

    // get methods by id
    public function getmethods($id)
    {
        return PaymentNetwork::where('service_id',$id)->get();
    }

    // User index page show
    public function index()
    {
        $users = User::all()->count();
        $sliders = Slider::all();
        return view('frontEnd.usersPanel.index',compact('users', 'sliders'));
    }

    // User about page show
    public function about()
    {
        return view('frontEnd.usersPanel.about');
    }
    //FAQ
    public function faq()
    {
        return view('frontEnd.usersPanel.faq');
    }
       //tandc
    public function tandc()
    {
        return view('frontEnd.usersPanel.tandc');
    }
           //FAQ
    public function ppolicy()
    {
        return view('frontEnd.usersPanel.ppolicy');
    }


    // User help page show
    public function help()
    {
        return view('frontEnd.usersPanel.help');
    }

      // How IT Work
    public function howitwork()
    {
        return view('frontEnd.usersPanel.howitwork');
    }


    //get Start Page
    public function getStartPage()
    {
        $countries = Country::all();
        $services = Service::all();
        return view('frontEnd.usersPanel.getstart',compact(['countries', 'services']));
    }

    // Add new recipient page
    public function AddNewRecipient()
    {
        $country = Country::find(session('order')['country_id']);
        $account = PaymentNetwork::find(session('order')['payment_network_id']);
        $reasons = Reason::all();
        return view('frontEnd.usersPanel.addRecipient',compact('country','reasons','account'));
    }

    // Payment Method page route
    public function paymentMethodPage()
    {
        $offer = PaymentMethodDiscount::where('payment_method','like','%poli%')->first();
        
        if(isset($offer)){
            $discount = $offer->discount;
        }else {
            $discount = 0;
        }
        
        
        return view('frontEnd.usersPanel.paymentMethod',compact('discount'));
    }


    // Payment Poli Method page route
    public function paymentPoli()
    {
        return view('frontEnd.usersPanel.poli');
    }

    // Payment Debit or Credit card Method page route
    public function paymentDebitOrCreditCard()
    {
        return view('frontEnd.usersPanel.dcCard');
    }


    // Transactions page
    public function myTransections()
    {
        $transections = Order::where('user_id', Auth::id())->orderby('created_at','desc')->get();
        return view('frontEnd.usersPanel.myTransection',compact('transections'));
    }

    // User Details Page
    public function myDetailsPage()
    {
        $user = User::find(Auth::id());
        return view('frontEnd.usersPanel.details',compact('user'));
    }


    // User Recipient details Page
    public function myRecipientDetails()
    {
        $recipients = Recipient::where('user_id', Auth::id())->get();
        return view('frontEnd.usersPanel.recipients',compact('recipients'));
    }

    // User panel Settings Page
    public function mySettingsPage()
    {
        return view('frontEnd.usersPanel.settings');
    }

    //user panel settings
    public function paymentWithPoli()
    {
        return view('frontEnd.paymentMethod.poli.poliCheckout');
    }







}
