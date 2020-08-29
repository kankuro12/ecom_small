<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Size;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs= Size::latest()->paginate(10);
        return view('back.size.index',compact('subs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub = new Size();
        $sub->name = $request->title;
        $sub->shortcode = $request->shortcode;
        $sub->price = 0;
        $sub->color_id = $request->color_id;
        // dd($sub);
        $sub->save();
        return redirect()->back()->with('success','Size has been created successfully.');
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
        $sub = Size::where('id',$id)->first();
        return view('back.size.edit',compact('sub'));
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
        $sub = Size::where('id',$id)->first();
        $sub->name = $request->title;
        $sub->shortcode = $request->shortcode;
        $sub->price = 0;
        $sub->color_id = $request->color_id;
        // dd($sub);
        $sub->save();
        return redirect()->back()->with('success','Size has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Size::where('id',$id)->first();
        $sub->delete();
        return redirect()->back()->with('success','Size has been deleted successfully.');
    }
}
