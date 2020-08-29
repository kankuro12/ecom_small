<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
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
        $coupons = Coupon::latest()->paginate(5);
        return view('back.coupon.index')->with(compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->applicable_amount = $request->applicable_amount;
        $coupon->amount = $request->amount;
        $coupon->amount_type = $request->amount_type;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->status = $request->has('status')?1:0;
        $coupon->save();
        return redirect()->back()->with('success','Coupon has been created successfully!');
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
        $coupon = Coupon::where('id',$id)->first();
        return view('back.coupon.edit',compact('coupon'));
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
        $coupon = Coupon::where('id',$id)->first();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->applicable_amount = $request->applicable_amount;
        $coupon->amount = $request->amount;
        $coupon->amount_type = $request->amount_type;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->status = $request->has('status')?1:0;
        $coupon->save();
        return redirect()->back()->with('success','Coupon has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::where('id',$id)->first();
        $coupon->delete();
        return redirect()->back()->with('success','Coupon has been deleted successfully!');
    }
}
