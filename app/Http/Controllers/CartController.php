<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Stock;
use App\Stockbycolor;
use App\Category;
use App\Coupon;
use App\Product;
use App\Simplestock;
use App\Size;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $session_id = Session::get('session_id');
        $userCart = Cart::where('session_id',$session_id)->get();
        return view('front.product.cart',compact('cats','userCart'));
    }

    public function getCartItems(){
        $session_id = Session::get('session_id');
        $userCart = Cart::where('session_id',$session_id)->get();
        return response()->json(['cart'=>$userCart]);
        // return response()->json($userCart,$featur_image);
    }


    public function productAddToCart(Request $request){
        Session::forget('couponAmount');
        Session::forget('couponCode');
        $qty = $request->qty;
        $session_id = Session::get('session_id');
        $productCount = Cart::where('session_id',$session_id)->where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->count();
        if($productCount>0){
            return redirect()->back()->with('warning','This product already exists in cart !');
        }else{
            $cartData = new Cart();
            if($request->has('color_id')){
                $stock = Stock::where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->first();
                $stockCount = Stock::where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->count();
                 if($stockCount>0){
                     if($stock->total>0){
                         if($qty <= $stock->total){
                             $cartData->color_name = $stock->color->name;
                             $cartData->size_name = $stock->size->name;
                         }else{
                             return redirect()->back()->with('warning','Your Order Quantity Is Out Of Stock');
                             //  return response()->json(['message' => 'Your Order Quantity Is Out Of Stock']);
                         }
                     }else{
                         return redirect()->back()->with('warning','Your Order Product Is Out Of Stock');
                     }
                 }else{
                    return redirect()->back()->with('warning','Your Order Product Is Out Of Stock');
                 }
            }
            
            if(empty($request->user_email)){
                $cartData->user_email = '';
            }

            if(empty($session_id)){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
            }
            if($request->has('size_id')){
                $size = Size::where('id',$request->size_id)->first();
                $size_price = $size->price;
                $product = Product::where('id',$request->product_id)->first();
                $product_price = $product->sales_price;
                $cartData->price = $product_price + $size_price;
            }else{
                $product = Product::where('id',$request->product_id)->first();
                $product_price = $product->sales_price;
                $cartData->price = $product_price;
            }
            $cartData->session_id = $session_id;
            $cartData->product_id = $request->product_id;
            $cartData->product_name = $request->product_name;
            $cartData->product_image = $request->product_image;
            $cartData->product_code = $request->product_code;
            $cartData->color_id = $request->color_id;
            $cartData->size_id = $request->size_id;
            $cartData->qty = $qty;
            // dd($cartData);
            $cartData->save();

        }
        return redirect('/shopping-cart');
    }


    public function updateQtyOfCartItem($id = null, $qty = null){
        Session::forget('couponAmount');
        Session::forget('couponCode');
        $cart = Cart::where('id',$id)->first();
        $updated_qty = $cart->qty + $qty;

        if($cart->color_id == null){
            $stocOfkSimpleProduct = Simplestock::where('product_id',$cart->product_id)->first();
            $totalProduct = $stocOfkSimpleProduct->total;
            if($totalProduct>= $updated_qty){
                $cart->qty = $updated_qty;
                $cart->save();
                return redirect()->back()->with('success','Your quantity has been updated successfully!');
                // return response()->json($cart);
            }else{
                return redirect()->back()->with('warning','Your order quantity is out of stock');
                // return response()->json(['message'=>'Your order quantity is out of stock']);
            }
        }

        if($cart->color_id != null){
            $stockCheckByColor = Stock::where('product_id',$cart->product_id)->where('color_id',$cart->color_id)->where('size_id',$cart->size_id)->first();
            if($stockCheckByColor->total >= $updated_qty){
                $cart->qty = $updated_qty;
                $cart->save();
                return redirect()->back()->with('success','Your quantity has been updated successfully!');
                // return response()->json($cart);
            }else{
                return redirect()->back()->with('warning','Your order quantity is out of stock!');
                // return response()->json(['message'=>'Your order quantity is out of stock']);
            }
        }
    }

    public function cartItemRemove($id){
        Session::forget('couponAmount');
        Session::forget('couponCode');
        $cart = Cart::where('id',$id)->first();
        $cart->delete();
        return redirect()->back()->with('success','Your cart item has been removed successfull!');
    }

    public function cartItemRemoveApi($id){
        Session::forget('couponAmount');
        Session::forget('couponCode');
        $cart = Cart::where('id',$id)->first();
        $cart->delete();
        return response()->json(['message' => 'Product remove from cart successfully']);
    }

    public function applyCouponCode(Request $request){
        Session::forget('couponAmount');
        Session::forget('couponCode');
        $couponCount = Coupon::where('coupon_code',$request->coupon_code)->count();
        if($couponCount == 0){
            return redirect()->back()->with('warning','This coupon code does not exist!');
        }else{
            $couponStatus = Coupon::where('coupon_code',$request->coupon_code)->first();
            if($couponStatus->status == 0){
               return redirect()->back()->with('warning','This coupon code is inactive!');
            }else{
                $expiry_date = $couponStatus->expiry_date;
                $today = date('yy-m-d');
                if($expiry_date < $today){
                    return redirect()->back()->with('warning','This coupon code is expired!');
                }else{

                    $session_id = Session::get('session_id');
                    $userCart = Cart::where('session_id',$session_id)->get();
                    $total_amount = 0;
                    foreach ($userCart as $value) {
                        $total_amount = $total_amount + ($value->price * $value->qty);
                    }

                    if($total_amount >= $couponStatus->applicable_amount){
                        if($couponStatus->amount_type == 1){
                            $couponAmount = $couponStatus->amount;
                        }else{
                            $couponAmount = $total_amount *($couponStatus->amount/100);
                        }
                    }else{
                        return redirect()->back()->with('warning','Sorry! You have to spend minimun Rs. '.$couponStatus->applicable_amount.' for apply this coupon. Thank You!');
                    }

                    Session::put('couponAmount',$couponAmount);
                    Session::put('couponCode',$request->coupon_code);
                    return redirect()->back()->with('success','Coupon code applied successfully!');
                }
            }
        }
    }


}
