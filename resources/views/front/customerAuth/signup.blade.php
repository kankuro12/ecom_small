@extends('front.layouts.app')
@section('title','Register')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Customer<span>Register</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Register</li>
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
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error has been occurred !</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
                <div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form action="{{ url('customer-login') }}" method="POST">
                                    @csrf
                                     <div class="form-group">
                                         <label for="singin-email">Username or email address *</label>
                                         <input type="text" class="form-control" id="singin-email" name="email" required>
                                     </div><!-- End .form-group -->

                                     <div class="form-group">
                                         <label for="singin-password">Password *</label>
                                         <input type="password" class="form-control" id="singin-password" name="password" required>
                                     </div><!-- End .form-group -->

                                     <div class="form-footer">
                                         <button type="submit" class="btn btn-outline-primary-2">
                                             <span>LOG IN</span>
                                             <i class="icon-long-arrow-right"></i>
                                         </button>

                                         <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="signin-remember">
                                             <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                         </div><!-- End .custom-checkbox -->

                                         <a href="{{ url('forget-password')}}" class="forgot-link">Forgot Your Password?</a>
                                     </div><!-- End .form-footer -->
                                 </form>
							    	
							    </div><!-- .End .tab-pane -->
							    <div class="tab-pane fade active show" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Your Full Name *</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="address"> Your Address *</label>
                                            <input type="text" class="form-control" id="addr" placeholder="Enter Address" name="address" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="phone">Your Phone Number *</label>
                                            <input type="text" class="form-control" id="number" placeholder="Enter Phone Number" name="phone" required>
                                        </div><!-- End .form-group -->


                                        <div class="form-group">
                                            <label for="register-email-2">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email-2" placeholder="Enter Email" name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password-2">Password *</label>
                                            <input type="password" class="form-control" id="register-password-2" name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="text-center">
                                            <div class="form-group">
                                                <img src="" id="photo" style=" height:200px; width:200px; border-radius:50%; margin-bottom:12px;">
                                                    <input type="file" name="image" class="form-control" onchange="readURL(this);">
                                            </div>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                                <label class="custom-control-label" for="register-policy-2">I agree to the <a href="{{ url('terms-and-condition') }}">Terms & Condition</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            	</div>
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#photo')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }

</script>
@endsection


