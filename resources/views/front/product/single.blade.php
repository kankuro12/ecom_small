@extends('front.layouts.app')
@section('title','Product Detail')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Product<span>Detail</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <form action="{{ url('add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_code" value="{{ $product->code }}">
                    <input type="hidden" name="product_image" value="{{ $product->feature_image }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="{{ asset('back/images/product/'.$product->feature_image) }}" data-zoom-image="{{ asset('back/images/product/'.$product->feature_image) }}" alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    @php
                                      $g_image = \App\Productimage::where('product_id',$product->id)->get();
                                    @endphp

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="{{ asset('back/images/product/'.$product->feature_image) }}" data-zoom-image="{{ asset('back/images/product/'.$product->feature_image) }}">
                                                <img src="{{ asset('back/images/product/'.$product->feature_image) }}" alt="product side">
                                            </a>
                                            @foreach ($g_image as $i)
                                                <a class="product-gallery-item" href="#" data-image="{{ asset('back/images/gallery/'.$i->image) }}" data-zoom-image="{{ asset('back/images/gallery/'.$i->image) }}">
                                                    <img src="{{ asset('back/images/gallery/'.$i->image) }}" alt="product side">
                                                </a>
                                            @endforeach
                                        </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6" style="margin-top:3rem;">
                            <div style="margin-bottom:3rem;">
                                @include('front.layouts.message')
                            </div>
                            <div class="product-details product-details-centered">
                                <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price" >
                                       <span class="new-price" id="productPrice">NPR {{ $product->sales_price }}</span>
                                    @if ($product->sales_price < $product->price)
                                       <span class="font-weight-light line-through">NPR {{ $product->price }}</span>
                                    @endif
                                </div><!-- End .product-price -->

                                <div class="product-price" >

                               </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{{ $product->short_detail }}</p>
                                </div><!-- End .product-content -->

                                @if ($product->type == 1)
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Color:</label>
                                        <div class="select-custom">
                                            <select name="color_id" class="form-control" id="color" required>
                                                <option value="" selected="selected">Select Your Color</option>
                                                @foreach (\App\Color::all() as $item)
                                                 <option value="{{ $item->id }}">--{{ $item->name }} ({{ $item->shortcode }})</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->

                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>Product Color Guide</a>
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size_id" id="productSize" class="form-control" required>
                                                <option value="">Select Your Size</option>
                                            </select>
                                     </div><!-- End .select-custom -->

                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>Product Size Guide</a>
                                    </div><!-- End .details-filter-row -->
                                @endif



                                <div class="product-details-action">
                                    <div class="details-action-col">
                                        @if ($product->type == 0)
                                            @php
                                               $stockCount = \App\Simplestock::where('product_id',$product->id)->count();
                                               $stockCheck = \App\Simplestock::where('product_id',$product->id)->first();
                                            @endphp
                                            <div class="product-details-quantity">
                                               @if($stockCount>0)
                                                <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="{{ $stockCheck->total }}" step="1" data-decimals="0" required>
                                               @else
                                                 <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
                                               @endif
                                            </div><!-- End .product-details-quantity -->
                                                 {{-- <a href="#" class="btn-product btn-cart"><span>add to cart</span></a> --}}
                                                @if($stockCount>0)
                                                    @if($stockCheck->total>0)
                                                        <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                                    @else
                                                        <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                    @endif
                                                @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <div id="maxOrderQty">
                                                    <div class="product-details-quantity">
                                                        <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
                                                    </div>
                                                </div>
                                                @php 
                                                   $stockCount = \App\Stock::where('product_id',$product->id)->count();
                                                @endphp
                                                @if($stockCount>0)
                                                <div id="outofstock">
                                                    <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                                </div>
                                                @else
                                                   <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @endif
                                    </div><!-- End .details-action-col -->

                                    <div class="details-action-wrapper">
                                        <a href="{{ url('add-to-withlist',$product->id) }}" class="btn-product btn-wishlist text-white" title="Add to wishlist" style="background: #39f; border:1px solid #39f; padding:4px;" ><span class="text-white">Add to wishlist</span></a>
                                       <span class="btn-product btn-wishlist text-white" title="Add to wishlist" style="visibility: hidden;"><span class="text-white">add to wishlist</span></span>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="{{ url('shops-by-category',$product->category->id) }}">{{ $product->category->name }}</a>,

                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            {!! $product->detail !!}
                            
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @php
                    $productByCat = \App\Product::where('category_id',$product->category->id)->inRandomOrder()->take(10)->get();
                @endphp
                @foreach ($productByCat as $item)
                <form action="{{ url('add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <input type="hidden" name="product_name" value="{{ $item->name }}">
                    <input type="hidden" name="product_code" value="{{ $item->code }}">
                    <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                    <input type="hidden" name="qty" value="1">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            @if($item->sales_price < $item->price)
                                <span class="product-label label-sale">-{{ $item->discount() }}%</span>
                            @endif
                            @php
                                $current_date = date('yy-m-d');
                            @endphp
                            @if ($current_date < $item->newProduct())
                                <span class="product-label label-new">New</span>
                            @else
                                <span class="product-label label-sale">Sale</span>
                            @endif
                            <a href="{{ url('/product/detail/'.$item->id) }}">
                                <img src="{{asset('back/images/product/'.$item->feature_image) }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <span class="btn-product-icon btn-wishlist"><sup>{{ $item->withlistCount() }}</sup></span>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action" style="border: 0.1rem solid #FCB941; margin-bottom: 0.6rem; background-color: #FCB941;">
                                @if ($item->type == 0)
                                   @php
                                       $stockCount = \App\Simplestock::where('product_id',$item->id)->count();
                                       $stockCheck = \App\Simplestock::where('product_id',$item->id)->first();
                                   @endphp
                                      @if ($stockCount>0)
                                        @if($stockCheck->total>0)
                                            <button class="btn-product btn-cart" title="Add to cart" style="border: 0;"><span>add to cart</span></button>
                                        @else
                                            <button disabled="disabled" class="btn btn-danger">Sorry! Out Of Stock</button>
                                        @endif
                                       @else
                                          <button disabled="disabled" class="btn btn-danger">Sorry! Out Of Stock</button>
                                       @endif
                                @else
                                    <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart" title="View Detail"><span>View Detail</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url('shops-by-category',$item->category->id)}}">{{ $item->category->name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                @if ($item->sales_price < $item->price)
                                    <span class="font-weight-light line-through">NPR.{{ $item->price }}</span>
                                @endif
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </form>
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->


</div>
<input type="hidden" id="productId" value="{{ $product->id }}">
<input type="hidden" id="product_Price" value="{{ $product->sales_price }}">
@endsection

@section('scripts')
 <script>

// get size by color
  $('#color').on('change', function(e){
    var color_id = e.target.value;
    //  console.log(color_id);
    axios.get('/size/by-color/'+color_id)
      .then(function (response) {
          var sizes = response.data;
          $('#productSize').empty();
          $('#productSize').append('<option value="" selected="selected">Select Your Size</option>');
          for (let index = 0; index < sizes.length; index++) {
              const element = sizes[index];
              $('#productSize').append('<option value="'+element.id+'">--'+element.name+' ('+element.shortcode+')</option>');
          }
          
    //   console.log(sizes);
    })
    .catch(function (error) {
        console.log(error);
    })
  });
 </script>
@endsection
