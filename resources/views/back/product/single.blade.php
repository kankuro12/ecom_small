@extends('back.layouts.app')
@section('title','Product Detail')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> Details of Product </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('product.index') }}" class="btn btn-primary">Product List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                @include('back.layouts.message')
                            <div class="row">
                                <div class="col-md-5">
                                        <dl class="row">
                                                <dt class="col-md-6">Title :</dt>
                                                <dd class="col-md-6">{{ $product->name }}</dd>
                                                <dt class="col-md-6">Price:</dt>
                                                <dd class="col-md-6">Rs.{{ $product->price }}</dd>
                                                <dt class="col-md-6">Sales Price</dt>
                                                <dd class="col-md-6">Rs.{{ $product->sales_price }}</dd>
                                                <dt class="col-md-6">Product Code :</dt>
                                                <dd class="col-md-6">{{ $product->code }}</dd>
                                                <dt class="col-md-6">Product Type :</dt>
                                                <dd class="col-md-6"><span class="badge {{$product->type?'badge-success':'badge-primary'}}">{{$product->type?'Variable':'Simple'}}</span></dd>
                                                <dt class="col-md-6">Product On Sales :</dt>
                                                <dd class="col-md-6"><span class="badge {{$product->onsale?'badge-success':'badge-danger'}}">{{$product->onsale?'Yes':'No'}}</dd>
                                                <dt class="col-md-6">Promo Item :</dt>
                                                <dd class="col-md-6"><span class="badge {{$product->promo?'badge-success':'badge-danger'}}">{{$product->promo?'Yes':'No'}}</dd>
                                                <dt class="col-md-6">Brand Name :</dt>
                                                <dd class="col-md-6">{{ $product->brand->name }}</dd>
                                                <dt class="col-md-6">Product Category :</dt>
                                                <dd class="col-md-6">{{ $product->category->getName() }}</dd>
                                                <dt class="col-md-6">Product Size :</dt>
                                                <dd class="col-md-6">
                                                    @if ($product->type==0)
                                                        <span class="badge badge-danger">No Size</span>
                                                    @else
                                                        @foreach(\App\Size::all() as $attr)
                                                            <span class="badge badge-info">{{ $attr->name }} ({{ $attr->shortcode }})</span>
                                                        @endforeach
                                                    @endif
                                                </dd>
                                                <dt class="col-md-6">Product Color :</dt>
                                                <dd class="col-md-6">
                                                    @if ($product->type==0)
                                                        <span class="badge badge-danger">No Color</span>
                                                    @else
                                                        @foreach(\App\Color::all() as $attr)
                                                             <span class="badge badge-info">{{ $attr->name }} ({{ $attr->shortcode }})</span>
                                                        @endforeach
                                                    @endif
                                                </dd>
                                                <dt class="col-md-6">Product Tags :</dt>
                                                <dd class="col-md-6">{{ $product->tag }}  </dd>
                                                {{-- <dt class="col-md-6">Additional Person Price :</dt>
                                                <dd class="col-md-6">Rs. {{number_format($roomType->additional_person_price,2)}} </dd>
                                                <dt class="col-md-6">Extra Bed Price :</dt>
                                                <dd class="col-md-6">Rs,{{number_format($roomType->extra_bed_price,2)}} </dd> --}}
                                                <dt class="col-md-6">Short Detail :</dt>
                                                <dd class="col-md-6">{{ $product->short_detail }}</dd>
                                            </dl>
                                            <hr>
                                            <label><strong>Description :</strong></label>
                                            <p> {{ $product->detail }} </p>
                                </div>
                                <div class="col-md-7">
                                    <div class="text-center">
                                        <p><strong>Product Feature Image</strong></p>
                                        <img src="{{ asset('back/images/product/'.$product->feature_image) }}" alt="..." class="img-thumbnail" style="height:250px;" >
                                    </div>
                                    <hr>
                                    @if (isset($image))
                                    <div class="row">
                                      @php
                                        $g_image = \App\Productimage::where('product_id',$product->id)->get();
                                      @endphp
                                              @foreach ($g_image as $i)
                                              <div class="col-md-4" style="border:1px red solid; padding:1rem; margin-bottom:10px; margin-right:10px;">
                                                  <img src="{{ asset('back/images/gallery/'.$i->image) }}" alt="..." class="img-thumbnail" style="height:230px;" >
                                                  <div class="text-center mt-1">
                                                      <a href="{{ route('gallery.image.delete',$i->id) }}" class="badge badge-danger">Delete</a>
                                                  </div>
                                              </div>
                                              @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>
@endsection
