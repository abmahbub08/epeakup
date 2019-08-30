<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Balance;
use App\MoneyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApproveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super');
    }

    //Show Agent Money Request
    public function index()
    {
        $datas =  MoneyRequest::pendingRequest();
        return view('backEnd.agent.request.index',compact('datas'));
    }

    //Show Agent Money Request
    public function archive()
    {
        $datas =  MoneyRequest::completeRequest();
        return view('backEnd.agent.request.archive',compact('datas'));
    }

    //Approve Request
    public function update($id)
    {
        $balance = 0;
        $totalbalance = 0;
        //find request data
        $data = MoneyRequest::find($id);

        //check have or not any balance of this user
        $balance = $data->agent->balance->balance + $data->amount;
        $totalbalance = $data->agent->balance->total_balance + $data->amount;

        //update that balance
        $data->agent->balance->update([
            'balance' => $balance,
            'total_balance' => $totalbalance,
        ]);
        $data->status = 1;
        $data->save();

        //return and show message
        return back()->with('success', 'Request Approved');

    }

    //delete Request
    public function destroy($id)
    {
        MoneyRequest::destroy($id);
        return back()->with('success', 'Request deleted successfully.');
    }
}
