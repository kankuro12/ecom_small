<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('front/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('front/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('front/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('front/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/demos/demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('front/toaster/bootoast.min.css') }}">
</head>
@php 
    $basic_info = \App\Homeinfo::where('id',1)->first();
@endphp
<body>
    <div class="page-wrapper">
        @include('front.layouts.header')
            @yield('content')
        @include('front.layouts.footer')
    </div>

 <!-- Plugins JS File -->
 <script src="{{ asset('front/js/jquery.min.js') }}"></script>
 <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('front/js/jquery.hoverIntent.min.js') }}"></script>
 <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
 <script src="{{ asset('front/js/superfish.min.js') }}"></script>
 <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('front/js/bootstrap-input-spinner.js') }}"></script>
 <script src="{{ asset('front/js/jquery.elevateZoom.min.js') }}"></script>
 <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
 <script src="{{ asset('front/js/jquery.plugin.min.js') }}"></script>
 <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>



 <!-- Main JS File -->
 <script src="{{ asset('front/js/main.js') }}"></script>
 {{-- <script src="{{ asset('front/js/demos/demo-13.js') }}"></script> --}}
 {{-- <script src="{{ asset('front/main.js') }}"></script> --}}
 <script src="{{ asset('front/toaster/bootoast.min.js') }}"></script>
 <script src="{{ asset('front/axios.js') }}"></script>
 <script src="{{ asset('front/toaster/cart.js') }}"></script>


 @yield('scripts')
</body>
</html>
