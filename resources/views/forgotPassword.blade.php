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

    <!-- Theme initialization -->
    <link rel="stylesheet" href="{{ asset('public/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/app-purple.css') }}">
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
      @include('components.sessionMessages') 
      <p class="text-center">PASSWORD RECOVER</p>
      <p class="text-muted text-center"><small>Enter your CNIC no and User Name to recover your password.</small></p>
      <form id="reset-form"  action="{{ route('recoverPassword') }}" method="POST" novalidate="">

        @csrf
        
        <div class="form-group">
          <label for="email1" >CNIC</label>
          <input type="text" class="form-control underlined" name="Cnic" id="Cnic" placeholder="Your CNIC no" required>
        </div>
        <div class="form-group">
          <label for="email1" >User Name</label>
          <input type="text" class="form-control underlined" name="username" id="username" placeholder="Enter Your Username" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary">Reset</button>
        </div>
        <div class="form-group clearfix">
          <a class="pull-left"  href="{{ route('login')}}">Return to Login</a>
          <a class="pull-right" href="{{ route('signUp')}}">Sign Up!</a>
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
  </body>
</html>