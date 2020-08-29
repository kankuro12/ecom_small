<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Category;
use App\Color;
use App\Product;
use App\Size;
use App\Stock;
use App\Stockbycolor;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function productShop(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $products = Product::where('onsale',1)->latest()->paginate(16);
        return view('front.product.shop',compact('cats','products'));
    }

    public function productShop_1(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $products = Product::where('onsale',1)->latest()->paginate(16);
        return view('front.product.shop_1',compact('cats','products'));
    }

    public function productShopByCategory($id){
        $catName = Category::where('id',$id)->first();
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $products = Product::where('category_id',$id)->where('onsale',1)->latest()->paginate(16);
        $productCount = Product::where('category_id',$id)->where('onsale',1)->count();
        return view('front.product.category_wise',compact('cats','products','productCount','catName'));
    }

    public function productShopByBrand($id){
        $brandName = Brand::where('id',$id)->first();
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $products = Product::where('brand_id',$id)->where('onsale',1)->latest()->paginate(16);
        $productCount = Product::where('brand_id',$id)->where('onsale',1)->count();
        return view('front.product.brand_wise',compact('cats','products','productCount','brandName'));
    }

    public function productDetail($id){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $product = Product::where('id',$id)->first();
        return view('front.product.single',compact('cats','product'));
    }

    // price by Size

    public function priceBySize($id){
        $size = Size::where('id',$id)->select('price')->first();
        return response()->json($size);
    }

    // stock check by size

    public function stockGetBySize($product_id,$size_id){
        if(Stock::where('size_id',$size_id)->count()>0){
            $stock = Stock::where('product_id',$product_id)->where('size_id',$size_id)->first();
            $tot = $stock->total;
            return response()->json($tot);
        }else{
            return response()->json(0);
        }
    }

    // get size by color

    public function getSizeByColor($color_id){
       $size = Size::where('color_id',$color_id)->get();
       return response()->json($size);
    }


    // search product 
    public function searchProduct(Request $request){
        // dd($request->all());
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        if($request->isMethod('post')){
            if($request->has('cat')){
                $productItem = Product::where('name','like','%'.$request->search.'%')->orwhere('tag','like','%'.$request->search.'%')->orwhere('short_detail','like','%'.$request->search.'%')->where('category_id',$request->cat)->where('onsale',1)->get();
                $productCount = Product::where('name','like','%'.$request->search.'%')->orwhere('tag','like','%'.$request->search.'%')->orwhere('short_detail','like','%'.$request->search.'%')->where('category_id',$request->cat)->where('onsale',1)->count();
            }else{
                $productItem = Product::where('name','like','%'.$request->search.'%')->orwhere('tag','like','%'.$request->search.'%')->orwhere('short_detail','like','%'.$request->search.'%')->where('onsale',1)->get();
                $productCount = Product::where('name','like','%'.$request->search.'%')->orwhere('tag','like','%'.$request->search.'%')->orwhere('short_detail','like','%'.$request->search.'%')->where('onsale',1)->count();
            }
            return view('front.product.search')->with(compact('cats','productItem','productCount'));
        }else{
            return view('front.product.search')->with(compact('cats'));
        }
    }


    // product fileter

    public function colorFilter(Request $request){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $color = Color::where('id',$request->color)->first();
        $productByColor = DB::table('product_color')->where('color_id',$request->color)->get();
        $productCount = DB::table('product_color')->where('color_id',$request->color)->count();
        $products = [];
        foreach ($productByColor as $key => $value) {
            $p = Product::where('id',$value->product_id)->where('onsale',1)->first();
            array_push($products,$p);
        }
        return view('front.filter.color_filter',compact('cats','products','productCount','color'));
    }

    public function sizeFilter(Request $request){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $size = Size::where('id',$request->size)->first();
        $productBySize = DB::table('product_size')->where('size_id',$request->size)->get();
        $productCount = DB::table('product_size')->where('size_id',$request->size)->count();
        $products = [];
        foreach ($productBySize as $key => $value) {
            $p = Product::where('id',$value->product_id)->where('onsale',1)->first();
            array_push($products,$p);
        }
        return view('front.filter.size_filter',compact('cats','products','productCount','size'));
    }

    public function brandFilter(Request $request){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $brand = Brand::where('id',$request->brand)->first();
        $products = Product::where('brand_id',$request->brand)->where('onsale',1)->get();
        $productCount = Product::where('brand_id',$request->brand)->where('onsale',1)->count();
        return view('front.filter.brand_filter',compact('cats','products','productCount','brand'));
    }

    public function categoryFilter(Request $request){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $category = Category::where('id',$request->cat)->first();
        $products = Product::where('category_id',$request->cat)->where('onsale',1)->get();
        $productCount = Product::where('category_id',$request->cat)->where('onsale',1)->count();
        return view('front.filter.cat_filter',compact('cats','products','productCount','category'));
    }

    public function priceShort(Request $request){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $products = Product::orderBy('sales_price','DESC')->where('onsale',1)->get();
        $productCount = Product::orderBy('sales_price','DESC')->where('onsale',1)->count();
        return view('front.filter.asc',compact('cats','products','productCount'));
    }
}
