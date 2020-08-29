<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use App\Color;
use App\Size;
use App\Productimage;
use App\Stock;

class ProductController extends Controller
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
        $products = Product::latest()->paginate(10);
        return view('back.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $brands = Brand::all();
        $color = Color::all();
        $size = Size::all();
        return view('back.product.create',compact('cats','brands','color','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required||max:191',
            'type' => 'required',
            'short_detail' => 'required',
            'attributes' => 'nullable',
            'feature_image' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->title;
        $product->type = $request->type;
        $product->short_detail = $request->short_detail;
        $product->detail = $request->detail;
        $product->tag = $request->tag;
        $product->price = $request->price;
        $product->sales_price = $request->sales_price;
        $product->code = $request->code;
        $product->onsale = $request->onsale;
        $product->promo = $request->promo;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;

        if($request->has('feature_image')){
            $imageName = time().'.'.$request->feature_image->getClientOriginalExtension();
            $request->feature_image->move(public_path('back/images/product'), $imageName);
            $product->feature_image = $imageName;
            }
            $product->save();
            // dd($request->subattr);
                // if($request->has('color')){
                //     $product->colors()->attach($request->color);
                // }

                // if($request->has('size')){
                //     $product->sizes()->attach($request->size);
                // }

                if($request->type == 1){
                    foreach ($request->size_id as $key => $size) {
                            $stock = new Stock();
                            $stock->size_id = $size;
                            $stock->total = $request->total[$key];
                            $stock->product_id = $product->id;
                            $stock->color_id = $request->color_id[$key];
                            $stock->save();
                      }
                   }
                

                if($request->hasFile('gallery')){
                    // dd($request->file('gallery'));
                    $i=0;
                    foreach ($request->file('gallery') as $value) {
                        $gallery = new Productimage();
                        $imageName = $i."-".time().'.'.$value->getClientOriginalExtension();
                        $value->move(public_path('back/images/gallery'), $imageName);
                        $gallery->image = $imageName;
                        // array_push($image_data,$imageName);
                        $gallery->product_id = $product->id;
                        $gallery->save();
                        $i++;
                    }
                }
        return redirect()->back()->with('success','New Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        $image = Productimage::where('product_id',$product->id)->first();
        return view('back.product.single',compact('product','image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $cats = Category::all();
        $brands = Brand::all();
        $color = Color::all();
        $size = Size::all();
        return view('back.product.edit',compact('product','cats','brands','color','size'));
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
        $request->validate([
            'title' => 'required||max:191',
            'type' => 'required',
            'short_detail' => 'required',
            'attributes' => 'nullable'
        ]);

        $product = Product::where('id',$id)->first();
        $product->name = $request->title;
        $product->type = $request->type;
        $product->short_detail = $request->short_detail;
        $product->detail = $request->detail;
        $product->tag = $request->tag;
        $product->price = $request->price;
        $product->sales_price = $request->sales_price;
        $product->code = $request->code;
        $product->onsale = $request->onsale;
        $product->promo = $request->promo;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;

        if($request->has('feature_image')){
            unlink(public_path('back/images/product/'.$product->feature_image));
            $imageName = time().'.'.$request->feature_image->getClientOriginalExtension();
            $request->feature_image->move(public_path('back/images/product'), $imageName);
            $product->feature_image = $imageName;
            }
            $product->save();

            if($request->type == 1){
                foreach ($request->size_id as $key => $size) {
                        $stock =  Stock::where('product_id',$id)->where('size_id',$size)->where('color_id',$request->color_id[$key])->first();
                        $stock->size_id = $size;
                        $stock->total = $request->total[$key];
                        $stock->product_id = $product->id;
                        $stock->color_id = $request->color_id[$key];
                        $stock->save();
                  }
               }
                

                // if($request->has('size')){
                //     $product->sizes()->sync($request->size);
                // }else{
                //     $product->sizes()->sync([]);
                // }
            return redirect()->back()->with('success','Product has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return redirect()->back()->with('success','Product has been deleted successfully.');
    }

    public function GalleryImageDelete($image_id){
        $image = Productimage::where('id',$image_id)->first();
        unlink(public_path('back/images/gallery/'.$image->image));
        $image->delete();
        return redirect()->back()->with('success','Image has been deleted successfully.');
    }
}
