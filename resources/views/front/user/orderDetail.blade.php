@extends('front.layouts.app')
@section('title','Order Detail')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Order<span>Detail</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('my-order') }}">Order</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Rate</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($orderDetail as $item)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{ url('/product/detail/'.$item->product_id) }}">
                                        <img src="{{ asset('back/images/product/'.$item->product->feature_image) }}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="{{ url('/product/detail/'.$item->product_id) }}"> {{ $item->product->name }} </a><br>
                                    @if ($item->color_id == null)
                                        <p>This product has not attributes</p>
                                    @else
                                    <strong> {{ $item->color_name}} | {{ $item->size_name }} </strong>
                                    @endif
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="stock-col"> {{ $item->qty }} </td>
                        <td class="price-col"> {{ $item->rate }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- End .table table-wishlist -->
            <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">Share on:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .wishlist-share -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

</div>

@endsection
