@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">

        <div class="col-sm-6">
          <h3 class="title">
            Payment Detail
          </h3>
        </div>

      </div>
    </div>
    
    <section class="section">
      <div class="row sameheight-container" style="display: flex; justify-content: center;">
        <div class="col-md-6">
          <div class="card card-block sameheight-item" style="height: 568px;">
            <div class="title-block">
              <h3 class="title">
                <span style="color:red;">Please enter your desired amounts</span>
              </h3> 
            </div>
            <form action="" id="payment_form" method="post">       
              <div class="form-group">
                <label class="control-label">Bill Payment <span style="color: red">*</span></label>             
                <input type="number" placeholder="" id="3" name="payment_type[3]" class="form-control boxed" maxlength="30">
              </div>
              <div class="form-group">
                <!-- <input type="text" id="appid" name="appid" value=""> -->
                <input type="submit" name="payment_method" value="Pay Online" class="btn btn-primary">
                <a href="{{ route('payments') }}" class="btn btn-danger"> Back</a>
              </div>
            </form>
          </div>    
        </div>
      </div>
    </section>
  </div>

</article>
@endsection
      



