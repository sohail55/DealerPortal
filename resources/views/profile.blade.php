@extends('layouts.main')
@section('content')
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">

        <div class="col-sm-6">
          <h3 class="title">
            Profile
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
            <section class="example">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover testTable">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">S/O,D/O,W/O</th>
                      <th scope="col">Mobile No</th>
                      <th scope="col">Email Address</th>
                      <th scope="col">Mailing Address</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="S No" >{{ Session::get('memberData')[$appID]['Name']  }}</td>
                      <td data-label="S/O,D/O,W/O">{{ Session::get('memberData')[$appID]['FatherName']  }}</td>
                      @if(!empty(Session::get('memberData')[$appID]['Mobile']))
                        <td data-label="Mobile No" >{{ Session::get('memberData')[$appID]['Mobile']  }}</td>
                        @else
                        <td data-label="Email Address" > &nbsp </td>
                      @endif
                      @if(!empty(Session::get('memberData')[$appID]['Email']))
                        <td data-label="Email Address" >{{ Session::get('memberData')[$appID]['Email']  }}</td>
                      @else
                        <td data-label="Email Address" > &nbsp </td>
                      @endif
                      <td data-label="Mailing Address" >{{ Session::get('memberData')[$appID]['Paddress']  }}</td>
                      <td data-label="Action" ><a href="{{ route('editProfile', ['id' => $appID]) }}" title="Edit Address"  ><em class="fa fa-edit"></em></a> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group col-sm-12 col-md-12">
                <a href="{{ route('plotsList') }}" class="btn btn-primary " style="float:right; margin-top:32px;">Back</a>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>
@endsection
      



