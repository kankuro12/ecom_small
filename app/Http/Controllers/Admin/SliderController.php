<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $slider = new Slider();
        $slider->sub_title = $request->sub_title;
        $slider->title = $request->title;
        $slider->price_section = $request->price_section;
        $slider->button_name = $request->button_name;
        $slider->link = $request->link;

        if($request->has('image')){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('back/images/slider'), $imageName);
            $slider->image = $imageName;
            }
        $slider->save();
        return redirect()->back()->with('success','Slider has been created successfully.');
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
        $slider = Slider::where('id',$id)->first();
        return view('back.slider.edit')->with(compact('slider'));
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
        $slider = Slider::where('id',$id)->first();
        $slider->sub_title = $request->sub_title;
        $slider->title = $request->title;
        $slider->price_section = $request->price_section;
        $slider->button_name = $request->button_name;
        $slider->link = $request->link;

        if($request->has('image')){
            unlink(public_path('back/images/slider/'.$slider->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('back/images/slider'), $imageName);
            $slider->image = $imageName;
            }
        $slider->save();
        return redirect()->back()->with('success','Slider has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id',$id)->first()->delete();
        unlink(public_path('back/images/slider/'.$slider->image));
        return redirect()->back()->with('success','Slider has been deleted successfully.');
    }
}
