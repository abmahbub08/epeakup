<?php

namespace App\Http\Controllers;

use App\Reason;
use App\Recipient;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reason = Reason::all();
        return view('frontEnd.usersPanel.addRecipient',compact('reason'));
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
            'account_number' => 'required|confirmed|regex:/(01)[0-9]{9}/|max:12|min:11',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'city' => 'required|string|max:150',
            'phone' => 'required|regex:/(01)[0-9]{9}/|max:11|min:11',
            'email' => 'required|email',
            'reason_id' => 'required|numeric',
	        'terms_privacy'=>'required'
        ]);

        if (session('order')['payment_network_id'] == 1 or session('order')['payment_network_id'] == 2){
            $this->validate($request,[
                'agent_type' => 'required|string|max:100',
            ]);
        }

        if($request->agent_type == 'Agent'){
            //get session value
            $fees = session('order')['fees'];
            $amount = session('order')['amount'];

            //calculate extra charge for 2% of total amount of send
            $extra_charge = $amount * 0.02;

            //update fees with extra charge
            $fees = number_format($fees + $extra_charge,2);

            //update totalpay amount
            $totalpay = number_format($amount + $fees,2);

            //update the session value
            session()->put('order.fees',$fees);
            session()->put('order.totalpay',$totalpay);
        }


        session()->put('recipient', $request->except('_token'));

        return redirect()->route('payMethod');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
