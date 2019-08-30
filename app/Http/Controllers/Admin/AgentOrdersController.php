<?php

namespace App\Http\Controllers\Admin;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super');
    }

    /*
     * Show incomplete transaction
     *
     * */
    public function index()
    {
        $orders = Transaction::incompleteTransactions();
        return view('backEnd.agent.orders.index',compact('orders'));
    }

    //order confirm
    public function update($id)
    {
        $order = Transaction::find($id);
        $order->status = 1;
        $order->save();
        return back()->with('success', 'Order completed');
    }
    /*
     * Complete orders
     * */
    public function archive()
    {
        $orders = Transaction::completeTransactions();
        return view('backEnd.agent.orders.archive',compact('orders'));
    }

}
