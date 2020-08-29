<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Cart;
use App\District;
use App\Message;
use App\Order;
use App\Orderitem;
use App\Simplestock;
use App\Stock;
use App\Stockbycolor;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class CustomerAuthController extends Controller
{

    public function customerRigester(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        return view('front.customerAuth.signup',compact('cats'));
    }

    public function customerLoginRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|min:9',
            'email' => 'required',
            'password' => 'required|min:5'
        ]);

        $customerCount = User::where('email',$request->email)->count();
        if($customerCount > 0){
            return redirect()->back()->with('warning','This email already exist');
        }else{
            $cus = new User();
            $cus->name = $request->name;
            $cus->address = $request->address;
            $cus->phone = $request->phone;
            $cus->email = $request->email;
            $cus->role = 0;
            $cus->password = bcrypt($request->password);

            if($request->has('image')){
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('front/images/customers'), $imageName);
                $cus->image = $imageName;
                }
                $cus->save();
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    Session::put('frontSession',$request->email);
                    return redirect('/shopping-cart');
                }
        }
    }

    public function customerLogin(Request $request){
        $email = $request->email;
        $pass = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $pass])){
            Session::put('frontSession',$email);
            return redirect('/shopping-cart');
        }else{
            return redirect('customer-signup')->with('warning','Invalid Username and Password');
        }
    }

    public function customerLogout(){
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/');
    }


    // customer profile

    public function customerProfile(Request $request){
        if($request->isMethod('post')){
            User::where('id',Auth::user()->id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email
            ]);
            return redirect()->back()->with('success','Your infromation has been updated successfully!');
        }else{
            $cats = Category::with('subcat')->where('parent_id',0)->get();
            return view('front.user.profile',compact('cats'));
        }
    }

    public function customerOrder(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $user_id = Auth::user()->id;
        $orders = Order::latest()->where('user_id',$user_id)->paginate(2);
        return view('front.user.order',compact('cats','orders'));
    }

    public function customerOrderDetail($id){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $orderDetail = Orderitem::where('order_id',$id)->get();
        return view('front.user.orderDetail',compact('cats','orderDetail'));
    }

    public function checkout(){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $session_id = Session::get('session_id');
        Cart::where('session_id',$session_id)->update(['user_email'=>$user_email]);
        $cart = Cart::where('session_id',$session_id)->get();
        $userDetail = User::where('id',$user_id)->first();
        // dd($userDetail);
        return view('front.product.checkout',compact('cats','userDetail','cart'));
    }

    public function getShippingCharge($district){
        $dis = District::where('district',$district)->select('shipping_charge')->first();
        return response()->json($dis);
    }

    public function placeOrderStore(Request $request){
        $session_id = Session::get('session_id');
        $cart = Cart::where('session_id',$session_id)->get();
        $total = 0;
        foreach ($cart as $value) {
           $total = $total + ($value->price * $value->qty);
        }
        $order = new Order();
        if(!empty(Session::get('couponAmount'))){
            $discount = Session::get('couponAmount');
            $order->discount = $discount;
        }else{
            $order->discount = 0;
        }

        $shipping_charge = District::where('district',$request->district)->select('shipping_charge')->first();
        $order->shipping_charge = $shipping_charge->shipping_charge;
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->district = $request->district;
        $order->city = $request->city;
        $order->zipcode = $request->zipcode;
        $order->total = $total;
        $order->order_note = $request->order_note;
        $order->status = 1;
        $order->save();
        // dd($order);
        foreach ($cart as $value) {
            $orderItem = new Orderitem();
            $orderItem->product_id = $value->product_id;
            $orderItem->order_id = $order->id;
            $orderItem->rate = $value->price;
            $orderItem->qty = $value->qty;
            $orderItem->color_id = $value->color_id;
            $orderItem->color_name = $value->color_name;
            $orderItem->size_id = $value->size_id;
            $orderItem->size_name = $value->size_name;
            if($value->color_id != null){
                $stockColor = Stock::where('product_id',$value->product_id)->where('color_id',$value->color_id)->where('size_id',$value->size_id)->first();
                $totalColor = $stockColor->total;
                $stockColor->total = $totalColor - $value->qty;
                $stockColor->save();
            }else{
                $stockOFSimpleProduct = Simplestock::where('product_id',$value->product_id)->first();
                $totalSimpleProduct = $stockOFSimpleProduct->total;
                $stockOFSimpleProduct->total = $totalSimpleProduct - $value->qty;
                $stockOFSimpleProduct->save();
            }
            $orderItem->save();
        }
        Cart::where('user_email',Auth::user()->email)->delete();
        return redirect('/shopping-cart')->with('success','Your order placed successfully!');
    }

    public function customerMessage(Request $request){
        // dd($request->all());
        $message = new Message();
        $message->user_id = Auth::user()->id;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('success','Your message has been set successfully!');
    }

    public function wishList(){
        if(empty(Auth::check())){
            return redirect('customer-signup')->with('warning','Sorry! You have to login first !');
        }else{
                $cats = Category::with('subcat')->where('parent_id',0)->get();
                return view('front.user.wishlist')->with(compact('cats'));
            }
    }

    public function AddProductToWishlist($product_id){
        if(empty(Auth::check())){
            return redirect('customer-signup')->with('warning','Sorry! You have to login first !');
        }else{
            $countUser = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$product_id)->count();
            if($countUser>0){
                return redirect()->back()->with('warning','This product already exist in your whistlist !');
            }else{
                $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->save();
                return redirect()->back()->with('success','Product has been added to your wishlist successfully!');
            }
        }
    }

    public function removeWishlistItem($id){
        Wishlist::where('id',$id)->delete();
        return redirect()->back()->with('success','Wishlist item has been removed successfully!');
    }

    public function forgetPassword(Request $request){
        if($request->isMethod('post')){
            $user = User::where(['email' => $request->email, 'role'=>0])->count();
            if($user>0){
                $str = str_random(8);
                // $mailaddress = $request->email;
                // $messageData = [
                //     'email' => $mailaddress,
                //     'code' => $str,
                // ];
                // Mail::send('E-commerce.forgetPassword', $messageData, function ($message) {
                //     $message->to($mailaddress)->subject('Verification Code - Ecommerce');
                // });
                mail($request->email,'Verification Code',$str,'From:E-Commerce@site.com');
                User::where(['email' => $request->email])->update(['code' => $str]);
                return redirect('change-password')->with('success','Check your email for verification code!');
            }else{
                return redirect()->back()->with('warning','This email address does not exist!');
            }
        }else{
            $cats = Category::with('subcat')->where('parent_id',0)->get();
            return view('front.customerAuth.forgetPassword',compact('cats'));
        }
    }

    public function changePassword(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user = User::where(['code' => $request->code])->count();
            if($user>0){
                $pass = bcrypt($request->password);
                User::where(['code' => $request->code])->update(['password' => $pass, 'code' => null]);
                return redirect()->back()->with('success','Your password has been changed successfully!');
            }else{
                return redirect()->back()->with('warning','Verification code does not match!');
            }
        }else{
            $cats = Category::with('subcat')->where('parent_id',0)->get();
            return view('front.customerAuth.change_pass',compact('cats'));
        }
    }

}
