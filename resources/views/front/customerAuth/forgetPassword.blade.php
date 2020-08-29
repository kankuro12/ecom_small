@extends('front.layouts.app')
@section('title','Forget Password')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Forget<span>Password</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url({{ asset('front/images/backgrounds/login-bg.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="pb-2">
                        @include('front.layouts.message')
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Forget Password</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">

                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="register-email-2"> Email address *</label>
                                    <input type="email" class="form-control" id="register-email-2" placeholder="Enter Email" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Submit</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                           
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</div>

@endsection
@section('scripts')

@endsection
