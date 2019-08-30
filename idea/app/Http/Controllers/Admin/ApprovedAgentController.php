<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovedAgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super');
    }

    //show all agents
    public function index()
    {
        $agents = Agent::orderBy('created_at', 'desc')->get();
        return view('backEnd.agent.agents.index',compact('agents'));
    }

    //Approve Agent
    public function update($id)
    {
        $agent = Agent::find($id);
//        return $agent;

        $agent->update(['active'=>1]);
        return back()->with('success', 'Now this agent Approved');

    }

    //delete this user
    public function destroy($id)
    {
        Agent::destroy($id);
        return back()->with('success', 'Agent deleted successfully.');
    }
}
