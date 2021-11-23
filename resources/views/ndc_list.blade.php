@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
      <div class="title-search-block">
@include('components.sessionMessages')
  <div class="title-block">
    <div class="row">

      <div class="col-sm-6">
        <h3 class="title">
          NDC List
        </h3>
      </div>

    </div>
  </div>

</div>

<section class="section">
  @if(!empty($ndsStatus))
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-block">
            <section class="example">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover testTable">
                  <thead>
                    <tr>
                      <th scope="col">S#</th>
                      <th scope="col">Ref #</th>
                      <th scope="col">NDC #</th>
                      <th scope="col">Application Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ndsStatus as $key => $nds_status)
                    <tr>
                      <td data-label="S#" >{{ $key+1}}</td>
                      <td data-label="Ref #"> {{ $nds_status['RefrenceNo']   }}</td>
                      <td data-label="NDC #" >{{ $nds_status['NDCNo']  }}</td>
                      <td data-label="Application Date" > {{ Carbon\Carbon::parse($nds_status['NDCDate'])->isoFormat('Do MMMM, YY') }}</td>
                      <td data-label="Action" ><a href="{{ route('ndc_detail', ['id'=>$key+1]) }}"><button type="button" class="btn btn-primary">Detail</button></a> </td>
                    </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  @else
  <div class="card items">
    <ul class="item-list striped">
      <span style="padding: 10px;"> No NDC Found </span>
    </ul>
  </div>

  @endif
  </section>

    </article>
@endsection
      



