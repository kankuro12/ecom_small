@extends('front.layouts.app')
@section('title','Profile')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">User<span>Detail</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    @php
        $user = \App\User::where('id',Auth::user()->id)->first();
        $basic_info = \App\Homeinfo::where('id',1)->first();
    @endphp
    <div class="page-content mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 ">
                        <div class="pb-3">
                            @if($user->image == null)
                              <img src="{{ asset('front/images/info/'.$basic_info->logo)}}" alt="customer-image" class="img-thumbnail" style="height:200px;">
                            @else
                              <img src="{{ asset('front/images/customers/'.$user->image)}}" alt="customer-image" class="img-thumbnail" style="height:200px;">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="mb-2">
                            @include('front.layouts.message')
                        </div>
                        <form action="{{ url('my-profile') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{ $user->name }}" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $user->address }}" class="form-control" name="address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $user->phone }}" class="form-control" name="phone" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $user->email }}" class="form-control" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>UPDATE</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection
