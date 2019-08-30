<?php

namespace App\Http\Controllers\Agent;

use App\AgentRecipient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgentRecipientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipients = AgentRecipient::all();
        return view('agent.recipients.index',compact('recipients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.recipients.create');
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
            'address' => 'required|string|max:150',
            'city' => 'required|string|max:150',
            'phone' => 'required|regex:/(01)[0-9]{9}/|max:11|min:11',
            'email' => 'required|email',
            'payment_method' => 'required|string',
            'account_type' => 'required|string',
        ]);

        AgentRecipient::create([
            'account_number'=> $request->account_number,
            'account_type'=> $request->account_type,
            'payment_method'=> $request->payment_method,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'city'=> $request->city,
            'address_one'=> $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'country_id'=> 1,
            'agent_id'=> Auth::guard('agent')->user()->id,
        ]);

        return back()->with('success', 'Recipient Added successfully.');
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
        $recipient = AgentRecipient::find($id);
        return view('agent.recipients.edit',compact('recipient'));
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
            'account_number' => 'required|confirmed|regex:/(01)[0-9]{9}/|max:12|min:11',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'address' => 'required|string|max:150',
            'city' => 'required|string|max:150',
            'phone' => 'required|regex:/(01)[0-9]{9}/|max:11|min:11',
            'email' => 'required|email',
            'payment_method' => 'required|string',
            'account_type' => 'required|string',
        ]);

        $data = AgentRecipient::find($id);

        $data->account_number = $request->account_number;
        $data->account_type = $request->account_type;
        $data->payment_method = $request->payment_method;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address_one = $request->address;
        $data->city = $request->city;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('recipients.index')
            ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgentRecipient::destroy($id);
        return back()->with('success', 'Data deleted successfully');
    }
}
