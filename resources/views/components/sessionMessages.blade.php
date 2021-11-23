@if (Session::has('success_message'))
    <div class="alert alert-success"
        style="{{ Route::current()->getName() == 'dashboard' ? 'border-radius: 0px; margin-top: 15px' : '' }}" role="alert">
        <div class="alert-text"
            style="{{ Route::current()->getName() == 'login' ? 'margin: 5px;' : 'margin: 10px;' }}">
            <a href="#" style="text-decoration: none;color: #000!important;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p style=""> {{ session::get('success_message') }} </p>
        </div>
    </div>
@endif

@if (Session::has('error_message'))
    <div class="alert alert-danger"
        style="{{ Route::current()->getName() != 'login' ? '' : '' }}" role="alert">
        <div class="alert-text" style="{{ Route::current()->getName() != 'login' ? 'margin: 10px;' : 'margin: 10px;' }}"><a href="#" style="text-decoration: none;color: #000!important; padding-right: 10px;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p>  {{ session::get('error_message') }} </p>
      </div>
    </div>
@endif

@if (Session::get('errors'))
    <div class="alert alert-danger"
        style="{{ Route::current()->getName() != 'login' ? 'border-radius: 0px; margin: 0px' : '' }}" role="alert">
        <div class="alert-text" style="{{ Route::current()->getName() != 'login' ? 'margin-left: 10px;' : '' }}"><a href="#" style="text-decoration: none;color: #000!important; padding-right: 10px;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('errors')->first() }}</div>
    </div>
@endif
