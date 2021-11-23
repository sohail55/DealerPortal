@extends('layouts.main_mobile')
@section('content')
<?php
$URL = "https://cvportal.dhamultan.org/member_ledger/challancc";
$cancel_URL = "https://cvportal.dhamultan.org/member_ledger/challanGeneration";

$requestBody = '{
    "apiOperation": "CREATE_CHECKOUT_SESSION",
    "interaction": {
        "operation": "PURCHASE"
    },
    "order": {
        "id" : "'.Session::get('payment_details.challan_no').'",
        "currency" : "PKR"
    }
}' ;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://bankalfalah.gateway.mastercard.com/api/rest/version/54/merchant/DHALAHOREMUL/session");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody) ;  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;

$headers = [
    'Authorization: Basic '.base64_encode("merchant.DHALAHOREMUL:89d5dbe6f2f7083e5efb75227d302c00"),
    'Content-Type: application/json',
    'Host: bankalfalah.gateway.mastercard.com',
    'Referer: https://eapp.dhamultan.org', //Your referrer address
    'cache-control: no-cache',
    'Accept: application/json'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = curl_exec($ch) ;
curl_close ($ch);

$json = json_decode($server_output, true) ;
//dd($json['error']);
$sessionId = isset($json['session']['id']) ? $json['session']['id'] : '' ;

?>
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Review Payment Details
          </h3>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <!-- <div class="card-title-block">
            <h3 class="title">
              Responsive simple
            </h3>
          </div> -->
          <section class="example">
            <div class="table-responsive">
              <table class="table table-striped  table-hover">
                <tbody>
                  <tr>
                    <td>Challan No</td>
                    <td></td>
                    <td>{{ Session::get('payment_details.challan_no')  }}</td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td></td>
                    <td>{{ Session::get('payment_details.bill_to_forename') }}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td></td>
                    <td>{{ Session::get('payment_details.bill_to_address_line1').' '.Session::get('payment_details.bill_to_address_line2') }}</td>
                  </tr>
                  <tr>
                    <td><strong>Total Amount: </strong></td>
                    <td></td>
                    <td class="text-center text-danger"><h6><strong>Rs.{{ Session::get('payment_details.amount') }}</strong></h6></td>
                  </tr>

                </tbody>
              </table>
              <input type="hidden" name="state" id="state" value="">
              <input type="submit" name="submit" value="Confirm" id="startrunning" class="btn btn-primary" style="float:right; margin-top:0px;" onClick="Checkout.showPaymentPage();"/>
                </form>
            <!-- <a href="{{ route('challanGeneration') }}" class="btn btn-primary" style="float:right; margin-right:12px;">Previous</a> -->
            </div>
          </section>

        </div>
      </div>
    </div>

  </div>
</section>

</article>



@endsection

<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
<script src="https://bankalfalah.gateway.mastercard.com/checkout/version/54/checkout.js"
  data-error="errorCallback"
  data-cancel="cancelCallback"
  data-complete="completeCallback">
</script>
    
<script type="text/javascript">

  function errorCallback(error) {
       console.log(JSON.stringify(error));
  alert(JSON.stringify(error));
  }
    
function cancelCallback() {
  var redirect = confirm('Are you sure you want to cancel?');
  alert(redirect);
  if(redirect){window.location.replace("<?php echo $cancel_URL; ?>");}
  console.log('Payment cancelled');
}
        
function timeoutCallback() {
  alert("timeoutCallback function") ;
  console.log('Payment timedout');
  document.getElementById("state").value = "timeoutCallback" ;
}

function completeCallback(resultIndicator, sessionVersion) {

    alert("You are being redirected to Payment Receipt Page. Press Ok!") ;
    //document.getElementById("state").value = "completeCallback" ;
    
    window.location.replace("<?php echo $URL.'?order_id='.Session::get('payment_details.challan_no'); ?>");
}
        
        
Checkout.configure({
  merchant: 'DHALAHOREMUL',
  session: {
            id: function() {
              return '<?php echo $sessionId; ?>'
            }
        },
      order: {
                    amount: function() {
                        return '<?php echo Session::get('payment_details.amount');?>'
                    },
                    currency: '<?php echo 'Rs'; ?>',
                    description: '<?php echo 'DHAM '.Session::get('payment_details.challan_no') ?>',
                    id: function() {
                        return '<?php echo Session::get('payment_details.challan_no');?>'
                    }
                },
            interaction: {
                operation: 'PURCHASE', // set this field to 'PURCHASE' for <<checkout>> to perform a Pay Operation.
                merchant: {
                    name: '<?php echo Session::get('payment_details.bill_to_forename'); ?>',
                    address: {
                        line1: '<?php echo Session::get('payment_details.bill_to_address_line1');?>',
                        line2: '<?php echo Session::get('payment_details.bill_to_address_line2');?>'            
                    }    
                },
        
        locale        : 'en_US',
        theme         : 'default',
      
        displayControl: {
          orderSummary    : 'SHOW',
          shipping        : 'HIDE',
          billingAddress  : 'HIDE',
          customerEmail   : 'HIDE'
          
        }
            }
        });
</script> 
      



