<!doctype html>
<html lang="en">
  <head>
    <title>DHA Multan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{!! asset('public/css/style.css') !!} ">

    </head>
    <body class="img js-fullheight" style="background-image:url({{url('/public/images/backgroud_title.jpg')}})">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h2 class="heading-section"><img src="{!! asset('public/images/logo.png') !!} " style="padding-top: 20px;" /></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-0">
                <h2 class="mb-2 text-center" style="font-family: Arial;"> DHA Multan CV Portal</h2>
                <h5 class="mb-2 text-center" style="font-family: Arial;"> Please Sign In</h5>
                <!-- <h5 class="mb-2 text-center" style="font-family: Arial;"> Signin to manage your account.</h5> -->
                <form action="{{route('adminLogin')}}" class="signin-form" method="post">
                    @csrf
                    @include('components.sessionMessages')
                    <div class="form-group">
                        <input type="text" name="cnic" class="form-control CNIC" maxlength="13" placeholder="CNIC" required style="background-color: #fff;">
                    </div>
                <div class="form-group">
                  <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required style="background-color: #fff;">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <button type="submit" style="color:#fff!important;" class="form-control btn">Sign In</button>
                </div>
                <div class="form-group d-md-flex">
                    
                                <div class=" text-md-right">
                                    <a href="{{ route('forgotPassword') }}" style="color: #57b657!important">Forgot Password?</a>
                                </div>
                </div>
              </form>
              <p style="color:#fff;font-size: 20px;">Do not have an account? <a style="color:#fff!important;" href="{{ route('signUp') }}" class="w-100 text-center">Sign Up</a> </p>
              <!-- <p class="w-100 text-center">OR </p> -->
              <!-- <div class="social d-flex text-center">
                <button type="submit" class="form-control btnn" ><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"  class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg>   Facebook </button>
                <button type="submit" class="form-control btnn" > <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
  <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
</svg>  Google</button>
              </div> -->
              </div>
                </div>
            </div>
        </div>
    </section>
<script src="{{asset('public/js/jquery-ui.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function () {    
        $('.CNIC').keypress(function (e) {    
            var charCode = (e.which) ? e.which : event.keyCode    
            if (String.fromCharCode(charCode).match(/[^0-9]/g))    
                return false;                        
        });
        $(document).on('click', '.toggle-password', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $("#password-field");
          input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
      });
    });  
  </script>
    </body>
</html>