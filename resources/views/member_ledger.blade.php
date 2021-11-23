@extends('layouts.main')
@section('content')

<article class="content items-list-page">
      <div class="title-search-block">

  <div class="title-block">
    <div class="row">

      <div class="col-sm-12">
        <h6 class="title">
          Payment Details of Plot # {{ $member_ledger[0]['Plot_No'] }},  Ref # {{ $member_ledger[0]['RefrenceNo'] }}
        </h6>
        <!-- <h5>
          Plot #: {{ $member_ledger[0]['Plot_No'] }} <br/>
          Ref #: {{ $member_ledger[0]['RefrenceNo'] }}
        </h5> -->
      </div>

    </div>
  </div>

</div>

<section class="section">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <div class="card-title-block">
            @php 
              $dueAmount = 0; 
              $PaidAmount = 0;
              $PendingBalance = 0;
              $Surcharge = 0;
              $OtherPayments = 0;
            @endphp
            @foreach($member_ledger as $key => $ledger)
              @php 
                $dueAmount += isset($ledger['MainEntry']) && $ledger['MainEntry'] == 1 ? $ledger['Amount']: '0';  
                $PaidAmount += $ledger['PaidAmount'];  
                $PendingBalance += $ledger['PendingBalance'];  
                $Surcharge += $ledger['Surcharge'];  
                $OtherPayments += $ledger['OtherPayments'];  
              @endphp
            @endforeach

            <!-- <h3 class="title"> Plot No: {{ $member_ledger[0]['Plot_No'] }} </h3> -->
            @if(!empty($PaidAmount) && !empty($dueAmount) )
              <a href="{{ route('getChallanFields', ['appid' => $member_ledger[0]['MemberID']]) }}" class="btn btn-primary">Generate Challan</a>&nbsp;&nbsp;

              <a href="{{ route('pdfview',['download'=>'pdf']) }}" class="btn btn-primary"><em class="fa fa-envelope"></em> Acknowledgement Letter</a>
            @endif
          </div>
          <section class="example">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="table-1">
                <thead>
                  <tr>
                    <th  width="4%">S#</th>
                    <th  width="16%">Description</th>
                    <th  width="15%">Due Date</th>
                    <th  width="10%">Due Amount</th>
                    <th  width="15%">Received Date</th>
                    <th  width="8%">Ins. No</th>
                    <th  width="15%">Received Amount</th>
                    <th  width="10%">Out. Balance</th>
                    <th  width="8%">Surcharge</th>
                    <th  width="20%">Other Payments</th>
                    <th  width="10%">Remarks</th>
                    <!-- <th  width="10%">Payment Method</th>
                    <th  width="10%">Challan</th> -->
                  </tr>
                </thead>
                <tbody>
                  @php 

                  $dueAmount = 0; 
                  $PaidAmount = 0;
                  $PendingBalance = 0;
                  $Surcharge = 0;
                  $OtherPayments = 0;
                  @endphp

                  @foreach($member_ledger as $key => $ledger)
                    <tr>
                        <td width="4%">{{ $key+1 }}</td>
                        <td width="16%">{{ $ledger['ChalanTitle'] }}</td>
                        @if(!empty($ledger['DueDate']))
                          <td width="15%">{{ date('d-M-y',strtotime($ledger['DueDate'])) }}</td>
                        @else
                          <td width="15%"></td>
                        @endif
                        <td width="10%">{{ number_format($ledger['Amount']) }}</td>
                        @if(!empty($ledger['RecevingDate']))
                          <td width="15%">{{ date('d-M-y',strtotime($ledger['RecevingDate'])) }}</td>
                        @else
                          <td width="15%"></td>
                        @endif
                        <td width="8%">{{ $ledger['InstrumentNo'] }}</td>
                        <td width="15%">{{ number_format($ledger['PaidAmount']) }}</td>
                        <td width="10%">{{ number_format($ledger['PendingBalance']) }}</td>
                        <td width="8%">{{ number_format($ledger['Surcharge']) }}</td>
                        <td width="20%">{{ number_format($ledger['OtherPayments']) }}</td>
                        <td width="10%">{{ $ledger['Remarks'] }}</td>

                        @php 
                          $dueAmount += isset($ledger['MainEntry']) && $ledger['MainEntry'] == 1 ? $ledger['Amount']: '0';  
                          $PaidAmount += $ledger['PaidAmount'];  
                          $PendingBalance += $ledger['PendingBalance'];  
                          $Surcharge += $ledger['Surcharge'];  
                          $OtherPayments += $ledger['OtherPayments'];  
                        @endphp
                        <!-- <td></td>
                        <td></td> -->
                    </tr>
                  @endforeach
                  <tr>
                    <td colspan="3"><b>Grand Total</b></td>
                    <td><b>{{ number_format($dueAmount) }}</b></td>
                    <td colspan="2"></td>
                    <td><b>{{ number_format($PaidAmount) }}</b></td>
                    <td><b>{{ number_format($dueAmount - $PaidAmount) }}</b></td>
                    <td><b>{{ number_format($Surcharge) }}</b></td>
                    <td><b>{{ number_format($OtherPayments) }}</b></td>
                  </tr>
                  @if(!empty($PaidAmount) && !empty($dueAmount) )
                    <tr>
                      <th  width="4%">S#</th>
                      <th  width="16%">Description</th>
                      <th  width="15%">Due Date</th>
                      <th  width="10%">Due Amount</th>
                      <th  width="15%">Received Date</th>
                      <th  width="8%">Ins. No</th>
                      <th  width="15%">Received Amount</th>
                      <th  width="10%">Out. Balance</th>
                      <th  width="7%">Surcharge</th>
                      <th  width="15%">Other Payments</th>
                      <th  width="10%">Remarks</th>
                      <!-- <th  width="10%">Payment Method</th>
                      <th  width="10%">Challan</th> -->
                    </tr>
                  @endif
                </tbody>
              </table>
              <table id="header-fixed"></table>
               @php 
                Session::put('acknowledgeLetter.PlotNumber',  $member_ledger[0]['PlotNumber']);
                Session::put('acknowledgeLetter.Sector', $member_ledger[0]['Sector']);
                Session::put('acknowledgeLetter.RefrenceNo', $member_ledger[0]['RefrenceNo']);
                Session::put('acknowledgeLetter.total_paid_amount', $PaidAmount);
              @endphp
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  
</section>


    </article>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript">
    var tableOffset = $("#table-1").offset().top;
    var $header = $("#table-1 > thead").clone();
    var $fixedHeader = $("#header-fixed").append($header);

    $(window).bind("scroll", function() {
        var offset = $(this).scrollTop();
        console.log(offset);
        
        if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
            $fixedHeader.show();
        }
        else if (offset < tableOffset) {
            $fixedHeader.hide();
        }
    });
  </script>
@endsection
      



