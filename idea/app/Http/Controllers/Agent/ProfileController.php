<?php

namespace App\Http\Controllers\Agent;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    //Show Agent profile
    public function showProfile()
    {
        $profile = Auth::guard('agent')->user();
        return view('agent.profile.profile',compact('profile'));
    }

    //edit profile
    public function edit()
    {
        return view('agent.profile.edit')->with('profile', Auth::guard('agent')->user());
    }

    //update profile info
    public function update(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|regex:/[0-9]{11}/|max:13|min:11',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'country' => 'required|numeric|max:100',
            'avatar' => 'nullable|image|max:2048'
        ]);

        $agent = Agent::find(Auth::guard('agent')->user()->id);
        //
        if($request->hasFile("avatar"))
        {
            //get request image
            $image = $request->file("avatar");
            //get file format
            $type = $image->extension();
            //set image name
            $name = time().".".$type;
            //initial directory
            $directory = "boomboom/avatar";
            //move file to directory
            $image->move($directory,$name);

            $agent->avatar = $name;
        }
        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->city = $request->city;
        $agent->state = $request->state;
        $agent->zipcode = $request->zipcode;
        $agent->country_id = $request->country;
        $agent->save();

        return redirect()->route('agent.showProfile')->with('success','Information updated successfully');

    }

    //show password reset form
    public function showResetForm()
    {
        return view('agent.profile.password');
    }

    //Change password action
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|string',
            'password' => 'required|confirmed|min:8'
        ]);

        if(Hash::check($request->oldpassword, Auth::guard('agent')->user()->password))
        {
            Auth::guard('agent')->user()->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('agent.showProfile')->with('success', 'Password has been changed');
        }
        else{
            return back()->with('error', 'Old Password wrong');
        }
    }
}
