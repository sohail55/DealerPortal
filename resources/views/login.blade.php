<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      Member Ledger
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" type="image/png"   href="{!! asset('public/images/logo-final.png') !!}" />
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ asset('public/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/app-purple.css') }}">
    <!-- Theme initialization -->
    <!-- <script>
      var themeSettings =  (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {};
      var themeName = themeSettings.themeName || '';
      console.log(themeName);

      if (themeName) {
        document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
      }
      else {
        document.write('<link rel="stylesheet" id="theme-style" href="css/app-green.css">');
      }
    </script> -->
  </head>
  <body>
    <div class="auth">
  <div class="auth-container">
  <div class="card">
    <header class="auth-header">
      <h1 class="auth-title">
        <div class="logo">
          <img src="{{ asset('public/images/logo-final.png') }}" width="110%" alt="Logo">
        </div>        
      </h1>
    </header>
    <div class="auth-content">
      <p class="text-center">LOGIN TO CONTINUE</p>
      <form id="login-form"  action="{{route('adminLogin')}}" method="POST" novalidate="">
        @csrf
        @include('components.sessionMessages')
        <div class="form-group">
          <label for="username" >Username</label>
          <input type="text" class="form-control underlined" name="username" id="username" placeholder="Your username" required>
        </div>
        <div class="form-group">
          <label for="password" >Password</label>
          <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-icon-login"></span>
          <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required>
          
        </div>
        <div class="form-group">
          <label for="remember">
            <input class="checkbox" id="remember" type="checkbox"> 
            <span>Remember me</span>
          </label>

          <a href="{{ route('forgotPassword')}}" class="forgot-btn pull-right">Forgot password?</a>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary">Login</button>
        </div>
        <div class="form-group">
          <p class="text-muted text-center">Do not have an account? <a href="{{ route('signUp')}}">Sign Up!</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
      <div class="color-primary"></div>
      <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
      </div>
    </div>
    <script src="{{ asset('public/js/vendor.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script type="text/javascript">
      
      $(document).on('click', '.toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password");
        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
      });
    </script>
  </body>
</html>