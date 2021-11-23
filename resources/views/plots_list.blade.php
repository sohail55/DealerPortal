@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
      <div class="title-search-block">
@include('components.sessionMessages')
  <div class="title-block">
    <div class="row">

      <div class="col-sm-6">
        <h3 class="title">
          Plots
        </h3>
      </div>

    </div>
  </div>

  <!-- <div class="items-search">
    <form class="form-inline">
      <div class="input-group">
        <input type="text" class="form-control boxed rounded-s" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary rounded-s" type="button">
            <i class="fa fa-search"></i> Search
          </button>
        </span>
      </div>
    </form>
  </div> -->
</div>

<section class="section">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-block"> 
            <section class="example">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover testTable">
                  <thead>
                    <tr>
                      <th  scope="col">S#</th>
                      <th  scope="col">Phase</th>
                      <th   scope="col">Sector</th>
                      <th  scope="col">Plot No</th>
                      <th  scope="col">Plot Size</th>
                      <th  scope="col">Reference</th>
                      <th  scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Session::has('userInfo'))
                      @foreach(Session::get('userInfo') as $key => $userInfo)
                      <tr>
                          <td  data-label="S No">{{ $key+1 }}</td>
                          <td  data-label="Phase"> 1 </td>
                          <td  data-label="Sector">{{ $userInfo['Sector'] }}</td>
                          <td  data-label="Plot No">{{ $userInfo['PlotNumber'] }}</td>
                          <td  data-label="Plot Size">{!! $userInfo['PlotSizeName'] !!}</td>
                          <td  data-label="Reference">{{ $userInfo['RefrenceNo'] }}</td>
                          <td  data-label="Action"><a href="{{ route('viewLedger', ['appid' => $userInfo['AppID']]) }}"><button type="button" class="btn btn-primary">View Ledger</button></a>
                          <a href="{{ route('profile', ['id' => $userInfo['AppID']]) }}"><button type="button" class="btn btn-primary"> Update Address</button></a></td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </section>
          </div>
      </div>
    </div>
  </div>
</section>



<!-- <div class="card items">
  <ul class="item-list striped">
    <li class="item item-list-header hidden-sm-down">
      <div class="item-row">
        <div class="item-col item-col-header item-col-sales" >
          <div>
            <span>S No</span>
          </div>
        </div>
        <div class="item-col item-col-header item-col-sales">
          <div>
            <span>Phase</span>
          </div>
        </div>
        <div class="item-col item-col-header item-col-category">
          <div class="no-overflow">
            <span>Sector</span>
          </div>
        </div>
        <div class="item-col item-col-header item-col-sales">
          <div>
            <span>Plot No</span>
          </div>
        </div>
        <div class="item-col item-col-header item-col-author">
          <div class="no-overflow">
            <span>Plot Size</span>
          </div>
        </div>
        <div class="item-col item-col-header item-col-author">
          <div class="no-overflow">
            <span>Reference</span>
          </div>
        </div>
        <div class="item-col item-col-header item-col-date">
          <div>
            <span>Action</span>
          </div>
        </div>
        <div class="item-col item-col-header fixed item-col-actions-dropdown">

        </div>
      </div>
    </li>
    @if(Session::has('userInfo'))
      @foreach(Session::get('userInfo') as $key => $userInfo)
        <li class="item"> 
          <div class="item-row">
            <div class="item-col item-col-sales">
              <div class="item-heading">S No</div>
              <div>
                {{ $key+1}}
              </div>
            </div>
            <div class="item-col item-col-sales">
              <div class="item-heading">Phase</div>
              <div>
                1
              </div>
            </div>
            <div class="item-col item-col-category no-overflow">
              <div class="item-heading">Sector</div>
              <div class="no-overflow">
                {{ $userInfo['Sector'] }}
              </div>
            </div>
            <div class="item-col item-col-sales">
              <div class="item-heading">Plot No</div>
              <div>
                {{ $userInfo['PlotNumber'] }}
              </div>
            </div>
            
            <div class="item-col item-col-author no-overflow">
              <div class="item-heading">Plot Size</div>
              <div class="no-overflow">
                {!! $userInfo['PlotSizeName'] !!}
              </div>
            </div>
            <div class="item-col item-col-author">
              <div class="item-heading">Reference No</div>
              <div class="no-overflow">
                {{ $userInfo['RefrenceNo'] }}
              </div>
            </div>
            <div class="item-col item-col-date">
              <div class="item-heading">Action</div>
              <div>
                <a href="{{ route('viewLedger', ['appid' => $userInfo['AppID']]) }}"><button type="button" class="btn btn-primary">View Ledger</button></a>
                <a href="{{ route('profile', ['id' => $userInfo['AppID']]) }}"><button type="button" class="btn btn-primary">View Profile&nbsp</button></a>
              </div>
            </div>
            <div class="item-col fixed item-col-actions-dropdown">
              <div class="item-actions-dropdown">
                <div class="item-actions-block">
                </div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    @endif
  </ul>
</div> -->

<!-- <nav class="text-xs-right">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="">
        Prev
      </a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="">
        1
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="">
        2
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="">
        3
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="">
        4
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="">
        5
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="">
        Next
      </a>
    </li>
  </ul>
</nav> -->
    </article>
@endsection
      



