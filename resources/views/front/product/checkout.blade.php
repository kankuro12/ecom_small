@extends('front.layouts.app')
@section('title','Checkout')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shops</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                <li class="breadcrumb-item" aria-current="page">Shops</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content mt-1">
        <div class="checkout">
            <div class="container">
                <div class="col-lg-9 pl-0">
                    <div style="margin:2rem 0; ">
                        @include('front.layouts.message')
                    </div>
                </div>
                <div class="cart-discount">
                    <form action="{{ url('apply/coupon-code') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="coupon_code" required placeholder="Apply coupon code">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary-2" type="submit" style="height: 40px;"><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- End .input-group -->
                    </form>
                </div><!-- End .cart-discount -->
                <form action="{{ url('checkout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Shipping Details <span style="font-size:10px;">(You may also change following details)</span></h2><!-- End .checkout-title -->
                               <p>*NOTE :- Billing details will be same as your account details</p>
                               <div class="row">
                                   <div class="col-md-6">
                                       <label>Full Name *</label>
                                       <input type="text" value="{{ $userDetail->name }}" name="name" class="form-control" required>
                                   </div>
                                   <div class="col-md-6">
                                        <label>Address *</label>
                                        <input type="text" class="form-control" value="{{ $userDetail->address }}" name="address" placeholder="Enter your proper address" required>
                                   </div>
                               </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                       <label>District *</label>
                                        <select name="district" class="form-control" id="shippingCharge" required>
                                            <option value="">==== Select District ====</option>
                                            @foreach(\App\District::all() as $dis)
                                                <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Twon / City *</label>
                                        <input type="text" name="city" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" name="zipcode" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" name="phone" value="{{ $userDetail->phone }}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" name="email" value="{{ $userDetail->email }}" class="form-control" required>

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td><a href="{{ url('product/detail/'.$item->product_id) }}">{{ $item->product_name }}</a><br>
                                                [{{ $item->qty}}x{{ $item->price}}]
                                                </td>
                                                <td>NPR {{ $item->price * $item->qty }}</td>
                                            </tr>
                                         @php
                                             $total = $total + ($item->price * $item->qty)
                                         @endphp
                                        @endforeach
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
                                                <td>Total:</td>
                                                <td>NPR {{ $total - Session::get('couponAmount') }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                        @else
                                            <tr class="summary-subtotal">
                                                <td>Total:</td>
                                                <td>NPR {{ $total }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                        @endif
                                            <tr>
                                                <td>Shipping Charge:</td>
                                                <td id="shippingCharge1">NPR 0.00</td>
                                            </tr>
                                        @if (!empty(Session::get('couponAmount')))
                                            <tr class="summary-total">
                                                <td>Grand Total:</td>
                                                <td class="summary_total">NPR {{ $total - Session::get('couponAmount') }}</td>
                                                <input type="hidden" name="total" value="{{ $total-Session::get('couponAmount') }}" class="g-total">
                                            </tr><!-- End .summary-subtotal -->
                                        @else
                                            <tr class="summary-total">
                                                <td>Grand Total:</td>
                                                <td class="summary_total">NPR {{ $total }}</td>
                                                <input type="hidden" name="total" value="{{ $total }}" class="g-total">
                                            </tr><!-- End .summary-total -->
                                        @endif
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash on delivery
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Place Order</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</div>
@endsection
@section('scripts')
<script>
    $('#shippingCharge').on('change', function(e){
    var district = e.target.value;
     console.log(district);
    axios.get('shipping-charge/'+district)
      .then(function (response) {
          var result = response.data;
        //   console.log(result);
        $('#shippingCharge1').empty();
         var charge = parseFloat(result.shipping_charge);
         $('#shippingCharge1').append('NPR '+charge);

         var tot = parseFloat($('.g-total').val());
         $('.summary_total').empty();
         var sum_tot = (charge + tot);
         $('.summary_total').append('NPR '+sum_tot);
    
    })
    .catch(function (error) {
        console.log(error);
    })
  });
</script>
@endsection
