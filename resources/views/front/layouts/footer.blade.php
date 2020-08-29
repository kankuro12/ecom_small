<footer class="footer footer-2">
    <div class="icon-boxes-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                            <p>Orders $50 or more</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                            <p>Within 30 days</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                            <p>When you sign up</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                            <p>24/7 amazing services</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->

    <div class="footer-middle border-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="widget widget-about">
                        <img src="{{asset('front/images/info/'.$basic_info->logo) }}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>{{ $basic_info->short_detail }}</p>

                        <div class="widget-about-info">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <span class="widget-about-title">Got Question? Call us 24/7</span>
                                    <a href="tel:{{ $basic_info->phone }}">{{ $basic_info->phone }}</a>
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6 col-md-8">
                                    <span class="widget-about-title">Payment Method</span>
                                    <figure class="footer-payments">
                                       <h5>Cash On Delivery</h5>
                                    </figure><!-- End .footer-payments -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .widget-about-info -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-12 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Information</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="about.html">About Molla</a></li>
                            <li><a href="#">How to shop on Molla</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                            <li><a href="login.html">Log in</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="cart.html">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-64 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">{{ $basic_info->copyrights}}</p><!-- End .footer-copyright -->
            <ul class="footer-menu">
                <li><a href="{{ url('terms-and-condition') }}">Terms & Condition</a></li>
                <li>Developed By - <a href="http://needtechnosoft.tech">Needtechnosoft pvt. ltd.</a></li>
            </ul><!-- End .footer-menu -->
            @php
                $link = \App\Social::where('id',1)->first();
            @endphp
            <div class="social-icons social-icons-color">
                <span class="social-label">Social Media</span>
                <a href="{{$link->facebook}}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="{{$link->twiter}}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="{{$link->instagram}}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="{{$link->youtube}}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
            </div><!-- End .soial-icons -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
 <!-- Mobile Menu -->
 <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

 <div class="mobile-menu-container mobile-menu-light">
     <div class="mobile-menu-wrapper">
         <span class="mobile-menu-close"><i class="icon-close"></i></span>

         <form action="{{ route('search.product') }}" method="POST" class="mobile-search">
             @csrf
             <label for="mobile-search" class="sr-only">Search</label>
             <input type="search" class="form-control" name="search" id="mobile-search" placeholder="Search in..." required>
             <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
         </form>

         <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
             <li class="nav-item">
                 <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
             </li>
         </ul>

         <div class="tab-content">
             <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                 <nav class="mobile-nav">
                     <ul class="mobile-menu">
                         <li class="active">
                             <a href="{{ url('/') }}">Home</a>
                         </li>
                         <li>
                            <a href="{{ url('/shops') }}">Shop</a>
                         </li>
                         <li>
                            <a href="{{ url('/about') }}">About Us</a>
                         </li>
                         <li>
                            <a href="{{ url('/contact') }}">Contact Us</a>
                         </li>

                     </ul>
                 </nav><!-- End .mobile-nav -->
             </div><!-- .End .tab-pane -->
             @php
                $cats = \App\Category::all();
                $link = \App\Social::where('id',1)->first();
             @endphp
             <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                 <nav class="mobile-cats-nav">
                     <ul class="mobile-cats-menu">
                         @foreach($cats as $cat)
                           <li><a href="{{ url('shops-by-category',$cat->id)}}">{{ $cat->name }}</a></li>
                         @endforeach
                     </ul><!-- End .mobile-cats-menu -->
                 </nav><!-- End .mobile-cats-nav -->
             </div><!-- .End .tab-pane -->
         </div><!-- End .tab-content -->

         <div class="social-icons">
             <a href="{{ $link->facebook }}" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
             <a href="{{ $link->twiter }}" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
             <a href="{{ $link->instagram }}" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
             <a href="{{ $link->youtube }}" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
         </div><!-- End .social-icons -->
     </div><!-- End .mobile-menu-wrapper -->
 </div><!-- End .mobile-menu-container -->

 <!-- Sign in / Register Modal -->
 <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-body">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="icon-close"></i></span>
                 </button>

                 <div class="form-box">
                     <div class="form-tab">
                         <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                             <li class="nav-item">
                                 <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                             </li>
                         </ul>
                         <div class="tab-content" id="tab-content-5">
                             <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
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
                                 <div class="form-choice">
                                     <p class="text-center"> Or<br><a href="{{ url('customer-signup') }}"> <strong>Click Here To Register</strong></a> </p>
                                     
                                 </div><!-- End .form-choice -->
                             </div><!-- .End .tab-pane -->
                         </div><!-- End .tab-content -->
                     </div><!-- End .form-tab -->
                 </div><!-- End .form-box -->
             </div><!-- End .modal-body -->
         </div><!-- End .modal-content -->
     </div><!-- End .modal-dialog -->
 </div><!-- End .modal -->


