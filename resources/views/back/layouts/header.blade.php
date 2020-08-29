@php
    $url = url()->current();
    $pendingOrdersCount = \App\Order::where('status','!=',4)->count();
    $completeOrdersCount = \App\Order::where('status',4)->count();
    $pendingOrder = \App\Order::latest()->where('status','!=',4)->get();
@endphp
<header class="app-header app-header-dark">
    <!-- .top-bar -->
    <div class="top-bar">
      <!-- .top-bar-brand -->
      <div class="top-bar-brand">
        <a href="#">E-Commerce</a>
      </div><!-- /.top-bar-brand -->
      <!-- .top-bar-list -->
      <div class="top-bar-list">
        <!-- .top-bar-item -->
        <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
          <!-- toggle menu -->
          <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
        </div><!-- /.top-bar-item -->
        <!-- .top-bar-item -->

            <div class="top-bar-item top-bar-item-full">
                <!-- .top-bar-search -->
                <form class="top-bar-search">
                <!-- .input-group -->
                <div class="input-group input-group-search dropdown">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                    </div><input type="text" class="form-control" data-toggle="dropdown" aria-label="Search" placeholder="Search"> <!-- .dropdown-menu -->

                </div><!-- /.input-group -->
                </form><!-- /.top-bar-search -->
            </div><!-- /.top-bar-item -->


        <!-- .top-bar-item -->
        <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
          <!-- .nav -->
          <ul class="header-nav nav">

            <li class="nav-item dropdown header-nav-dropdown has-notified">
               <a class="nav-link has-badge" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="badge badge-pill badge-warning">{{ $pendingOrdersCount }}</span> <span class="oi oi-pulse"></span></a> <!-- .dropdown-menu -->
                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                  <div class="dropdown-arrow"></div>
                  <h6 class="dropdown-header stop-propagation">
                    <span>New order received <span class="badge">({{ $pendingOrdersCount }})</span></span>
                  </h6><!-- .dropdown-scroll -->
                  <div class="dropdown-scroll perfect-scrollbar">
                    <!-- .dropdown-item -->
                    @foreach ($pendingOrder as $item)
                    <a href="{{ url('dashboard/customer-pending-order') }}" class="dropdown-item unread">
                      <div class="user-avatar">
                        <img src="{{ asset('front/images/customers/'.$item->user->image) }}" alt="">
                      </div>
                      <div class="dropdown-item-body">
                        <p class="text"> {{ $item->user->name }}, <span style="font-size:12px;">{{ $item->user->address}}</span> </p><span class="date">{{ $item->receivedOrder() }}</span>
                      </div>
                    </a> <!-- /.dropdown-item -->
                    <!-- .dropdown-item -->
                    @endforeach

                  </div><!-- /.dropdown-scroll -->
                   <a href="{{ url('dashboard/customer-complete-order') }}" class="dropdown-footer">All Orders <i class="fas fa-fw fa-long-arrow-alt-right"></i></a>
                </div><!-- /.dropdown-menu -->
            </li><!-- /.nav-item -->
              @php
                  $messageCount = \App\Message::where('status',0)->select('id')->count();
              @endphp
            <li class="nav-item dropdown header-nav-dropdown">
               <a class="nav-link has-badge" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-pill badge-warning">{{ $messageCount }}</span> <span class="oi oi-envelope-open"></a> <!-- .dropdown-menu -->
                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                  <div class="dropdown-arrow"></div>
                  <h6 class="dropdown-header stop-propagation">
                    <span>Messages <span class="badge">({{ $messageCount }})</span></span>
                  </h6><!-- .dropdown-scroll -->
                  <div class="dropdown-scroll perfect-scrollbar ps">
                    <!-- .dropdown-item -->
                    @foreach(\App\Message::where('status',0)->latest()->get() as $message)
                    <a href="{{ url('dashboard/customer-message')}}" class="dropdown-item">
                      <div class="user-avatar">
                        <img src="{{ asset('front/images/customers/'.$message->user->image) }}" alt="">
                      </div>
                      <div class="dropdown-item-body">
                        <p class="subject"> <strong style="font-size:14px;">{{ $message->user->name }}</strong>, <span style="font-size:12px;"> {{ $message->user->address}}</span> </p>
                        <p class="text text-truncate"> {{ $message->subject }} </p><span class="date">{{ $message->time() }}</span>
                      </div>
                    </a> <!-- /.dropdown-item -->
                    @endforeach

                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div><!-- /.dropdown-scroll -->
                  <a href="{{ url('dashboard/customer-message')}}" class="dropdown-footer">All messages <i class="fas fa-fw fa-long-arrow-alt-right"></i></a>
                </div><!-- /.dropdown-menu -->
            </li>

          </ul><!-- /.nav -->
          <!-- .btn-account -->
          <div class="dropdown d-flex">
          <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md"><img src="{{ asset('front/images/customers/'.Auth::user()->image) }}"></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span class="account-name">{{ Auth::user()->name }}</span> <span class="account-description">Business Men</span></span></button> <!-- .dropdown-menu -->
            <div class="dropdown-menu">
              <div class="dropdown-arrow ml-3"></div>
              <h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ Auth::user()->name }}  </h6><a class="dropdown-item" href="#"><span class="dropdown-icon oi oi-person"></span> Profile</a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><span class="dropdown-icon oi oi-account-logout"></span>
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>

            </div><!-- /.dropdown-menu -->
          </div><!-- /.btn-account -->
        </div><!-- /.top-bar-item -->
      </div><!-- /.top-bar-list -->
    </div><!-- /.top-bar -->
  </header><!-- /.app-header -->
  <!-- .app-aside -->
  <aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
      <!-- .aside-header -->
      <header class="aside-header d-block d-md-none">
        <!-- .btn-account -->
        <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
        <!-- .dropdown-aside -->
        <div id="dropdown-aside" class="dropdown-aside collapse">
          <!-- dropdown-items -->
          <div class="pb-3">
            <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
          </div><!-- /dropdown-items -->
        </div><!-- /.dropdown-aside -->
      </header><!-- /.aside-header -->
      <!-- .aside-menu -->
      <div class="aside-menu overflow-hidden">
        <!-- .stacked-menu -->
        <nav id="stacked-menu" class="stacked-menu">
          <!-- .menu -->
          <ul class="menu">
            <!-- .menu-item -->
            <li class="menu-item has-active">
               <a href="{{ url('/dashboard')}}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
            </li><!-- /.menu-item -->

             <!-- .menu-item -->
             <li class="menu-item <?php if(preg_match('/product/i',$url)){ echo'has-active';}?>">
                <a href="{{ route('product.index') }}" class="menu-link"><span class="menu-icon oi oi-spreadsheet"></span> <span class="menu-text">Products</span></a>
              </li><!-- /.menu-item -->


              <li class="menu-item has-child">
                <a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Product Categories</span></a> <!-- child menu -->
                <ul class="menu">
                  <li class="menu-item <?php if(preg_match('/maincat/i',$url)){ echo'has-active';}?>">
                    <a href="{{ route('maincat.index') }}" class="menu-link">Categories</a>
                  </li>
                </ul><!-- /child menu -->
              </li>


            <li class="menu-item has-child">
              <a href="#" class="menu-link"><span class="menu-icon oi oi-puzzle-piece"></span> <span class="menu-text">Product Attributes</span></a> <!-- child menu -->
              <ul class="menu">
                <li class="menu-item <?php if(preg_match('/color/i',$url)){ echo'has-active';}?>">
                  <a href="{{ route('color.index') }}" class="menu-link">Color</a>
                </li>
                <li class="menu-item <?php if(preg_match('/size/i',$url)){ echo'has-active';}?>">
                  <a href="{{ route('size.index') }}" class="menu-link">Size</a>
                </li>
                <li class="menu-item <?php if(preg_match('/brand/i',$url)){ echo'has-active';}?>">
                    <a href="{{ route('brand.index') }}" class="menu-link">Product Brand</a>
                </li>

              </ul><!-- /child menu -->
            </li>
            <li class="menu-item <?php if(preg_match('/coupon/i',$url)){ echo'has-active';}?>">
                <a href="{{ route('coupon.index') }}" class="menu-link"><span class="menu-icon oi oi-heart"></span> <span class="menu-text">Coupons</span></a>
            </li><!-- /.menu-item -->

            <li class="menu-item <?php if(preg_match('/shipping/i',$url)){ echo'has-active';}?>">
                <a href="{{ route('shipping.index') }}" class="menu-link"><span class="menu-icon oi oi-dollar"></span> <span class="menu-text">Shipping Charge</span></a>
            </li><!-- /.menu-item -->

            <li class="menu-item has-child">
                <a href="#" class="menu-link"><span class="menu-icon oi oi-puzzle-piece"></span> <span class="menu-text">Customer Orders</span></a>
                <ul class="menu">
                  <li class="menu-item <?php if(preg_match('/customer-pending-order/i',$url)){ echo'has-active';}?>">
                    <a href="{{ url('dashboard/customer-pending-order') }}" class="menu-link"><span style="background: red; color:white;border-radius: 50%;"><strong>{{ $pendingOrdersCount }}</strong></span> Pending Order</a>
                  </li>
                  <li class="menu-item <?php if(preg_match('/customer-complete-order/i',$url)){ echo'has-active';}?>">
                    <a href="{{ url('dashboard/customer-complete-order') }}" class="menu-link"><span style="background: green; color:white;border-radius: 50%;"><strong>{{ $completeOrdersCount }}</strong></span> Complete Order</a>
                  </li>
                </ul><!-- /child menu -->
            </li>

            <li class="menu-item has-child">
                <a href="" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">Customer Info</span></a>
                <ul class="menu">
                  <li class="menu-item">
                    <a href="{{ url('dashboard/customer-list') }}" class="menu-link">Customer List</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/customer-message') }}" class="menu-link">Customer Message</a>
                  </li>
                </ul><!-- /child menu -->
            </li>

            <li class="menu-item has-child">
                <a href="" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Front Setting</span></a>
                <ul class="menu">
                  <li class="menu-item">
                    <a href="{{ route('slider.index') }}" class="menu-link">Slider</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/banners') }}" class="menu-link">Banner</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('store.index') }}" class="menu-link">Our Store</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/about-info') }}" class="menu-link">About Page Info</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/contact-info') }}" class="menu-link">Contact Page Info</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/popup-info') }}" class="menu-link">PopUp Box Info</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/terms-and-condition-info') }}" class="menu-link">Terms & Condition Info</a>
                  </li>
                </ul><!-- /child menu -->
            </li>

            <li class="menu-item has-child">
                <a href="" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text"> Settings </span></a>
                <ul class="menu">
                <li class="menu-item">
                    <a href="{{ url('dashboard/basic-info') }}" class="menu-link">Basic Info</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/social-media') }}" class="menu-link">Social Media</a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ url('dashboard/change-password') }}" class="menu-link">Change Password</a>
                  </li>
                </ul><!-- /child menu -->
            </li>
            <li class="menu-item <?php if(preg_match('/blog/i',$url)){ echo'has-active';}?>">
                <a href="{{ route('blog.index') }}" class="menu-link"><span class="menu-icon oi oi-file"></span> <span class="menu-text">Blog</span></a>
            </li><!-- /.menu-item -->

            <li class="menu-item <?php if(preg_match('/subscriber/i',$url)){ echo'has-active';}?>">
                <a href="{{ url('dashboard/subscriber') }}" class="menu-link"><span class="menu-icon oi oi-envelope-open"></span> <span class="menu-text">Subscriber</span></a>
            </li><!-- /.menu-item -->

          </ul><!-- /.menu -->
        </nav><!-- /.stacked-menu -->
      </div><!-- /.aside-menu -->
      <!-- Skin changer -->
      <footer class="aside-footer border-top p-3">
        <button class="btn btn-light btn-block text-primary" data-toggle="skin">Night mode <i class="fas fa-moon ml-1"></i></button>
      </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
  </aside><!-- /.app-aside -->
