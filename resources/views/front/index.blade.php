@extends('front.layouts.app')
@section('title','Home')
@section('content')
@php 
    $basic_info = \App\Homeinfo::where('id',1)->first();
    $pop = \App\Popup::where('id',1)->first();
@endphp
<main class="main">
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                "nav": false,
                "responsive": {
                    "992": {
                        "nav": true
                    }
                }
            }'>
            @foreach(\App\Slider::all() as $slid)
            <div class="intro-slide" style="background-image: url({{asset('back/images/slider/'.$slid->image) }});">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">
                            <h3 class="intro-subtitle">{{ $slid->sub_title }}</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">{!! $slid->title !!}
                                <span>
                                    {!! $slid->price_section !!}
                                </span>
                            </h1><!-- End .intro-title -->
                            @if($slid->link == null)
                            <a href="{{ url('shops') }}" class="btn btn-outline-primary-2">
                                <span>{{ $slid->button_name }}</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                            @else
                            <a href="{{ $slid->link }}" class="btn btn-outline-primary-2">
                                <span>{{ $slid->button_name }}</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                            @endif
                        </div><!-- End .col-auto offset-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->
            @endforeach
            
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-4"></div><!-- End .mb-2 -->

    <div class="container">
        <h2 class="title text-center mb-2">Explore Popular Brands</h2><!-- End .title -->

        <div class="cat-blocks-container">
            <div class="row">
                @foreach(\App\Brand::latest()->inRandomOrder()->take(12)->get() as $brand)
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{ url('shops-by-brand',$brand->id)}}" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{asset('back/images/brand/'.$brand->logo) }}" alt="brand image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">{{$brand->name}}</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->

    <div class="mb-2"></div><!-- End .mb-2 -->

    <div class="container">
        @php
            $top_left = \App\Banner::where('id',1)->first();
            $top_middle = \App\Banner::where('id',2)->first();
            $top_right = \App\Banner::where('id',3)->first();
        @endphp
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{asset('back/images/banner/'.$top_left->image) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white"><a href="#">{{ $top_left->sub_title }}</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">{!! $top_left->title !!}</a></h3><!-- End .banner-title -->
                        @if($top_left->link == null)
                           <a href="{{ url('shops') }}" class="banner-link">{{ $top_left->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @else
                           <a href="{{ $top_left->link }}" class="banner-link">{{ $top_left->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-3 -->

            <div class="col-sm-6 col-lg-3 order-lg-last">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{asset('back/images/banner/'.$top_right->image) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white"><a href="#">{{ $top_right->sub_title }}</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">{!! $top_right->title !!}</a></h3><!-- End .banner-title -->
                        @if($top_right->link == null)
                           <a href="{{ url('shops') }}" class="banner-link">{{ $top_right->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @else
                           <a href="{{ $top_right->link }}" class="banner-link">{{ $top_right->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-3 -->

            <div class="col-lg-6">
            <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{asset('back/images/banner/'.$top_middle->image) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">{{ $top_middle->sub_title }}</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">{!! $top_middle->title !!}</a></h3><!-- End .banner-title -->
                        @if($top_middle->link == null)
                           <a href="{{ url('shops') }}" class="banner-link">{{ $top_middle->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @else
                           <a href="{{ $top_middle->link }}" class="banner-link">{{ $top_middle->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="bg-light pt-3 pb-5">
        <div class="container">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">{{ $basic_info->product_top }}</h2><!-- End .title -->
                </div><!-- End .heading-left -->

               <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="hot-all-link" data-toggle="tab" href="#hot-all-tab" role="tab" aria-controls="hot-all-tab" aria-selected="true">All</a>
                        </li>
                        @foreach ($category as $item)
                            <li class="nav-item">
                                <a class="nav-link" id="hot-{{ $item->id }}-link" data-toggle="tab" href="#hot-{{ $item->id }}-tab" role="tab" aria-controls="hot-{{ $item->id }}-tab" aria-selected="false">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
               </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
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
                                "1280": {
                                    "items":5,
                                    "nav": true
                                }
                            }
                        }'>
                        @foreach (\App\Product::where('onsale',1)->inRandomOrder()->take(20)->get() as $item)
                        <form action="{{ url('add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="product_name" value="{{ $item->name }}">
                            <input type="hidden" name="product_code" value="{{ $item->code }}">
                            <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                            <input type="hidden" name="qty" value="1">
                            <div class="product">
                                <figure class="product-media">
                                    @if ($item->sales_price < $item->price)
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
                                    <a href="#">
                                        <img src="{{asset('back/images/product/'.$item->feature_image) }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        @if(empty(Auth::check()))
                                          <span class="btn-product-icon btn-wishlist"><sup>{{ $item->withlistCount() }}</sup></span>
                                        @else
                                           @if($item->withlistProductId() == $item->id)
                                             <span class="btn-product-icon btn-wishlist text-white" style="background-color: #39f;"><sup>{{ $item->withlistCount() }}</sup></span>
                                           @else
                                             <span class="btn-product-icon btn-wishlist"><sup>{{ $item->withlistCount() }}</sup></span>
                                           @endif
                                        @endif
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action" style="border: 0.1rem solid #FCB941; margin-bottom: 0.6rem; background-color: #FCB941;">
                                        @if ($item->type == 0)
                                           @php
                                               $stockCount = \App\Simplestock::where('product_id',$item->id)->count();
                                               $stockCheck = \App\Simplestock::where('product_id',$item->id)->first();
                                           @endphp
                                              @if ($stockCount>0)
                                                @if($stockCheck->total>0)
                                                  <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                @else
                                                <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                              @else
                                                 <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                              @endif
                                        @else
                                            <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart text-white" title="View Detail"><span class="text-white">View Detail</span></a>
                                        @endif
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $item->category->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                        @if ($item->sales_price < $item->price)
                                            <span class="font-weight-light line-through"> NPR.{{ $item->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </form>
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                @if (!empty($category[0]->id))
                    <div class="tab-pane p-0 fade" id="hot-{{ $category[0]->id }}-tab" role="tabpanel" aria-labelledby="hot-{{ $category[0]->id }}-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($category[0]->products as $item)
                            <form action="{{ url('add-to-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="product_name" value="{{ $item->name }}">
                                <input type="hidden" name="product_code" value="{{ $item->code }}">
                                <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                                <input type="hidden" name="qty" value="1">
                                <div class="product">
                                    <figure class="product-media">
                                        @if ($item->sales_price < $item->price)
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
                                        <a href="product.html">
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
                                                       <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                    @else
                                                        <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                    @endif
                                                @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart text-white" title="View Detail"><span class="text-white">View Detail</span></a>
                                            @endif
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $item->category->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                            @if ($item->sales_price < $item->price)
                                               <span class="font-weight-light line-through"> NPR.{{ $item->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </form>
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endif
                @if (!empty($category[1]->id))
                    <div class="tab-pane p-0 fade" id="hot-{{ $category[1]->id }}-tab" role="tabpanel" aria-labelledby="hot-{{ $category[1]->id }}-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($category[1]->products as $item)
                            <form action="{{ url('add-to-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="product_name" value="{{ $item->name }}">
                                <input type="hidden" name="product_code" value="{{ $item->code }}">
                                <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                                <input type="hidden" name="qty" value="1">
                                <div class="product">
                                    <figure class="product-media">
                                        @if ($item->sales_price < $item->price)
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
                                        <a href="product.html">
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
                                                    <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                    @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                    @endif
                                                @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart text-white" title="Add to cart"><span class="text-white">View Detail</span></a>
                                            @endif
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $item->category->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                            @if ($item->sales_price < $item->price)
                                              <span class="font-weight-light line-through"> NPR.{{ $item->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </form>
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endif
                @if (!empty($category[2]->id))
                    <div class="tab-pane p-0 fade" id="hot-{{ $category[2]->id }}-tab" role="tabpanel" aria-labelledby="hot-{{ $category[2]->id }}-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($category[2]->products as $item)
                            <form action="{{ url('add-to-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="product_name" value="{{ $item->name }}">
                                <input type="hidden" name="product_code" value="{{ $item->code }}">
                                <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                                <input type="hidden" name="qty" value="1">
                                <div class="product">
                                    <figure class="product-media">
                                        @if ($item->sales_price < $item->price)
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
                                        <a href="product.html">
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
                                                    <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                    @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                    @endif
                                                @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart text-white" title="view detail"><span class="text-white">View Detail</span></a>
                                            @endif
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $item->category->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                            @if ($item->sales_price < $item->price)
                                                <span class="font-weight-light line-through"> NPR.{{ $item->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </form>
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endif
                @if (!empty($category[3]->id))
                    <div class="tab-pane p-0 fade" id="hot-{{ $category[3]->id }}-tab" role="tabpanel" aria-labelledby="hot-{{ $category[3]->id }}-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($category[3]->products as $item)
                            <form action="{{ url('add-to-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="product_name" value="{{ $item->name }}">
                                <input type="hidden" name="product_code" value="{{ $item->code }}">
                                <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                                <input type="hidden" name="qty" value="1">
                                <div class="product">
                                    <figure class="product-media">
                                        @if ($item->sales_price < $item->price)
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
                                        <a href="product.html">
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
                                                    <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                    @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                    @endif
                                                @else
                                                    <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart text-white" title="Add to cart"><span class="text-white">View Detail</span></a>
                                            @endif
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $item->category->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                            @if ($item->sales_price < $item->price)
                                                <span class="font-weight-light line-through"> NPR.{{ $item->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </form>
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endif
            </div><!-- End .tab-content -->
        </div><!-- End .container -->
    </div><!-- End .bg-light pt-5 pb-5 -->

    <div class="mb-3"></div><!-- End .mb-3 -->


    <div class="container clothing ">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">{{ $basic_info->product_bottom }}</h2><!-- End .title -->
            </div><!-- End .heading-left -->

           <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="clot-new-link" data-toggle="tab" href="#clot-new-tab" role="tab" aria-controls="clot-new-tab" aria-selected="true">New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="clot-featured-link" data-toggle="tab" href="#clot-featured-tab" role="tab" aria-controls="clot-featured-tab" aria-selected="false">Most Like</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="clot-best-link" data-toggle="tab" href="#clot-best-tab" role="tab" aria-controls="clot-best-tab" aria-selected="false">Best Seller</a>
                    </li>
                </ul>
           </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
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
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @php
                        $current_date = date('yy-m-d');
                    @endphp
                    @foreach (\App\Product::where('onsale',1)->inRandomOrder()->get() as $item)
                      @if ($current_date < $item->newProduct())
                        <form action="{{ url('add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="product_name" value="{{ $item->name }}">
                            <input type="hidden" name="product_code" value="{{ $item->code }}">
                            <input type="hidden" name="product_image" value="{{ $item->feature_image }}">
                            <input type="hidden" name="qty" value="1">
                            <div class="product">
                                <figure class="product-media">
                                    @if ($item->sales_price < $item->price)
                                        <span class="product-label label-sale">-{{ $item->discount() }}%</span>
                                    @endif
                                    @if ($current_date < $item->newProduct())
                                      <span class="product-label label-new">New</span>
                                    @endif
                                    <a href="#">
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
                                                  <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                @else
                                                  <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                 <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                            @endif
                                        @else
                                            <a href="{{ url('/product/detail/'.$item->id) }}" class="btn-product btn-cart text-white" title="View Detail"><span class="text-white">View Detail</span></a>
                                        @endif
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $item->category->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ url('product/detail/'.$item->id) }}">{{ $item->name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">NPR.{{ $item->sales_price }}</span>
                                        @if ($item->sales_price < $item->price)
                                           <span class="font-weight-light line-through"> NPR.{{ $item->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </form>
                      @endif
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="clot-featured-tab" role="tabpanel" aria-labelledby="clot-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
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
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach(\App\Wishlist::select('product_id')->distinct()->get() as $item)
                        <form action="{{ url('add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <input type="hidden" name="product_name" value="{{ $item->product->name }}">
                            <input type="hidden" name="product_code" value="{{ $item->product->code }}">
                            <input type="hidden" name="product_image" value="{{ $item->product->feature_image }}">
                            <input type="hidden" name="qty" value="1">
                            <div class="product">
                                <figure class="product-media">
                                    @if ($item->product->sales_price < $item->product->price)
                                        <span class="product-label label-sale">-{{ $item->product->discount() }}%</span>
                                    @endif
                                    @if ($current_date < $item->product->newProduct())
                                      <span class="product-label label-new">New</span>
                                    @else
                                      <span class="product-label label-sale">Sale</span>
                                    @endif
                                    <a href="#">
                                        <img src="{{asset('back/images/product/'.$item->product->feature_image) }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                       <span class="btn-product-icon btn-wishlist"><sup>{{ $item->product->withlistCount() }}</sup></span>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action" style="border: 0.1rem solid #FCB941; margin-bottom: 0.6rem; background-color: #FCB941;">
                                        @if ($item->product->type == 0)
                                           @php
                                               $stockCount = \App\Simplestock::where('product_id',$item->product->id)->count();
                                               $stockCheck = \App\Simplestock::where('product_id',$item->product->id)->first();
                                           @endphp
                                           @if ($stockCount>0)
                                                @if($stockCheck->total>0)
                                                   <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                @else
                                                   <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                            @endif
                                        @else
                                            <a href="{{ url('/product/detail/'.$item->product->id) }}" class="btn-product btn-cart text-white" title="View Detail"><span class="text-white">View Detail</span></a>
                                        @endif
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $item->product->category->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ url('product/detail/'.$item->product->id) }}">{{ $item->product->name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">NPR.{{ $item->product->sales_price }}</span>
                                        @if ($item->product->sales_price < $item->product->price)
                                           <span class="font-weight-light line-through"> NPR.{{ $item->product->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </form>
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="clot-best-tab" role="tabpanel" aria-labelledby="clot-best-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
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
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach(\App\Orderitem::select('product_id')->distinct()->get() as $item)
                        <form action="{{ url('add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <input type="hidden" name="product_name" value="{{ $item->product->name }}">
                            <input type="hidden" name="product_code" value="{{ $item->product->code }}">
                            <input type="hidden" name="product_image" value="{{ $item->product->feature_image }}">
                            <input type="hidden" name="qty" value="1">
                            <div class="product">
                                <figure class="product-media">
                                    @if ($item->product->sales_price < $item->product->price)
                                        <span class="product-label label-sale">-{{ $item->product->discount() }}%</span>
                                    @endif
                                    @if ($current_date < $item->product->newProduct())
                                      <span class="product-label label-new">New</span>
                                    @else
                                      <span class="product-label label-sale">Sale</span>
                                    @endif
                                    <a href="#">
                                        <img src="{{asset('back/images/product/'.$item->product->feature_image) }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                       <span class="btn-product-icon btn-wishlist"><sup>{{ $item->product->withlistCount() }}</sup></span>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action" style="border: 0.1rem solid #FCB941; margin-bottom: 0.6rem; background-color: #FCB941;">
                                        @if ($item->product->type == 0)
                                           @php
                                               $stockCount = \App\Simplestock::where('product_id',$item->product->id)->count();
                                               $stockCheck = \App\Simplestock::where('product_id',$item->product->id)->first();
                                           @endphp
                                            @if ($stockCount>0)
                                                @if($stockCheck->total>0)
                                                  <button class="btn-product btn-cart text-white" title="Add to cart" style="border: 0;"><span class="text-white">add to cart</span></button>
                                                @else
                                                  <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                                @endif
                                            @else
                                                <button disabled="disabled" class="btn btn-danger">Out Of Stock</button>
                                            @endif
                                        @else
                                            <a href="{{ url('/product/detail/'.$item->product->id) }}" class="btn-product btn-cart text-white" title="View Detail"><span class="text-white">View Detail</span></a>
                                        @endif
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $item->product->category->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ url('product/detail/'.$item->product->id) }}">{{ $item->product->name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">NPR.{{ $item->product->sales_price }}</span>
                                        @if ($item->product->sales_price < $item->product->price)
                                           <span class="font-weight-light line-through"> NPR.{{ $item->product->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </form>
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    {{-- banner --}}
    @php
     $bottom_left = \App\Banner::where('id',4)->first();
     $bottom_right = \App\Banner::where('id',5)->first();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="{{ asset('back/images/banner/'.$bottom_left->image) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle d-none d-sm-block"><a href="#">{{ $bottom_left->sub_title }}</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="#">{!! $bottom_left->title !!}</a></h3><!-- End .banner-title -->
                        @if($top_left->link == null)
                          <a href="{{ url('shops') }}" class="banner-link banner-link-dark">{{ $bottom_left->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @else
                           <a href="{{ $bottom_left->link }}" class="banner-link banner-link-dark">{{ $bottom_left->button_name }}<i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ asset('back/images/banner/'.$bottom_right->image) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white  d-none d-sm-block"><a href="#">{{ $bottom_right->sub_title }}</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">{!! $bottom_right->title !!}</a></h3><!-- End .banner-title -->
                        @if($bottom_right->link == null)
                          <a href="{{ url('shops') }}" class="banner-link banner-link-dark">{{ $bottom_right->button_name }} <i class="icon-long-arrow-right"></i></a>
                        @else
                           <a href="{{ $bottom_right->link }}" class="banner-link banner-link-dark">{{ $bottom_right->button_name }}<i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div>
    {{-- end of banner --}}


    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="container">
        <h2 class="title title-border mb-5">Shop by Brands</h2><!-- End .title -->
        <div class="owl-carousel mb-5 owl-simple" data-toggle="owl"
            data-owl-options='{
                "nav": false,
                "dots": true,
                "margin": 30,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "420": {
                        "items":3
                    },
                    "600": {
                        "items":4
                    },
                    "900": {
                        "items":5
                    },
                    "1024": {
                        "items":6
                    },
                    "1280": {
                        "items":6,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
           @foreach(\App\Brand::all() as $b)
           <a href="{{ url('shops-by-brand',$b->id)}}" class="cat-block">
                <figure>
                    <span>
                        <img src="{{ asset('back/images/brand/'.$b->logo)}}" alt="Brand image">
                    </span>
                </figure>

                <h3 class="cat-block-title">{{ $b->name }}</h3><!-- End .cat-block-title -->
            </a>
           @endforeach  
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->

    <div class="cta cta-horizontal cta-horizontal-box bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2xl-5col">
                    <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                </div><!-- End .col-lg-5 -->

                <div class="col-3xl-5col">
                    <form action="javascript:void(0);" type="post">
                        @csrf
                        <div class="successMessage">
                            <div class="input-group">
                                <input type="email" onfocus="actionFunction();" name="email" class="form-control form-control-white newsletterEmail" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-white-2 buttonNewsletter" onclick="addEmail();" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                </div><!-- .End .input-group-append -->
                                
                            </div><!-- .End .input-group -->
                        </div>
                        <div class="p-2">
                            <span class="text-white message"></span>
                        </div>
                    </form>
                </div><!-- End .col-lg-7 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->

    <div class="blog-posts bg-light pt-4 pb-7">
        <div class="container">
            <h2 class="title">From Our Blog</h2><!-- End .title-lg text-center -->

            <div class="owl-carousel owl-simple" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "items": 3,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":3
                        },
                        "1280": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @foreach(\App\Blog::latest()->get() as $b)
                <article class="entry">
                    <figure class="entry-media">
                        <a href="{{ url('blog/detail',$b->id) }}">
                            <img src="{{asset('back/images/blog/'.$b->image) }}" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <span>{{ $b->publish }}</span>, By - {{ $b->post_by }}
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="{{ url('blog/detail',$b->id) }}">{{ $b->title}}</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>{{ str_limit($b->desc,100) }}</p>
                            <a href="{{ url('blog/detail',$b->id) }}" class="read-more">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .blog-posts -->
</main><!-- End .main -->


<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
     <div class="row justify-content-center">
         <div class="col-10">
             <div class="row no-gutters bg-white newsletter-popup-content">
                 <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                     <div class="banner-content text-center">
                         <img src="{{asset('front/images/info/'.$basic_info->logo) }}" class="logo" alt="logo" width="60" height="15">
                         <h2 class="banner-title">{!! $pop->title !!}</h2>
                         <p>{{ $pop->short_detail }}</p>
                         <form action="javascript:void(0);" type="post">
                           @csrf
                           <div class="successMessage">
                               <div class="input-group input-group-round successMessage">
                                   <input type="email" onfocus="actionFunction();" name="email" class="form-control form-control-white newsletterEmail" placeholder="Your Email Address" aria-label="Email Adress" required>
                                   <div class="input-group-append">
                                       <button class="btn" type="submit" onclick="addEmail();"><span>go</span></button>
                                   </div><!-- .End .input-group-append -->
                               </div><!-- .End .input-group -->
                           </div>
                         </form>
                         <div class="p-2">
                            <span class="text-danger message"></span>
                         </div>
                         <div class="custom-control custom-checkbox">
                             <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                             <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                         </div><!-- End .custom-checkbox -->
                     </div>
                 </div>
                 <div class="col-xl-2-5col col-lg-5 ">
                     <img src="{{asset('front/images/info/'.$pop->image) }}" class="newsletter-img" alt="newsletter">
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
@section('scripts')
<script>
 
function addEmail(){
    var email = $('.newsletterEmail').val();
     $.ajax({
         type:'post',
         url:'add-email',
         data:{email:email},
         success:function(res){
            if(res=="exists"){
                $('.message').html('<strong>Error : This email address already exists !</strong>')
                $('.message').show();
            }
            if(res=="save"){
               $('.successMessage').html('<h3 class="cta-title text-warning"><stront>Thanks for subscribing ! You will get information about product and coupons.</strong></h3>');
            }   
         },error:function(){
         }
     })
}

function actionFunction(){
    $('.message').hide();
}

</script>
@endsection
