<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersShowController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('backEnd.users.index')->with('users', $users);
    }

    //delete users
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->recipients->count() > 0)
        {
            foreach ($user->recipients as $recipient){
                $recipient->delete();
            }
        }
        if($user->orders->count() > 0)
        {
            foreach ($user->orders as $order){
                $order->delete();
            }
        }
        $user->delete();
        return back()->with('success', 'User deleted');
    }
}
