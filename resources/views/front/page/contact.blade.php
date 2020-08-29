@extends('front.layouts.app')
@section('title','Contact Us')
@section('content')
@php 
    $basic_info = \App\Homeinfo::where('id',1)->first();
@endphp
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Contact Us<span>Page</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                <li class="breadcrumb-item" aria-current="page">Page</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url({{ asset('front/images/contact-header-bg.jpg') }})">
            <h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                    <p class="mb-3">{{ $basic_info->short_detail }}</p>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-map-marker"></i>
                                        {{ $basic_info->address }}
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:{{ $basic_info->phone }}">{{ $basic_info->phone }}</a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:{{ $basic_info->email }}">{{ $basic_info->email }}</a>
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-7 -->

                        <div class="col-sm-5">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <span class="text-dark">Monday-Saturday</span> <br>8am-7pm ET
                                    </li>
                                    <li>
                                        <i class="icon-calendar"></i>
                                        <span class="text-dark">Sunday</span> <br>8am-6pm ET
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-5 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-6 -->
                <div class="col-lg-6">
                    <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                    <p class="mb-2">Use the form below to get in touch with the sales team</p>
                    <div class="pb-2">
                        @include('front.layouts.message')
                    </div>
                    @php
                      if(!empty(Auth::check())){
                          $user_id = Auth::user()->id;
                          $user = \App\User::where('id',$user_id)->first();
                      }
                    @endphp
                    <form action="{{ url('customer-messages') }}" method="POST" class="contact-form mb-3">
                        @csrf
                        @if (empty(Auth::check()))
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Name</label>
                                    <input type="text" class="form-control" id="cname" placeholder="Name *" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Phone</label>
                                    <input type="tel" class="form-control" id="cphone" placeholder="Phone">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Subject</label>
                                    <input type="text" class="form-control" id="csubject" placeholder="Subject">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label for="cmessage" class="sr-only">Message</label>
                            <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>
                        @else
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Name</label>
                                    <input type="text" class="form-control" id="cname" value="{{ $user->name }}" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="cemail" value="{{ $user->email }}" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Phone</label>
                                    <input type="tel" class="form-control" id="cphone" value="{{ $user->phone }}" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="csubject" placeholder="Subject" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label for="cmessage" class="sr-only">Message</label>
                            <textarea class="form-control" cols="30" name="message" rows="4" id="cmessage" required placeholder="Message *"></textarea>
                        @endif
                        @if (empty(Auth::check()))
                        <p><strong>Please Login Fisrt To Send A Message !</strong></p>
                        @else
                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                        @endif
                    </form><!-- End .contact-form -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <hr class="mt-4 mb-5">

            <div class="stores mb-4 mb-lg-5">
                <h2 class="title text-center mb-3">Our Stores</h2><!-- End .title text-center mb-2 -->
                @php 
                    $store = \App\Store::all();
                @endphp
                <div class="row">
                    @foreach($store as $s)
                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="{{ asset('back/images/store/'.$s->image) }}" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->

                                <div class="col-sm-7 col-xl-6 mt-1">
                                    <div class="store-content">
                                        <h3 class="store-title">{{ $s->name }}</h3><!-- End .store-title -->
                                        <address>{{ $s->address}}</address>
                                        <div><a href="tel:{{ $s->phone }}">{{ $s->phone }}</a></div>

                                        <h4 class="store-subtitle">Store Hours:</h4><!-- End .store-subtitle -->
                                        {!! $s->opening !!}
                                        <div class="mt-4">
                                            <a href="{{ url('shops')}}" class="btn btn-primary">Shop Now</a>
                                        </div>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .stores -->
        </div><!-- End .container -->
        <div id="map"></div><!-- End #map -->
    </div><!-- End .page-content -->




</div>
@endsection
