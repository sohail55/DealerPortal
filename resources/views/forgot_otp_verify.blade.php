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

      if (themeName) {
        document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
      }
      else {
        document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
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
      <form id="signup-form"  action="{{ route('setPassword') }}" method="POST" novalidate="">
        @csrf
        @include('components.sessionMessages')
        <div class="form-group">

          <label for="firstname" >OTP</label>
          <div class="row">
            <div class="col-sm-12">
              <input type="password" class="form-control underlined" name="user_otp" id="otp" placeholder="Please enter your 4 digit OTP no here" required="" autocomplete="off" value="{{ old('otp')}}">
            </div>
          </div>

        </div>
        <!-- <div class="form-group">
          <label for="Cnic" >CNIC</label>
          <input type="text" class="form-control underlined" name="Cnic" id="Cnic" placeholder="Enter Your CNIC Without Dashes" required="" autocomplete="off"  value="{{ old('Cnic')}}" maxlength="13">
        </div>
        <div class="form-group">
          <label for="password" >Password</label>

          <div class="row">
            <div class="col-sm-6">
              <input type="password" class="form-control underlined" name="password" id="password" 
                  placeholder="Enter password" required="" autocomplete="off">
            </div>
            <div class="col-sm-6">
              <input type="password" class="form-control underlined" name="retype_password" id="retype_password" 
                placeholder="Re-type password" required="" autocomplete="off">
            </div>
          </div>

        </div> -->
        <!-- <div class="form-group">
          <label for="agree">
            <input class="checkbox" name="agree" id="agree" type="checkbox" required=""> 
            <span>Agree the terms and <a href="#">policy</a></span>
          </label>
        </div> -->
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary">Verify</button>
        </div>
        <!-- <div id="countdown" style="color:red;"></div> -->
        <!-- <div><span id="countdown" style="color:red;"></span></div> -->
       
        <input type="hidden" name="otp" value="{{ $data['otp'] }}">
        <input type="hidden" name="UserId" value="{{ $data['UserId'] }}">
        <input type="hidden" name="UserName" value="{{ $data['UserName'] }}">
  
        <!-- <div class="form-group">
          <p class="text-muted text-center">Already have an account? <a href="{{ route('login')}}">Login!</a></p>
        </div> -->
      </form>

      <form id="signup-form"  action="{{ route('resendOTP') }}" method="POST" novalidate="">
        @csrf
        <input type="hidden" name="otp" value="{{ $data['otp'] }}">
        <input type="hidden" name="UserId" value="{{ $data['UserId'] }}">
        <input type="hidden" name="UserName" value="{{ $data['UserName'] }}">
        <button id="regenerateOTP" class="btn btn-warning btn_shadow" style="border-radius: 0;" >Resend OTP </button>
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

    $(document).ready(function () {
        $('#Cnic').keypress(function (e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
                return false;
        });
    });

    // var timeleft = 120;
    // var downloadTimer = setInterval(function(){
    //   if(timeleft <= 0){
    //     clearInterval(downloadTimer);
    //     $('#countdown').hide();
    //     $('#regenerateOTP').show();
    //     //document.getElementById("countdown").innerHTML = "Finished";

    //   } else {
    //     document.getElementById("countdown").innerHTML = "Time left = "+ timeleft + " seconds remaining";
    //   }
    //   timeleft -= 1;
    // }, 1000);

    </script>
  </body>
</html>