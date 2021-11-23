<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #image-viewer {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9);
}

.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 500px;
}

.modal-content { 
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

#image-viewer .close {
  position: absolute;
  top: 100px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

#image-viewer .close:hover,
#image-viewer .close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

@media only screen and (max-width: 700px){
  .modal-content {
      width: 100%;
  }
}
</style>
@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="title">
            Upload Challan
          </h3>
        </div>
      </div>
    </div>
  </div>

<section class="section">
  <div class="row sameheight-container">
    <div class="col-md-12">
      <div class="card card-block ">
        <div class="title-block">
          @include('components.sessionMessages') 
        </div>
        <form action="{{ route('saveChallan') }}" id="payment_form" name="payment_form" method="post" enctype="multipart/form-data">
          @csrf
          <fieldset class="form-group col-sm-12 col-md-8">
            <label class="control-label" for="formGroupExampleInput">Upload Challan Pic <span style="color: red">*</span></label>
            <input type="file" class="form-control form-control col-sm-12 col-md-8"  id="challan_image" name="challan_image"  ><span style="color:red;">(FileSize <= 250 Kb only jpg, png, jpeg allowed) </span>
          </fieldset>
          <div class="col-md-6" id="cv_preview" style="display:none;">
                      <img id="cv-image-before-upload" src=""
                        alt="preview image" style="max-height: 100px;">
                    </div>
         
          <div class="form-group col-sm-12 col-md-12">
            <input type="submit" name="ajax_submit" value="Submit" class="btn btn-primary" style="float:right"/>
          </div>
  
        </form>
      </div>
      @if(!empty($images))
      <div class="title-search-block">
        <div class="title-block">
          <div class="row">
            <div class="col-sm-6">
              <h3 class="title">
                Challan History
              </h3>
            </div>
          </div>
        </div>
      </div>
        <div class="card card-block">
          <?php $user_id =  isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : ''; ?>
            @foreach($images as $image) 
              @if($image['user_id'] == $user_id)
                <div class="col-md-6" id="cv_preview" style="display:block; margin-bottom:15px;">
                  <img id="cv-image-before-upload" src="http://cvportal.dhamultan.org/member_ledger/storage/app/public/uploads/{{ $image['image'] }}" alt="preview image" style="height: auto;width: 15%;aspect-ratio: 7/5"> &nbsp &nbsp {{ date('d-M-Y',strtotime($image['created_at'])) }}
                </div>
              @endif
            @endforeach
        </div> 
      @endif   
    </div>
    
</section>
</article>


<div id="image-viewer">
  <span class="close">&times;</span>
  <img class="modal-content" id="full-image">
</div>

<script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

<script type="text/javascript">
    $('#challan_image').change(function(){     
      let reader = new FileReader();
      reader.onload = (e) => { 
        $('#cv_preview').show();
        $('#cv-image-before-upload').attr('src', e.target.result); 
      }
      reader.readAsDataURL(this.files[0]); 
     });

    $("#cv_preview img").click(function(){
      $("#full-image").attr("src", $(this).attr("src"));
      $('#image-viewer').show();
    });

    $("#image-viewer .close").click(function(){
      $('#image-viewer').hide();
    });

</script>

@endsection
      



