@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            New Complaint
          </h3>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row sameheight-container">
    <div class="col-md-12">
      <div class="card card-block sameheight-item">
        <div class="title-block">
          @include('components.sessionMessages') 
        </div>
        <form action="{{ route('saveComplaint') }}" id="payment_form" name="payment_form" method="post">
          @csrf
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput">Name:<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6"  name="username" id="app_name" maxlength="30" value="{{ old('username') }}" >
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput2">Email:<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6" id="email" name="email" placeholder="" maxlength="30" value="{{ old('email') }}" autocomplete="off" >
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput7">Mobile:<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6" name="phone" id="phone" placeholder="03xxxxxxxxx"  minlength="11" maxlength="11" value="{{ old('phone') }}" autocomplete="off"  >
            <font color="red" size="1"> (Sms will not be sent on converted/ported numbers.)</font>
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput3">Complaint Category:<span style="color: red">*</span></label>
            <!-- <input type="text" class="form-control form-control col-sm-12 col-md-6"  name="app_cnic" id="app_cnic" maxlength="100" value="" required=""> -->
              <select class="form-control" name="category" id="case_category">
                <option value="">Select</option>
                <?php
                  $json_res   =  file_get_contents("https://mapp.dhamultan.org/webc/cat.php");
                  $data     = json_decode($json_res, true);
                  foreach ($data as $val) {
                    echo '<option value="' . $val . '">' . $val . '</option>';
                  }
                ?>
              </select>
          </fieldset>
          
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput6">Complaint subcategory:<span style="color: red">*</span></label>
            <select class="form-control" name="sub_category" id="case_sub_category">
                <option>Select</option>
              </select>
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-12">
            <label class="control-label" for="formGroupExampleInput7">Message:<span style="color: red">*</span></label>
            <textarea rows="3" class="form-control" name="comments" id="formGroupExampleInput7"></textarea>
          </fieldset>
          <div class="form-group col-sm-12 col-md-12">
            <input type="submit" name="ajax_submit" value="Submit" class="btn btn-primary" style="float:right"/>
          </div>
  
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
              // username: "required",
              // email: "required",
              // phone: "required",
              // category: "required",
              // sub_category: "required",
              // comments: "required",
            },
            // Specify validation error messages
            messages: {
              // username: "Please enter your Name",
              // email: "Please enter your email address",
              // phone: "Please enter your mobile no",
              // category: "Please select Category ",
              // sub_category: "Please enter your City Name",
              // comments: "Please enter your message",
              
              
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });

      $(document).ready(function() {

        $("#phone").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            return false;
        }
       });

        $("#case_category").change(function() {

          getCaseSubcat();

        });

        function getCaseSubcat()
        {

          case_category = $("#case_category").val();
          var case_sub_cat_select = document.getElementById('case_sub_category');
          if(case_category!='')
          {
            var url = 'https://mapp.dhamultan.org/webc/subcat.php?case_category_value=' + case_category;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function()
            {
              if (xhr.readyState == 4 && xhr.status == 200) 
              {
                case_sub_cat_select.innerHTML = xhr.responseText;
              }
            }
            xhr.send();
          }
          else
          {
            case_sub_cat_select.innerHTML = '<option value="">Select</option>';
          }
        }
      });
    </script>

@endsection
      



