<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title>@yield('title')</title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
    <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
    <link rel="canonical" href="http://uselooper.com">
    <meta property="og:url" content="http://uselooper.com">
    <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/favicon.ico">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ asset('back/vendor/open-iconic/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/flatpickr/flatpickr.min.css') }}"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('back/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('back/stylesheets/theme-dark.min.css') }}" data-skin="dark">
    <link rel="stylesheet" href="{{ asset('back/stylesheets/custom.css') }}"><!-- Disable unused skin immediately -->
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var unusedLink = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      unusedLink.setAttribute('rel', '');
      unusedLink.setAttribute('disabled', true);
    </script><!-- END THEME STYLES -->
  </head>
  <body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <header id="auth-header" class="auth-header" style="background-image: url({{asset('back/images/illustration/img-1.png')}});">
        <h1>
         <span >Sign In</span>
        </h1>
        
        </p>
      </header><!-- form -->
      <form class="auth-form" method="POST" action="{{ route('login') }}">
        @csrf
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <label for="inputUser">Username</label>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> <label for="inputPassword">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
          <div class="custom-control custom-control-inline custom-checkbox">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <label class="custom-control-label" for="remember-me">Remember Me</label>
          </div>
        </div><!-- /.form-group -->
        <!-- recovery links -->
        <div class="text-center pt-3">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div><!-- /recovery links -->
      </form><!-- /.auth-form -->
      <!-- copyright -->
      <footer class="auth-footer"> © 2020 All Rights Reserved. <a href="#">Privacy</a> and <a href="#">Terms</a>
      </footer>
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
  <!-- BEGIN BASE JS -->
  <script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('back/vendor/bootstrap/js/popper.min.js') }}"></script>
  <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
  <!-- BEGIN PLUGINS JS -->
  <script src="{{ asset('back/vendor/pace/pace.min.js') }}"></script>
  <script src="{{ asset('back/vendor/stacked-menu/stacked-menu.min.js') }}"></script>
  <script src="{{ asset('back/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('back/vendor/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('back/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
  <script src="{{ asset('back/vendor/chart.js/Chart.min.js') }}"></script> <!-- END PLUGINS JS -->
  <!-- BEGIN THEME JS -->
  <script src="{{ asset('back/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
  <!-- BEGIN PAGE LEVEL JS -->
  <script src="{{ asset('back/javascript/pages/dashboard-demo.js') }}"></script> <!-- END PAGE LEVEL JS -->
 </body>
 </html>
