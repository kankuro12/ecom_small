@extends('front.layouts.app')
@section('title','Shopping Cart')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping</li>
                <li class="breadcrumb-item" aria-current="page">Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div style="margin:2rem 0;">
                            @include('front.layouts.message')
                        </div>
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($userCart as $item)
                                @php
                                    $img = \App\Product::where('id',$item->product_id)->first();
                                @endphp
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('back/images/product/'.$img->feature_image) }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="{{ url('product/detail/'.$item->product_id) }}">{{ $item->product_name }}</a>
                                                    @if ($item->size_name == null)
                                                        <p>This Product Has Not Atrributes</p>
                                                    @else
                                                        <p>{{ $item->size_name }} | {{ $item->color_name }}</p>
                                                    @endif
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">NPR {{ $item->price }}</td>
                                        <td>
                                            <div class="text-center">
                                                <a href="{{ url('cart/update-qty/'.$item->id.'/1') }}" class="badge badge-secondary p-2">+</a>
                                                <div style="margin-top:3px;">
                                                    <input type="text" class="text-center" disabled="disabled" value="{{ $item->qty }}" min="1" max="5" step="1" data-decimals="0" style="width:40px; height:25px;">
                                                </div>
                                                @if ($item->qty > 1)
                                                    <a href="{{ url('cart/update-qty/'.$item->id.'/-1') }}" class="badge badge-secondary p-2">-</a>
                                                @endif
                                            </div>
                                            {{-- <div class="cart-product-quantity">
                                                <input type="number" class="form-control" value="{{ $item->qty }}" min="1" max="10" step="1" data-decimals="0" required>
                                            </div> --}}
                                        </td>
                                        <td class="total-col">NPR {{ $item->price * $item->qty }}</td>
                                        <td class="remove-col"><a href="{{ url('remove/cart/item/'.$item->id) }}" class="btn-remove"><i class="icon-close"></i></a></td>
                                    </tr>
                                    @php
                                        $total = $total + $item->price * $item->qty;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="{{ url('apply/coupon-code') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="coupon_code" required placeholder="Apply coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    @if (!empty(Session::get('couponAmount')))
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>NPR {{ $total }}</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-subtotal">
                                            <td>Coupon Discount:</td>
                                            <td>NPR {{ Session::get('couponAmount') }}</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-subtotal">
                                            <td>Grand Total:</td>
                                            <td>NPR {{ $total - Session::get('couponAmount') }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                    @else
                                    <tr class="summary-subtotal">
                                        <td>Grand Total:</td>
                                        <td>NPR {{ $total }}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    @endif
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{ url('shops') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->


</div>




@endsection
@section('scripts')

@endsection
