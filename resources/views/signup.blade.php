<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png"   href="{!! asset('public/images/logo-final.png') !!}" />
    <title>
      Member Ledger
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

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
      <p class="text-center">SIGNUP TO GET INSTANT ACCESS</p>
      <form id="signup-form"  action="{{ route('memberSignup') }}" method="POST" novalidate="">
        @csrf
        @include('components.sessionMessages')
        <div class="form-group">
          <label for="firstname" >User Name</label>

          <div class="row">
            <div class="col-sm-12">
              <input type="text" class="form-control underlined" name="username" id="username" placeholder="Enter username *" required="" autocomplete="off" value="{{ old('username')}}">
            </div>
          </div>

        </div>
        <div class="form-group">
          <label for="Cnic" >CNIC</label>
          <input type="text" class="form-control underlined" name="Cnic" id="Cnic" placeholder="Enter Your CNIC Without Dashes *" required="" autocomplete="off"  value="{{ old('Cnic')}}" maxlength="13">
        </div>
        <div class="form-group">
          <label for="password" >Password</label>

          <div class="row">
            <div class="col-sm-12">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-icon"></span>
              <input type="password" class="form-control underlined" name="password" id="password" 
                  placeholder="Enter password *" required="" autocomplete="off">
                  <!-- <div><p class="weak-password"> Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.</p></div> -->
                  <span id="StrengthDisp" class="weak-password"></span>
            </div>
            <div class="col-sm-12">
              <span toggle="#retype-password-field" class="fa fa-fw fa-eye field-icon toggle-retype-password eye-icon"></span>
              <input type="password" class="form-control underlined" name="retype_password" id="retype_password" 
                placeholder="Re-type password *" required="" autocomplete="off">
                
            </div>
          </div>

        </div>
        <!-- <div class="form-group">
          <label for="agree">
            <input class="checkbox" name="agree" id="agree" type="checkbox" required=""> 
            <span>Agree the terms and <a href="#">policy</a></span>
          </label>
        </div> -->
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
        </div>
        <div class="form-group">
          <p class="text-muted text-center">Already have an account? <a href="{{ route('login')}}">Login!</a></p>
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

    $(document).ready(function () {
      $('#Cnic').keypress(function (e) {
          var charCode = (e.which) ? e.which : event.keyCode
          if (String.fromCharCode(charCode).match(/[^0-9]/g))
              return false;
      });

       $('#username').keypress(function (e) {
          var charCode = (e.which) ? e.which : event.keyCode
          if (String.fromCharCode(charCode).match(/[^A-Za-z0-9\-\_+]/g))
              return false;
      });
    });

    $(document).on('click', '.toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $("#password");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });

    $(document).on('click', '.toggle-retype-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $("#retype_password");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });

    </script>
    <script type="text/javascript">
      let timeout;

      // traversing the DOM and getting the input and span using their IDs

      let password = document.getElementById('password')
      let strengthBadge = document.getElementById('StrengthDisp')

      // The strong and weak password Regex pattern checker

      let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
      let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')
    
      function StrengthChecker(PasswordParameter){
          // We then change the badge's color and text based on the password strength

          if(strongPassword.test(PasswordParameter)) {
              // strengthBadge.style.backgroundColor = "green"
              strengthBadge.textContent = ''
          } else{
              // strengthBadge.style.backgroundColor = 'red'
              strengthBadge.textContent = 'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.'
          }
      }

      // Adding an input event listener when a user types to the  password input 

      password.addEventListener("input", () => {

        //The badge is hidden by default, so we show it

        strengthBadge.style.display= 'block'
        clearTimeout(timeout);

        //We then call the StrengChecker function as a callback then pass the typed password to it

        timeout = setTimeout(() => StrengthChecker(password.value), 500);

        //Incase a user clears the text, the badge is hidden again

        if(password.value.length !== 0){
            strengthBadge.style.display != 'block'
        } else{
            strengthBadge.style.display = 'none'
        }
      });
    </script>
  </body>
</html>