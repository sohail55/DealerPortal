@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
  @include('components.sessionMessages')
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Complaint List
          </h3>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
  @if(!empty($complaints))
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
                        <th scope="col">Mobile No</th>
                        <th scope="col">Ticket No</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($complaints as $key=> $complaint)
                      <tr>
                        <td data-label="S#" >{{ $key+1}}</td>
                        <td data-label="Ref #"> {{ $complaint['phone_number']   }}</td>
                        <td data-label="NDC #" >{{ $complaint['ticket_no']  }}</td>
                        <td data-label="Action" ><a href="{{ route('complaint_detail', ['id'=>$complaint['id']]) }}"><button type="button" class="btn btn-primary">Detail</button></a> </td>
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
        <span style="padding: 10px;">You have no Complaints.</span>
      </ul>
    </div>
  @endif
  </section>

</article>
@endsection
      



