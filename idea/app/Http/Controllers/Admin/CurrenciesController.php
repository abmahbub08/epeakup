<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller
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
        $currencies = Currency::all();
        return view('backEnd.currencies.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('backEnd.currencies.create',compact('countries'));
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
            'country_id'=>'required|numeric',
            'currency'=>'required|string',
            'rate'=>'required|numeric|min:1',
            'short_name'=>'required|string|max:3',
        ]);

        Currency::create([
            'currency'=>$request->currency,
            'rate'=>$request->rate,
            'short_name'=>$request->short_name,
            'country_id'=>$request->country_id,
        ]);

        return back()->with('success','Currency Inserted successfully');
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
        $currency = Currency::find($id);
        $countries = Country::all();
        return view('backEnd.currencies.edit',compact('currency','countries'));
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
            'country_id'=>'required|numeric',
            'currency'=>'required|string',
            'rate'=>'required|numeric|min:1',
            'short_name'=>'required|string|max:3',
        ]);

        $currency = Currency::find($id);
        $currency->country_id = $request->country_id;
        $currency->currency = $request->currency;
        $currency->rate = $request->rate;
        $currency->short_name = $request->short_name;
        $currency->save();

        return redirect()->route('currencies.index')
                        ->with('success', 'Currency updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Currency::destroy($id);
        return back()->with('success','Currency deleted');
    }
}
