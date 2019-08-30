<?php

namespace App\Http\Controllers\User;

use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::orderBy('created_at','desc')->get();
        return view('backEnd.issues.index',compact('issues'));
    }

    //store user send data
    Public function store(Request $request)
    {
        Issue::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        return back()->with('success', 'Your message send');
    }
}
