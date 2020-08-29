<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
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
        $brands = Brand::latest()->paginate(10);
        return view('back.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->title;
        if($request->has('logo')){
            $imageName = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('back/images/brand'), $imageName);
            $brand->logo = $imageName;
            }
        $brand->save();
        return redirect()->back()->with('success','New barand has been created successfully.');
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
        $brand = Brand::where('id',$id)->first();
        return view('back.brand.edit',compact('brand'));
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
        $brand = Brand::where('id',$id)->first();
        $brand->name = $request->title;
        if($request->has('logo')){
            unlink(public_path('back/images/brand/'.$brand->logo));
            $imageName = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('back/images/brand'), $imageName);
            $brand->logo = $imageName;
            }
        $brand->save();
        return redirect()->back()->with('success','Brand has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('id',$id)->first();
        $brand->delete();
        unlink(public_path('back/images/brand/'.$brand->logo));
        return redirect()->back()->with('success','Brand has been deleted successfully.');
    }
}
