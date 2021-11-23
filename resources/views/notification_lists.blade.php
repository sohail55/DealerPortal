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

<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            <i class="fa fa-bell"></i> Notifications List
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
          <div class="container">
            <div class="row">
              <div class="col-lg-12 right">
                    <div class="box shadow-sm rounded bg-white mb-3">
                        <!-- <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Recent</h6>
                        </div> -->
                        <div class="box-body p-0">
                          
                          @if(!empty($user_notifications ))
                            @foreach($user_notifications as $key =>$notification)
                            <?php
                              $out = strlen($notification['Description']) > 130 ? substr($notification['Description'],0,130)."..." : $notification['Description'];
                            ?>
                              <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                                <?php 
                                  $date = Carbon\Carbon::parse($notification['date'], 'UTC');
                                  $last_date = $date->isoFormat('Do MMMM, YY');

                                 ?>
                                  @if($notification['Seen'] == 1)
                                  <div class=" mr-3"> <!--   font-weight-bold     -->
                                      <div class="text-truncate">{{ $notification['Title'] }} </div> 
                                      <div class="small"><a style="text-decoration: none;" href="{{ route('notification_detail', ['notification_id'=> $key]) }}" ><?php echo $out; ?></a><span style="float:right;">{{ $last_date }}</span></div>
                                  </div>
                                  @else
                                    <div class="font-weight-bold  mr-3"> 
                                      <div class="text-truncate">{{ $notification['Title'] }}</div> 
                                      <div class="small text-truncate"><a style="text-decoration: none;" href=" {{ route('notification_detail', ['notification_id'=> $key]) }} "><span style="color:black;"><?php echo $out; ?></span></a><span style="float:right;">{{ $last_date   }}</span></div>
                                  </div>
                                  @endif
                                  
                              </div>
                            @endforeach
                          @else
                            <span>You have 0 Notifications.</span>
                          @endif
                        </div>
                </div>
              </div>
            </div>
              

        </div>
      </div>
    </div>

  </div>
</section>

</article>



@endsection

<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>