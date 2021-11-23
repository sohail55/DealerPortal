@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Update Password
          </h3>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row sameheight-container" style="display: flex; justify-content: center;">
    <div class="col-md-6">
      <div class="card card-block">
        <div class="title-block">
          @include('components.sessionMessages') 
        </div>
        <form action="{{ route('updateNewPassword') }}" id="payment_form" name="payment_form" method="post">
          @csrf
  
          <input type="hidden" name="UserId"value="{{ Session::get('userInfo')[0]['MemberUserId'] }}">
          <input type="hidden" name="cnic" value="{{ Session::get('userInfo')[0]['CNIC'] }}">
          <fieldset class="form-group col-sm-12 col-md-12">
            <label class="control-label" for="formGroupExampleInput">Old Password<span style="color: red">*</span></label>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-old-password eye-icon-update_old_pass "></span>
            <input type="password" class="form-control  col-sm-12 col-md-6" name="old_password" id="old_password" value="{{ old('old_password')}}"  maxlength="50" value="" required="" >
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-12">
            <label class="control-label" for="formGroupExampleInput2">New Password<span style="color: red">*</span></label>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-icon-update_new_pass "></span>
            <input type="password" class="form-control col-sm-12 col-md-6" id="new_password" name="new_password" placeholder="" value="" autocomplete="off" required="">
            <!-- <div><p class="weak-password"> Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.</p></div> -->
            <span id="StrengthDisp" class="weak-password"></span>
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-12">
            <label class="control-label" for="formGroupExampleInput3">Retype Password<span style="color: red">*</span></label>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-retype-password eye-icon-retype"></span>
            <input type="password" class="form-control col-sm-12 col-md-6" name="confirm_password" id="confirm_password" maxlength="50" value="" required="">
            
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-12">
            <label class="control-label">  </label>
            <input type="submit" name="ajax_submit" value="Update Password" class="btn btn-primary form-control form-control col-sm-12 col-md-6" style="float:right"/>
          </fieldset>
        </form>
      </div>    
    </div>
    
</section>
</article>
<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
<script type="text/javascript">
      $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='payment_form']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              old_password: "required",
              new_password: "required",
              confirm_password: "required",
            },
            // Specify validation error messages
            messages: {
              old_password: "Please enter your Old Password",
              new_password: "Please enter your New Password",
              confirm_password: "Please enter your confirm Password",
              bill_to_address_line1: "Please enter your mailing address",
              bill_to_address_city: "Please enter your City Name",
              bill_to_email: "Please enter your email address",
              bill_to_phone: "Please enter your mobile no",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
</script>
<script type="text/javascript">

      $(document).on('click', '.toggle-old-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#old_password");
        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
      });

      $(document).on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#new_password");
        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
      });

      $(document).on('click', '.toggle-retype-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#confirm_password");
        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
      });

      let timeout;

      // traversing the DOM and getting the input and span using their IDs

      let password = document.getElementById('new_password')
      let strengthBadge = document.getElementById('StrengthDisp')

      // The strong and weak password Regex pattern checker

      let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
      let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')
    
      function StrengthChecker(PasswordParameter){
          // We then change the badge's color and text based on the password strength

          if(strongPassword.test(PasswordParameter)) {
              strengthBadge.style.backgroundColor = ""
              strengthBadge.textContent = ''
          }  else{
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


@endsection
      



