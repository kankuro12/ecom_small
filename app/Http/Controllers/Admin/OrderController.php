<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Orderitem;
use App\Responsemessage;
use App\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function pendingOrder(){
        $orders = Order::latest()->where('status','!=',4)->get();
        return view('back.orders.pending',compact('orders'));
    }

    public function pendingOrderDetail($id){
        $orderDetail = Orderitem::where('order_id',$id)->get();
        // dd($orderDetail);
        return view('back.orders.pending_detail',compact('orderDetail'));
    }

    public function completeOrder(){
        $orders = Order::latest()->where('status',4)->get();
        return view('back.orders.complete',compact('orders'));
    }

    public function completeOrderDetail($id){
        $orderDetail = Orderitem::where('order_id',$id)->get();
        return view('back.orders.complete_detail',compact('orderDetail'));
    }

    public function responseMessage(Request $request){
        $countResponseMessage = Responsemessage::where('order_id',$request->order_id)->count();
        if($countResponseMessage>0){
             Responsemessage::where('order_id',$request->order_id)->update([
                'message' => $request->message
            ]);
        }else{
             Responsemessage::create([
                'order_id' => $request->order_id,
                'message' => $request->message
            ]);
        }

        Order::where('id',$request->order_id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success','Your response has been sent successfully!');
    }
}
