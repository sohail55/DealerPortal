@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="title">
            Payment Details of Plot # {{ Session::get('ledger.Plot_No') }},  Ref # {{ Session::get('ledger.RefrenceNo') }}
          </h6>
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
        <form action="{{ route('paymentConfirmation') }}" id="payment_form" name="payment_form" method="post">
          @csrf
          <input type="hidden" name="challan_no" value="{{ Session::get('ledger.challan_no') }}">
          <input type="hidden" name="currency"  value="PKR">
          <input type="hidden" name="bill_to_address_country" value="PK">
          <input type="hidden" name="bill_to_address_postal_code" value="60000">
          <input type="hidden" name="bill_to_forename"value="{{ Session::get('userInfo')[0]['Name'] }}">
          <input type="hidden" name="consumer_id" value="{{ Session::get('userInfo')[0]['CNIC'] }}">
          <input type="hidden" name="customer_ip_address" value="">
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput">Applicant Name:<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6" readonly="readonly" name="app_name" id="app_name" maxlength="100" value="{{ Session::get('userInfo')[0]['Name'] }}" required="">
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput2">S/O, D/O, W/O:<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6" id="app_fathername" name="app_fathername" placeholder="" value="{{ Session::get('userInfo')[0]['FatherName'] }}" autocomplete="off" readonly="readonly">
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-12">
            <label class="control-label" for="formGroupExampleInput3">Applicant CNIC/NICOP (without dashes):<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6" readonly="readonly" name="app_cnic" id="app_cnic" maxlength="100" value="{{ Session::get('userInfo')[0]['CNIC'] }}" required="">
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput4">Mailing Address Line 1:<span style="color: red">*</span></label><span style="float: right;"><input type="checkbox" id="copy_address" name="copy_address"> Copy Same Address</span>
            <textarea rows="3" class="form-control form-control col-sm-12 col-md-6" id="mail_address_1" placeholder="Enter Mailing Address" name="bill_to_address_line1" required="required">{{ old('bill_to_address_line1') }}</textarea>
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput5">Mailing Address Line 2:</label>
            <textarea rows="3" class="form-control form-control col-sm-12 col-md-6" id="bill_to_address_line2" name="bill_to_address_line2" placeholder="Enter Mailing Address" >{{ old('bill_to_address_line2') }}</textarea>
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput6">City:<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6"  name="bill_to_address_city" id="app-city_input" maxlength="30" placeholder="Enter City Name" value="{{ old('bill_to_address_city') }}"autocomplete="off" required="required">
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput7">Email:<span style="color: red">*</span></label>
            <input type="email" class="form-control form-control col-sm-12 col-md-6" id="" name="bill_to_email" placeholder="Enter Email Address" value="{{ old('bill_to_email') }}" autocomplete="off" required="required" maxlength="30" >
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput7">Mobile:<font color="red" size="1">(Sms will not be sent on converted/ported numbers.)</font><span style="color: red">*</span></label>
            <input type="text" class="form-control form-control col-sm-12 col-md-6" id="" name="bill_to_phone" id="app_mobile_other" placeholder="03xxxxxxxxx"   maxlength="11" value="{{ old('bill_to_phone') }}" autocomplete="off" required="required" maxlength="30" >
          </fieldset>
          <fieldset class="form-group col-sm-12 col-md-6">
            <label class="control-label" for="formGroupExampleInput7">Amount:<span style="color: red">*</span></label>
            <input type="number" class="form-control form-control col-sm-12 col-md-6" id="amount" name="amount" placeholder="" value="{{ Session::get('ledger.total_amount') }}" autocomplete="off" maxlength="30" readonly >
          </fieldset>
          <div class="form-group col-sm-12 col-md-12">
            <input type="submit" name="ajax_submit" value="Save & Next" class="btn btn-primary" style="float:right"/>
            <a href="{{ route('getChallanFields', ['appid'=> Session::get('appid')]) }}" class="btn btn-primary" style="float:right; margin-right:12px;">Previous</a>
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
              app_name: "required",
              app_fathername: "required",
              app_cnic: "required",
              bill_to_address_line1: "required",
              bill_to_address_city: "required",
              bill_to_email: "required",
              bill_to_phone: "required",
            },
            // Specify validation error messages
            messages: {
              app_name: "Please enter your Name",
              app_fathername: "Please enter your fathe name",
              app_cnic: "Please enter your CNIC No",
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

      $(document).ready(function() {

        $("#bill_to_phone").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            return false;
        }
       });

        $("#copy_address").click(copyData);

        function copyData()
        {
           var start=$("#mail_address_1").val();
           if (this.checked==true)
             $("#bill_to_address_line2").val(start);
           else
            $("#bill_to_address_line2").val('');
        }

      });
    </script>

@endsection
      



