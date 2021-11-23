@extends('layouts.main')
@section('content')
<article class="content items-list-page">
  <!-- <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Review Payment Details
          </h3>
        </div>
      </div>
    </div>
  </div> -->

<section class="section">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <!-- <div class="card-title-block">
            <h3 class="title">
              Responsive simple
            </h3>
          </div> -->
          <section class="example">
            <div class="table-responsive">
              <div class="card">
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                  <i class="checkmark">✓</i>
                </div>
                  <h1>Success</h1> 
                  <p>Payment has been made successfully.</p>
                </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

</article>

@endsection

<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
