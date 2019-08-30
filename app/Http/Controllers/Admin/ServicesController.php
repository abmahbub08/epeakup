<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
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
        $services = Service::all();

        return view('backEnd.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('backEnd.services.create',compact('countries'));
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
            'service_charge'=> 'required|max:10000|numeric',
            'country_id'=> 'required',
        ]);

        Service::create([
            'name'=>$request->name,
            'service_charge'=>$request->service_charge,
            'country_id'=>$request->country_id
        ]);

        return back()->with('success', 'New Service added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $countries = Country::all();
        return view('backEnd.services.edit',compact('service','countries'));
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
            'service_charge'=> 'required|max:10000|numeric',
            'country_id'=> 'required',
        ]);

        $service = Service::find($id);
        $service->name = $request->name;
        $service->service_charge = $request->service_charge;
        $service->country_id = $request->country_id;
        $service->save();

        return redirect()->route('services.index')->with('success', 'Service updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return back()->with('success', 'Service deleted successfully');
    }
}
