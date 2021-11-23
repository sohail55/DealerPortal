@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Complaint Details
          </h3>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row sameheight-container">
    <div class="col-md-12">
      <div class="card card-block sameheight-item">
        <div class="title-block">
          @include('components.sessionMessages') 
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <ul class="list-group">
            <li class="list-group-item"><span class="complaint_status">Complaint No:</span><span>{{ $complaint_status['case_number'] }}</span></li>
            <li class="list-group-item"><span class="complaint_status">Complaint Status:</span><span>{{ ucwords($complaint_status['ticket_status_c']) }}</span></li>
            <li class="list-group-item"><span class="complaint_status">Category:</span><span>{{ $complaint_status['category_c'] }}</span></li>
            <li class="list-group-item"><span class="complaint_status">Subcategory:</span><span>{{ $complaint_status['sub_category_c'] }}</span></li>
            <li class="list-group-item"><span class="complaint_status">Create Date:</span><span>{{ Carbon\Carbon::parse($complaint_status['date_entered'])->isoFormat('Do MMMM, YY') }}  </span></li>
            <li class="list-group-item"><span class="complaint_status">Message:</span><span>{{ $complaint_status['agent_comments_c'] }}</span></li>
            @if(!empty($complaint_status['resolution']))
              <li class="list-group-item"><span class="complaint_status">Agent Response:</span><span>{{ $complaint_status['resolution'] }}</span></li>
            @else
              <li class="list-group-item"><span style="font-weight: bold;">Agent Response:</span><span>{{ $complaint_status['resolution'] }}</span></li>
            @endif
          </ul>
        </div>
        <div class="form-group col-sm-12 col-md-12">
          <a href="{{ route('complaintStatus') }}" class="btn btn-primary " style="float:right; margin-top:5px;">Back</a>
        </div>
      </div>    
    </div>
  </div>
</section>
</article>
@endsection
      



