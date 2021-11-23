<style>.container {
     margin-top: 50px;
     margin-bottom: 50px
 }

 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #FF5722
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #ee5435;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }
.ndc {
	padding: 10px;
}
</style>
@extends('layouts.main')
@section('content')
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            NDC Status
          </h3>
        </div>
      </div>
    </div>
  </div>

    <section class="section">
      <div class="">
        <article class="card ndc">
            <!-- <header class="card-header"> My Orders / Tracking </header> -->
            
                <!-- <h6>Ref No: OD453453435</h6> -->
                @if(Session::has('total_ndc'))
                    <div class="card-body">
                        <article class="card">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <ul class="list-group">
                                    <li class="list-group-item"><span class="complaint_status">Ref No:</span><span>{{ Session::get('total_ndc')[$id]['RefrenceNo'] }}</span></li>
                                    <li class="list-group-item"><span class="complaint_status">NDC No:</span><span>{{ Session::get('total_ndc')[$id]['NDCNo'] }}</span></li>
                                    <li class="list-group-item"><span class="complaint_status">Application Date:</span><span>{{ Carbon\Carbon::parse(Session::get('total_ndc')[$id]['NDCDate'])->isoFormat('Do MMMM, YY') }}</span></li>
                                    <li class="list-group-item"><span class="complaint_status">Status:</span><span>{{  Session::get('total_ndc')[$id]['Status'] }}</span></li>
                                </ul>
                            </div>
                            <div class="card-body row">
                               
                                <!-- <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div> -->
                            </div>
                        </article>
                        <div class="track">
                            <!-- <div class="step active"> <span class="icon"> </span> <span class="text">Apply</span> </div> -->
                            <div class="step active"> <span class="icon">  </span> <span class="text"> In Process</span> </div>
                            @if(isset(Session::get('total_ndc')[$id]['Status']) && Session::get('total_ndc')[$id]['Status'] == 'NDC Approved')
                                <div class="step active"> <span class="icon">  </span> <span class="text"> Approved <b>{{ Carbon\Carbon::parse(Session::get('total_ndc')[$id]['ApprovalDate'])->isoFormat('Do MMMM, YY')  }} </b></span>  </div>
                            @elseif(isset(Session::get('total_ndc')[$id]['Status']) && Session::get('total_ndc')[$id]['Status'] == 'NDC Rejected')
                                <div class="step active"> <span class="icon">  </span> <span class="text"> Rejected <b>{{ Carbon\Carbon::parse(Session::get('total_ndc')[$id]['ApprovalDate'])->isoFormat('Do MMMM, YY')  }} </b></span>  </div>
                            @else
                                <div class="step"> <span class="icon">  </span> <span class="text"> Approved </span>  </div>
                            @endif

                            <!-- <div class="step"> <span class="icon">  </span> <span class="text">Rejected</span> </div> -->
                        </div>
                        <hr>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                      <a href="{{ route('ndc_list') }}" class="btn btn-primary " style="float:right; margin-top:32px;">Back</a>
                    </div>
                @endif
                
            
        </article>
    </div>  
    </section>


</article>



@endsection

<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>