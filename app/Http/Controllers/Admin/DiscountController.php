<?php

namespace App\Http\Controllers\Admin;

use App\PaymentMethodDiscount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = PaymentMethodDiscount::all();
        return view('backEnd.discounts.index',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.discounts.create');
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
            'payment_method'=>'required|string',
            'discount'=>'nullable|numeric|min:0|max:100',
        ]);

        PaymentMethodDiscount::create([
            'payment_method'=>$request->payment_method,
            'discount' => $request->discount
        ]);

        return back()->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = PaymentMethodDiscount::find($id);
        return view('backEnd.discounts.edit',compact('discount'));
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
            'payment_method'=>'required|string|max:100',
            'discount'=>'nullable|numeric|min:0|max:100',
        ]);

        $data = PaymentMethodDiscount::find($id);

        $data->payment_method = $request->payment_method;
        $data->discount = $request->discount;
        $data->save();

        return redirect()->route('discounts.index')->with('success', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethodDiscount::destroy($id);
        return back()->with('success', 'Data deleted successfully');
    }
}
