<?php

namespace App\Http\Controllers;

use App\Mail\TransectionConfirm;
use App\Order;
use App\User;
use App\Issue;
use App\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_id', 1)->orderby('created_at','desc')->get();
        // dd($orders);
        $users = User::all()->count();
        $totalOrders = Order::all()->count();
        $completeOrders = Order::where('status_id', 2)->orderby('created_at','desc')->get()->count();
        $issues = Issue::all()->count();
        $completedIssue = Issue::where('status', 1)->get()->count();
        return view('backEnd.orders.index',compact('orders','users','totalOrders','completeOrders','issues','completedIssue'));
    }

    //Archive Orders
    public function archiveOrders()
    {
        return view('backEnd.orders.archive')
                    ->with('orders',Order::where('status_id', 2)->orderby('created_at','desc')->get());
    }

    //send message
    public function messageSend($id)
    {
        $data = Order::find($id);

        Mail::to($data->recipient->email)
            ->send(new TransectionConfirm($data));

        return back()->with('success',"Your confirmation message send successfully!");
    }

    //Order process completed
    public function updateStatus($id)
    {
        $data = Order::find($id);
        $data->status_id = 2;
        $data->save();
        Mail::to($data->recipient->email)
            ->send(new TransectionConfirm($data));
        return back()->with('success',"Your process completed successfully and mail sended!");
    }
}
