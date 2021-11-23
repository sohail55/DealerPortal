@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Update Profile
          </h3>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="row sameheight-container">
      <div class="col-md-12">
        <div class="card card-block ">
          <div class="title-block">
            @include('components.sessionMessages') 
          </div>
          <form action="{{ route('updateProfile') }}" id="payment_form" name="payment_form" method="post">
            @csrf
            <fieldset class="form-group col-sm-12 col-md-12">
              <label class="control-label" for="formGroupExampleInput4">Mailing Address:<span style="color: red">*</span></label><br/>
              <textarea rows="3" class="form-control form-control col-sm-12 col-md-6" id="formGroupExampleInput7" placeholder="Enter Mailing Address" name="bill_to_address_line1" required="required">{{ isset(Session::get('memberData')[$appID]['MAddress']) ? Session::get('memberData')[$appID]['MAddress'] :  Session::get('memberData')['MAddress'] }}</textarea>
            </fieldset>
            <fieldset class="form-group col-sm-12 col-md-6">
              <label class="control-label" for="formGroupExampleInput7">Email:<span style="color: red">*</span></label><br/>
              <input type="email" class="form-control form-control col-sm-12 col-md-6" id="" name="bill_to_email" placeholder="Enter Email Address" value="{{ isset(Session::get('memberData')[$appID]['Email']) ? Session::get('memberData')[$appID]['Email'] : Session::get('memberData')['Email'] }}" autocomplete="off" required="required" maxlength="30" >
            </fieldset>
            <fieldset class="form-group col-sm-12 col-md-6">
              <label class="control-label" for="formGroupExampleInput7">Mobile:<span style="color: red">*</span> </label><br/>
              <input type="text" class="form-control form-control col-sm-12 col-md-6" id="mobile" name="bill_to_phone" id="app_mobile_other" placeholder="03xxxxxxxxx"  maxlength="11"  value="{{ isset(Session::get('memberData')[$appID]['Mobile']) ? Session::get('memberData')[$appID]['Mobile'] : Session::get('memberData')['Mobile'] }}" autocomplete="off" required="required"  >
              <font color="red" size="2"> (Sms will not be sent on converted/ported numbers.)</font>
            </fieldset>
            <div class="form-group col-sm-12 col-md-12">
              <input type="hidden" name="AppID" value="{{ isset(Session::get('memberData')[$appID]['AppID']) ? Session::get('memberData')[$appID]['AppID'] : Session::get('memberData')['AppID']   }}" />
              <input type="hidden" name="RefrenceNo" value="{{ isset(Session::get('memberData')[$appID]['RefrenceNo']) ? Session::get('memberData')[$appID]['RefrenceNo'] : ''  }}" />
              <input type="hidden" name="Name" value="{{ isset(Session::get('memberData')[$appID]['Name']) ? Session::get('memberData')[$appID]['Name'] : Session::get('memberData')['Name']  }}" />
              <input type="hidden" name="CNIC" value="{{ isset(Session::get('memberData')[$appID]['CNIC']) ? Session::get('memberData')[$appID]['CNIC'] : Session::get('memberData')[$appID]['cnic']  }}" />
              <input type="hidden" name="FatherName" value="{{ isset(Session::get('memberData')[$appID]['FatherName']) ? Session::get('memberData')[$appID]['FatherName'] : Session::get('memberData')['FatherName']   }}" />
              <input type="hidden" name="NewMembershipNo" value="{{ isset(Session::get('memberData')[$appID]['NewMembershipNo']) ? Session::get('memberData')[$appID]['NewMembershipNo'] : Session::get('memberData')[$appID]['NewMembershipNo']  }}" />
              <input type="hidden" name="membershipID" value="{{ isset(Session::get('memberData')[$appID]['membershipID']) ? Session::get('memberData')[$appID]['membershipID'] : Session::get('memberData')[$appID]['membershipID']  }}" />
              @if(isset(Session::get('userInfo')[$appID]['DOB']))
                <input type="hidden" name="DOB" value="{{ date('d-m-Y',strtotime(Session::get('memberData')[$appID]['DOB']))  }}" />
              @else
                <input type="hidden" name="DOB" value="{{ date('d-m-Y',strtotime(Session::get('memberData')[$appID]['DOB']))  }}" />
              @endif
              <input type="submit" name="ajax_submit" value="Update" class="btn btn-primary" style="float:right"/>
              <a href="{{ route('profile', ['id' => $appID]) }}" class="btn btn-primary" style="float:right; margin-right:12px;">Back</a>
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

        $("#mobile").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            return false;
        }
       });
      });
</script>
@endsection
      



