<?php

namespace App\Http\Controllers\Admin\cms;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backEnd.cms.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backEnd.cms.slider.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'image' => 'required|image|max:500',
            'button_text' => 'nullable|string'
        ]);

        //Set button text if it null or not
        if(isset($request->button_text)){
            $text = $request->button_text;
        }else{
            $text = "Get Start";
        }

        //
        if($request->hasFile("image"))
        {
            //get request image
            $image = $request->file("image");
            //get image size
            $size = $image->getSize();
            $size = floor($size/1024);
            //get file format
            $type = $image->extension();
            //set image name
            $name = time().".".$type;
            //initial directory
            $directory = "frontEnd/Slider";
            //move file to directory
            $image->move($directory,$name);
        }

        $slider = new Slider();

        $slider->image = $name;
        $slider->size = $size;
        $slider->type = $type;
        $slider->button_text = $text;
        $slider->save();

        return back()->with('success', 'Image Uploaded');

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
        $slider = Slider::find($id);
        return view('backEnd.cms.slider.edit',compact('slider'));
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
        //validate data
        $this->validate($request,[
            'image' => 'required|image|max:500',
            'button_text' => 'nullable|string'
        ]);

        //Set button text if it null or not
        if(isset($request->button_text)){
            $text = $request->button_text;
        }else{
            $text = "Get Start";
        }
        //get slider info
        $slider = Slider::find($id);

        //check file has or not
        if($request->hasFile("image"))
        {
            //get request image
            $image = $request->file("image");
            //get image size
            $size = $image->getSize();
            $size = floor($size/1024);
            //get file format
            $type = $image->extension();
            //set image name
            $name = time().".".$type;
            //initial directory
            $directory = "frontEnd/Slider";
            //move file to directory
            $image->move($directory,$name);
            //delete image
            unlink("frontEnd/Slider/".$slider->image);
            //info save into database
            $slider->image = $name;
            $slider->size = $size;
            $slider->type = $type;
        }

        $slider->button_text = $text;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Image Uploaded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        unlink('frontEnd/Slider/'.$slider->image);
        $slider->delete();
        return back()->with('success', 'Slider Deleted.');
    }
}
