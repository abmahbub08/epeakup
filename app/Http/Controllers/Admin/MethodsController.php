<?php

namespace App\Http\Controllers\Admin;

use App\PaymentNetwork;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MethodsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = PaymentNetwork::all();

        return view('backEnd.methods.index',compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('backEnd.methods.create',compact('services'));
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
            'name'=> 'required|string|max:255',
            'service_id'=> 'required|numeric',
        ]);

        PaymentNetwork::create([
            'name'=>$request->name,
            'service_id'=>$request->service_id
        ]);

        return back()->with('success', 'New Method added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = PaymentNetwork::find($id);
        $services = Service::all();
        return view('backEnd.methods.edit',compact('method','services'));
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
            'name'=> 'required|string|max:255',
            'service_id'=> 'required|numeric',
        ]);

        $method = PaymentNetwork::find($id);
        $method->name = $request->name;
        $method->service_id = $request->service_id;
        $method->save();

        return redirect()->route('methods.index')->with('success', 'Method updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentNetwork::destroy($id);
        return back()->with('success', 'Method deleted successfully');
    }
}
