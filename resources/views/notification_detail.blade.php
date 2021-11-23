@extends('layouts.main')
@section('content')
<style type="text/css">
  
  body{
    margin-top:0px;
    background-color: #f0f2f5;
}
.dropdown-list-image {
    position: relative;
    height: 2.5rem;
    width: 2.5rem;
}
.dropdown-list-image img {
    height: 2.5rem;
    width: 2.5rem;
}
.btn-light {
    color: #2cdd9b;
    background-color: #e5f7f0;
    border-color: #d8f7eb;
}
.container {
    max-width: 1560px;
}
.border-bottom {
    border-bottom: 1px solid #dee2e6!important;
}
.p-3 {
    padding: 1rem!important;
}
.btn-light:not(:disabled):not(.disabled).active, .btn-light:not(:disabled):not(.disabled):active, .show>.btn-light.dropdown-toggle {
    color: #212529;
    background-color: #dae0e5;
    border-color: #d3d9df;
}
.rounded {
    border-radius: .25rem!important;
}
.sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
</style>
@if(Session::has('total_notifications'))
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            {{ Session::get('total_notifications')[$notification_id]['Title'] }}
          </h3>
        </div>
        <div class="col-sm-6">
          <span style="float: right;">
             <?php 
                $date = Carbon\Carbon::parse(Session::get('total_notifications')[$notification_id]['date'], 'UTC');
               echo $last_date = $date->isoFormat('Do MMMM, YY');
            ?>
          </span>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row">
    
        <div class="col-md-12">
          <div class="card">
            <div class="card-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 right">
                            <div class="box shadow-sm rounded bg-white mb-3">
                                <!-- <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Recent</h6>
                                </div> -->
                                <div class="box-body p-0">
                                    <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                                        <div class="font-weight-bold mr-3">
                                            <div class="small"><?php echo nl2br(Session::get('total_notifications')[$notification_id]['Description']); ?></div>
                                        </div>
                                    </div>

                                    <div class="p-3 d-flex align-items-center bg-light osahan-post-header">
                                        <!-- <a href="#" style="color:blue"><img class="" src="{{ asset('public/images/pdf-final.png') }}" height="40px;" width="40px;">DHA Challan</a>
                                        <a href="#" style="color:blue"><img class="" src="{{ asset('public/images/excel-final.png') }}" height="40px;" width="35px;"> Rumanza Golf</a> -->
                                    </div>
                                </div>
                                <a href="{{ route('notifications') }}" class="btn btn-primary " style="float:right; margin-top:5px;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    @endif

  </div>
</section>

</article>



@endsection

<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>