<?php

namespace App\Http\Controllers\Agent;

use App\MoneyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MoneyRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    //show request form
    public function create()
    {
        return view('agent.money.create');
    }

    //store money request data
    public function store(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required|numeric|max:10000'
        ]);

        MoneyRequest::create([
            'amount'=> $request->amount,
            'agent_id'=> Auth::guard('agent')->user()->id
        ]);

        return back()->with('success', 'Your request successfully send.');
    }


}
