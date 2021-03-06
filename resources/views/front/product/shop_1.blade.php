@extends('front.layouts.app')
@section('title','All Product Items')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Shop<span>Items</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;" >
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                <li class="breadcrumb-item" aria-current="page">Items</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            @php
                                $allProduct = \App\Product::select('id')->count();
                            @endphp
                            <div class="toolbox-info">
                                @if($allProduct < 16)
                                    Showing <span>{{ $allProduct }} of {{ $allProduct }}</span> Products
                                @else
                                   Showing <span>16 of {{ $allProduct }}</span> Products
                                @endif
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <form action="{{ url('price-short') }}" method="POST">
                                        @csrf
                                        <select name="sortby" id="sortby" class="form-control" onchange="javascript:this.form.submit();">
                                            <option value="popularity" selected="selected">Select Option</option>
                                            <option value="desc"> Price In Descending </option>
                                        </select>
                                    </form>
                                </div>
                            </div><!-- End .toolbox-sort -->
                            <div class="toolbox-layout">
                                <a href="{{ url('shops') }}" class="btn-layout">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="10" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="10" height="4" />
                                    </svg>
                                </a>

                                <a href="{{ url('shops-1') }}" class="btn-layout active">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                    </svg>
                                </a>
                            </div><!-- End .toolbox-layout -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach ($products as $p)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                               @if($p->sales_price < $p->price)
                                                   <span class="product-label label-sale">-{{ $p->discount() }}%</span>
                                                @endif
                                                @php
                                                    $current_date = date('yy-m-d');
                                                @endphp
                                                @if ($current_date < $p->newProduct())
                                                  <span class="product-label label-new">New</span>
                                                @else
                                                  <span class="product-label label-sale">Sale</span>
                                                @endif
                                                <a href="{{ url('product/detail/'.$p->id) }}">
                                                    <img src="{{ asset('back/images/product/'.$p->feature_image) }}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    @if(empty(Auth::check()))
                                                        <span class="btn-product-icon btn-wishlist"><sup>{{ $p->withlistCount() }}</sup></span>
                                                    @else
                                                       {!! $p->withlistProductId() !!} 
                                                    @endif
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action" style="margin-bottom: 6px;">
                                                        <a href="{{ url('product/detail/'.$p->id) }}" title="View Detail" class="btn-product btn-cart"><span>View Detail</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="{{ url('shops-by-category',$p->category->id) }}">{{ $p->category->name }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{ url('product/detail/'.$p->id) }}">{{ $p->name }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="new-price">NPR.{{ $p->sales_price }}</span>
                                                    @if ($p->sales_price < $p->price)
                                                        <span class="font-weight-light line-through"> NPR.{{ $p->price }}</span>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                                   @php
                                                     $g_image = \App\Productimage::where('product_id',$p->id)->get();
                                                   @endphp
                                                <div class="product-nav product-nav-thumbs">
                                                    @foreach ($g_image as $i)
                                                        <a href="#" class="active">
                                                            <img src="{{ asset('back/images/gallery/'.$i->image) }}" alt="product gallery">
                                                        </a>
                                                    @endforeach
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach 
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    

                    <nav aria-label="Page navigation">
                        <div class="pagination">
                           {{ $products->links() }}
                        </div>
                    </nav>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first" style="margin-top: 18px;">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach (\App\Category::all() as $cat)
                                        <form action="{{ url('category-filter') }}" method="POST">
                                            @csrf
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" onchange="javascript:this.form.submit();" name="cat" value="{{ $cat->id }}" class="custom-control-input" id="cat-{{ $cat->id }}">
                                                    <label class="custom-control-label" for="cat-{{ $cat->id }}">{{ $cat->name }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{ $cat->productCount() }}</span>
                                            </div><!-- End .filter-item -->
                                        </form>
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->


                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-color" role="button" aria-expanded="true" aria-controls="widget-color">
                                        Product Color
                                    </a>
                                </h3><!-- End .widget-title -->
                                <div class="collapse show" id="widget-color">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            @foreach (\App\Color::all() as $item)
                                            <form action="{{ url('color-filter') }}" method="POST">
                                                @csrf
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="color" onchange="javascript:this.form.submit();" value="{{ $item->id }}"  class="custom-control-input" id="color-{{ $item->id }}">
                                                        <label class="custom-control-label" for="color-{{ $item->id }}">{{ $item->name }} ({{ $item->shortcode }})</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                            </form>
                                            @endforeach
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-size" role="button" aria-expanded="true" aria-controls="widget-size">
                                        Product Size
                                    </a>
                                </h3><!-- End .widget-title -->
                                <div class="collapse show" id="widget-size">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            @foreach (\App\Size::all() as $item)
                                            <form action="{{ url('size-filter') }}" method="POST">
                                                @csrf
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" onchange="javascript:this.form.submit();" name="size" value="{{ $item->id }}" class="custom-control-input" id="size-{{ $item->id }}">
                                                        <label class="custom-control-label" for="size-{{ $item->id }}">{{ $item->name }} ({{ $item->shortcode }})</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                            </form>
                                            @endforeach
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->


                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @foreach (\App\Brand::all() as $item)
                                        <form action="{{ url('brand-filter')}}" method="POST">
                                            @csrf
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="brand" value="{{ $item->id }}" onchange="javascript:this.form.submit();" class="custom-control-input" id="brand-{{ $item->id }}">
                                                    <label class="custom-control-label" for="brand-{{ $item->id }}">{{ $item->name }}</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        </form>
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <!-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div>

                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->





</div>
@endsection

@section('scripts')

@endsection
