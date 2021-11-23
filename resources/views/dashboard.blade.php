@extends('layouts.main')
@section('content')
  
<div class="sidebar-overlay" id="sidebar-overlay"></div>
    <article class="content dashboard-page">
      <section class="section">
    <div class="row sameheight-container">
          <div class="col col-12 col-xs-12 col-sm-12 col-md-6 col-xl-6 history-col">
              <div class="card sameheight-item history" data-exclude="xs">
                <div class="card-block">
              
                  <div class="title-block">
                    <h4 class="title">
                      Plots
                    </h4>
                    
                  </div>
              
                  <div class="row row-sm stats-container">
                    <div class="col-xs-12 col-sm-12 stat-col">
                        <div class="stat-icon">
                          <i class="fa fa-home"></i> 
                          @if(Session::has('userInfo'))
                            {{ count(Session::get('userInfo')) }}
                          @endif
                        </div>
                      
                      <!-- <div class="stat">
                          You have 3 unread notifications.
                      </div> -->
                      <!-- <progress class="progress stat-progress" value="75" max="100">
                        <div class="progress">
                          <span class="progress-bar" style="width: 75%;"></span>
                        </div>
                      </progress> -->
                    </div>
              
                    <!-- <div class="col-xs-12 col-sm-6 stat-col">
                      <div class="stat-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="stat">
                        <div class="value">
                          78464
                        </div>
                        <div class="name">
                          Items sold
                        </div>
                      </div>
                      <progress class="progress stat-progress" value="25" max="100">
                        <div class="progress">
                          <span class="progress-bar" style="width: 25%;"></span>
                        </div>
                      </progress>
                    </div> -->
                  </div>
              
                </div>
              </div>
            </div>

            <div class="col col-12 col-xs-12 col-sm-12 col-md-6 col-xl-6 history-col">
              <div class="card sameheight-item history" data-exclude="xs">
                <div class="card-block">
              
                  <div class="title-block">
                    <h4 class="title">
                      Notifications
                    </h4>
                    
                  </div>
              
                  <div class="row row-sm stats-container">
                    <div class="col-xs-12 col-sm-12 stat-col">
                      @if(Session::has('unread_notifications'))
                        <div class="stat-icon">
                          <i class="fa fa-bell"></i> You have {{ count(Session::get('unread_notifications')) }} unread notifications.
                        </div>
                      @else
                        <div class="stat-icon">
                          <i class="fa fa-bell"></i> You have 0 unread notifications.
                        </div>
                      @endif
                      <!-- <div class="stat">
                          You have 3 unread notifications.
                      </div> -->
                      <!-- <progress class="progress stat-progress" value="75" max="100">
                        <div class="progress">
                          <span class="progress-bar" style="width: 75%;"></span>
                        </div>
                      </progress> -->
                    </div>
              
                    <!-- <div class="col-xs-12 col-sm-6 stat-col">
                      <div class="stat-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="stat">
                        <div class="value">
                          78464
                        </div>
                        <div class="name">
                          Items sold
                        </div>
                      </div>
                      <progress class="progress stat-progress" value="25" max="100">
                        <div class="progress">
                          <span class="progress-bar" style="width: 25%;"></span>
                        </div>
                      </progress>
                    </div> -->
                  </div>
              
                </div>
              </div>
            </div>

            <div class="col col-12 col-xs-12 col-sm-12 col-md-6 col-xl-6 history-col">
              <div class="card sameheight-item history" data-exclude="xs">
                <div class="card-block">
              
                  <div class="title-block">
                    <h4 class="title">
                      Status
                    </h4>
                    
                  </div>
              
                  <div class="row row-sm stats-container">
                    <div class="col-xs-12 col-sm-12 stat-col">

                      <div class="stat-icon">
                        @if(Session::has('ndc_result'))
                         <i class="fa fa-desktop"></i>  You have <b>{{ count(Session::get('ndc_result')) }}</b> NDC Status.
                        @else
                         <i class="fa fa-desktop"></i>  You have <b> 0 </b> NDC Status.
                        @endif
                      </div>
                      <!-- <div class="stat">
                          You have 3 unread notifications.
                      </div> -->
                      <!-- <progress class="progress stat-progress" value="75" max="100">
                        <div class="progress">
                          <span class="progress-bar" style="width: 75%;"></span>
                        </div>
                      </progress> -->
                    </div>
              
                    <!-- <div class="col-xs-12 col-sm-6 stat-col">
                      <div class="stat-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="stat">
                        <div class="value">
                          78464
                        </div>
                        <div class="name">
                          Items sold
                        </div>
                      </div>
                      <progress class="progress stat-progress" value="25" max="100">
                        <div class="progress">
                          <span class="progress-bar" style="width: 25%;"></span>
                        </div>
                      </progress>
                    </div> -->
                  </div>
              
                </div>
              </div>
            </div>
        
    </div>
</section>


    </article>
@endsection
      



