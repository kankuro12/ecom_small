
<header class="header header-10 header-intro-clearance">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:{{ $basic_info->phone }}"><i class="icon-phone"></i>Call: {{ $basic_info->phone }}</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">NPR</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">NPR</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">Engligh</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            @if (empty(Auth::check()))
                                <li class="login">
                                    <a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>
                                </li>
                            @else
                              @if (Auth::user()->role == 0)

                                <li>
                                    <div class="header-dropdown">
                                        <a href="#"><i class="icon-user"></i>Account</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="{{ url('my-profile') }}">Profile</a></li>
                                                <li><a href="{{ url('my-order') }}">Orders</a></li>
                                                <li><a href="{{ url('wishlists') }}">Wishlist</a></li>
                                                <li><a href="{{ url('logout') }}">Logout</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div><!-- End .header-dropdown -->
                                </li>
                              @endif
                            @endif
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('front/images/info/'.$basic_info->logo) }}" alt="Logo" width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ route('search.product') }}" method="POST">
                        @csrf
                        <div class="header-search-wrapper search-wrapper-wide">
                            <div class="select-custom">
                                <select id="cat" name="cat" >
                                    <option value="">All Categories</option>
                                    @foreach ($cats as $item)
                                         <option value="{{$item->id}}">{{ $item->name }}</option>
                                        @if (count($item->subcat))
                                          @foreach ($item->subcat as $item1)
                                            <option value="{{ $item1->id }}">- {{ $item1->name }}</option>
                                            @if (count($item1->subcat))
                                                @foreach ($item1->subcat as $i)
                                                   <option value="{{ $i->id }}">-- {{ $i->name }}</option>
                                                @endforeach
                                            @endif
                                          @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div><!-- End .select-custom -->
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="search" id="q" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="header-dropdown-link">
                    @if(!empty(Auth::check()))
                    @php
                        $countProduct = \App\Wishlist::where('user_id',Auth::user()->id)->count();
                    @endphp
                    <a href="{{ url('wishlists') }}" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">{{ $countProduct }}</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a>
                    @else
                    <a href="{{ url('wishlists') }}" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">0</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a>
                    @endif
                    @php
                        $session_id = Session::get('session_id');
                        $cart = \App\Cart::where('session_id',$session_id)->count();
                    @endphp

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ $cart }}</span>
                            <span class="cart-txt">Cart</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products" id="cartItem">
                                {{-- <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Blue utility pinafore denim dress</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x $76.00
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{asset('front/images/products/cart/product-2.jpg') }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product --> --}}
                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price" id="totalAmt"></span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{ url('shopping-cart') }}" class="btn btn-primary">View Cart</a>
                                <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="true">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        Browse Categories
                    </a>

                    <div class="dropdown-menu show">
                        <nav class="side-nav">
                            @foreach ($cats as $attr)
                                <ul class="menu-vertical sf-arrows">
                                    <li class="megamenu-container">
                                        @if (count($attr->subcat) > 0)
                                           <a class="sf-with-ul" href="{{ url('shops-by-category/'.$attr->id) }}">{{ $attr->name }}</a>
                                           <div class="megamenu">
                                            <div class="row no-gutters">
                                                <div class="col-md-8">
                                                    <div class="menu-col">
                                                        <div class="row">
                                                            @if (count($attr->subcat))
                                                            @foreach ($attr->subcat as $item)
                                                            <div class="col-md-6">
                                                                <div class="menu-title"><a href="{{ url('shops-by-category/'.$item->id) }}"> {{ $item->name }} </a></div><!-- End .menu-title -->
                                                                @if (count($item->subcat))
                                                                   @foreach ($item->subcat as $item1)
                                                                   <ul>
                                                                       <li><a href="{{ url('shops-by-category/'.$item1->id) }}"><strong>{{ $item1->name }}</strong></a></li>
                                                                   </ul>
                                                                   @endforeach
                                                                @endif
                                                            </div><!-- End .col-md-6 -->
                                                            @endforeach
                                                            @endif
                                                        </div><!-- End .row -->
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-8 -->

                                                <div class="col-md-4">
                                                    <div class="banner banner-overlay">
                                                        <a href="category.html" class="banner banner-menu">
                                                            <img src="{{asset('front/images/demos/demo-13/menu/banner-2.jpg') }}" alt="Banner">
                                                        </a>
                                                    </div><!-- End .banner banner-overlay -->
                                                </div><!-- End .col-md-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu -->
                                        @endif
                                        @if (count($attr->subcat) == 0)
                                           <a href="{{ url('shops-by-category/'.$attr->id) }}">{{ $attr->name }}</a>
                                        @endif
                                    </li>
                                </ul>
                            @endforeach
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .col-lg-3 -->
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ url('/') }}" >Home</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ url('shops') }}">Shop</a>
                        </li>
                        {{-- <li>
                            <a href="">Product</a>
                        </li> --}}
                        <li>
                            <a href="{{ url('about-us') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ url('contact-us') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="#" class="sf-with-ul">Pages</a>

                            <ul>
                                <li><a href="{{ url('terms-and-condition') }}">Terms & Condition</a></li>
                            </ul>
                        </li>


                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .col-lg-9 -->
            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>{{ $basic_info->clearance }}</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
