@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-12">
          <h6 class="title">
            Payment Details of Plot # {{ Session::get('ledger.Plot_No') }}, Ref # {{ Session::get('ledger.RefrenceNo') }}
          </h6>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row sameheight-container">
    <div class="col-md-6">
      <div class="card card-block sameheight-item">
        <div class="title-block">
          @include('components.sessionMessages')
          <h3 class="title">
            <span style="color:red;">Please enter your desired amounts</span>
          </h3> 
        </div>
        <form action="{{ route('challanGeneration') }}" id="payment_form" method="post">
          @csrf
          @foreach($generate_challan as $key => $challan)

            @if($challan['typeof']!=3)
                @php $title = 'Installment - '; @endphp
            @else
                 @php $title = ''; @endphp
            @endif
            <div class="form-group">
              <label class="control-label">{{ $title.$challan['PaymentTitle'] }} <span style="color: red">*</span></label>             
              <input type="number" placeholder=" Remaining Amount: {{ $challan['Diff'] }}" id="{{ $challan['typeof'] }}" name="payment_type[{{ $challan['typeof'] }}]" class="form-control boxed" maxlength="30">
            </div>
          @endforeach
            <div class="form-group">
              <label class="control-label">Total Payment <span style="color: red">*</span></label>             
              <input type="number" id="total_amount" name="total_amount" value="{{ old('total_amount') }}" readonly="readonly" class="form-control boxed">
            </div>
          <div class="form-group">
            <!-- <input type="text" id="appid" name="appid" value=""> -->
            <input type="submit" name="payment_method" value="Pay Online" class="btn btn-primary">
            <input type="submit" name="payment_method" value="Download PDF For Manual Payment" class="btn btn-danger">
          </div>
        </form>
      </div>    
    </div>
    
</section>
</article>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="onload_online">
  <div class="modal-dialog modal-lg">
    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">×</button>-->
        <h4 class="modal-title" style="text-align:center;color:black;"><i class="fa fa-exclamation-circle"></i> Instructions For Challan Generation</h4>
      </div>

      <div class="modal-body">
        <dl>
          <!--<dt style="color:red;">General Instructions</dt>-->
          <dl style="padding-left:2em;">
            <dd  style="padding-left:2em;">
              <li style="text-align:justify;font-size:16px;">We have updated our challan for your convenience.</li>
            </dd>
            <dd  style="padding-left:2em;">
              <li style="text-align:justify;font-size:16px;">Now, you can make payment of <b>Cost of Plot, Surcharge and Development Charges</b> on single challan.</li>
            </dd>
            <dd  style="padding-left:2em;">
              <li style="text-align:justify;font-size:16px;">Please enter your desired amount in the relevant field(s) to generate challan.</li>
            </dd>
          </dl>
         </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
<script type="text/javascript">

  $(window).on('load', function() {
        $('#onload_online').modal('show');
    });

  $(document).ready(function() {
    $("#1 , #3, #1014, #1017").keyup(function() {
      var cost_of_plot = 0;
      var surcharge = 0;
      var dev_charges = 0;
      var membership_charges = 0;
    
      if(document.getElementById("1") && document.getElementById("1").value)
      {
        if(document.getElementById("1").value>=0)
        {
          var cost_of_plot = document.getElementById('1').value;
        }
        else
        {
          alert('Please enter valid amount in Cost of Plot');
        }
       } 

      if(document.getElementById("3") && document.getElementById("3").value)
      {
        if(document.getElementById("3").value>=0)
        {
          var surcharge = document.getElementById('3').value;
        }
        else
        {
           alert('Please enter valid amount in Surcharge');
        }
      } 
      if(document.getElementById("1014") && document.getElementById("1014").value)
      {
        if(document.getElementById("1014").value>=0)
        {
          var dev_charges = document.getElementById('1014').value;
        }
        else
        {
           alert('Please enter valid amount in Development Charges');
        }
      } 

      if(document.getElementById("1017") && document.getElementById("1017").value)
      {
        if(document.getElementById("1017").value>=0)
        {
          var membership_charges = document.getElementById('1017').value;
        }
        else
        {
           alert('Please enter valid amount in Membership Fee  Charges');
        }
      } 
      var total_amount = parseInt(cost_of_plot)+parseInt(surcharge)+parseInt(dev_charges)+parseInt(membership_charges);
      $('#total_amount').val(total_amount);
      //alert(total_amount);
    });
  });
</script>
@endsection
      



