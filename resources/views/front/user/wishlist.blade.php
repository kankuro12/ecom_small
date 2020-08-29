@extends('front.layouts.app')
@section('title','Wishlist Product')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Wishlist<span>Product</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                <li class="breadcrumb-item" aria-current="page">Product</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content mt-2">
            	<div class="container">
                <div style="margin-bottom:3rem;">
                    @include('front.layouts.message')
                </div>
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Product</th>
                                <th>Price</th>
                                <th></th>
							</tr>
						</thead>

						<tbody>
                            @foreach(\App\Wishlist::where('user_id',Auth::user()->id)->get() as $item)
							<tr>
								<td class="product-col" style="width: 220px;">
									<div class="product">
										<figure class="product-media">
											<a href="{{ url('product/detail',$item->product_id) }}">
												<img src="{{ asset('back/images/product/'.$item->product->feature_image) }}" alt="Product image">
											</a>
										</figure>

										<h3 class="product-title">
                                            <a href="{{ url('product/detail',$item->product_id) }}"><strong>{{ $item->product->name }}</strong></a>
                                        </h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col">NPR {{ $item->product->sales_price }}</td>
								<td class="remove-col"><a href="{{ url('remove-wishlist-item',$item->id) }}" class="badge badge-danger" title="Remove Item">Remove</a></td>
							</tr>
							@endforeach
						</tbody>
					</table><!-- End .table table-wishlist -->
            	</div><!-- End .container -->
    </div>
</div>
@endsection
