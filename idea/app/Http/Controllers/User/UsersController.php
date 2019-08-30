<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('frontEnd.users.edit');
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
            'firstName'=>'required|string',
            'documents'=>'nullable|image|max:2000',
            'lastName'=>'required|string',
            'gender'=>'required',
            'phone'=>'required|numeric|max:99999999999',
            'buildingName'=>'nullable|string',
            'street'=>'nullable|string',
            'postcode'=>'nullable|numeric|max:99999',
            'city'=>'nullable|string',
        ]);

        $user = User::find(auth()->id());

        if ($request->hasFile('documents')) {
            $name = time().'.'.$request->documents->extension();
            $path = $request->documents->storeAs('public/documents',$name);
            $user->documents = $name;
        }

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->buildingName = $request->buildingName;
        $user->street = $request->street;
        $user->postcode = $request->postcode;
        $user->city_id = $request->city;
        $user->save();
        return redirect()->route('details')->with('success','Your information updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
