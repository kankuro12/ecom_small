<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::all();
        return view('back.store.index',compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->Phone;
        $store->opening = $request->opening;
        if($request->has('image')){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('back/images/store'), $imageName);
            $store->image = $imageName;
            }
        $store->save();
        return redirect()->back()->with('success','New store has been created successfully!');

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
        $store = Store::where('id',$id)->first();
        return view('back.store.edit',compact('store'));
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
        $store = Store::where('id',$id)->first();
        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->Phone;
        $store->opening = $request->opening;
        if($request->has('image')){
            unlink(public_path('back/images/store/'.$store->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('back/images/store'), $imageName);
            $store->image = $imageName;
            }
        $store->save();
        return redirect()->back()->with('success','Store has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $store = Store::where('id',$id)->first();
       $store->delete();
       unlink(public_path('back/images/store/'.$store->image));
       return redirect()->back()->with('success','Store has been deleted successfully!');
        
    }
}
