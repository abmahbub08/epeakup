<?php

namespace App\Http\Controllers\Agent;

use App\Balance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $redirectTo = '/agent/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    /**
     * Show the Agent dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('agent')->user()->id;
        $balance = Balance::where('agent_id',$id)->first();
        return view('agent.home',compact('balance'));
    }

}