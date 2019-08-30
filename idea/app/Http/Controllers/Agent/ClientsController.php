<?php

namespace App\Http\Controllers\Agent;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('agent')->id();
        $clients = Client::orderBy('created_at','desc')->where('agent_id',$id)->get();
        return view('agent.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.clients.create');
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
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'phone' => 'required|regex:/[0-9]{9}/|max:9|min:9',
            'email' => 'required|email',
            'address' => 'required|string|max:150',
            'state' => 'required|string|max:150',
            'nid' => 'required|image|max:2028',
        ]);

        if ($request->hasFile('nid')){
            //get file
            $image = $request->file('nid');
            //get extension
            $type = $image->extension();
            //set name
            $name = time().'.'.$type;
            //set directory name
            $dir = 'boomboom/nid';
            //move image
            $image->move($dir,$name);
        }else{
            $name = '';
        }

        Client::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'phone'=> '+61'.$request->phone,
            'email'=> $request->email,
            'address'=> $request->address,
            'state'=> $request->state,
            'nid'=> $name,
            'agent_id'=> Auth::guard('agent')->user()->id,
        ]);

        return back()->with('success', 'Client Added successfully.');
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
        $client = Client::find($id);
        return view('agent.clients.edit',compact('client'));
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
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'phone' => 'required|regex:/[0-9]{9}/|max:9|min:9',
            'email' => 'required|email',
            'address' => 'required|string|max:150',
            'state' => 'required|string|max:150',
        ]);

        $data = Client::find($id);
        //check image have or not
        if ($request->hasFile('nid')){
            //get file
            $image = $request->file('nid');
            //get extension
            $type = $image->extension();
            //set name
            $name = time().'.'.$type;
            //set directory name
            $dir = 'boomboom/nid';
            //move image
            $image->move($dir,$name);
            $data->nid = $name;
        }

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->phone = '+61'.$request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->save();

        return redirect()->route('clients.index')
            ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return back()->with('success', 'Data deleted successfully');
    }
}
