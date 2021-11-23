@extends('layouts.main')
@section('content')
  
<article class="content items-list-page">
  <div class="title-search-block">
    <div class="title-block">
      <div class="row">

        <div class="col-sm-6">
          <h3 class="title">
            Payments Page
          </h3>
        </div>

      </div>
    </div>
    <center>
      <div class="card items">
        <ul class="item-list striped">
          <li class="item item-list-header">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="our-team-main">
                  <a href="{{ route('payment_detail') }}" class="anchor_icon">
                    <div class="team-front payment-style">
                      <i class="fa-3x fa-phone-square font-icon-color"></i> 
                      <h3>Telephone</h3>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="our-team-main">
                  <a href="{{ route('payment_detail') }}" class="anchor_icon">
                    <div class="team-front payment-style">
                      <i class="fa-3x fa-tint font-icon-color"></i> 
                      <h3>Gas</h3>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="our-team-main">
                  <a href="javascript:void(0);" class="anchor_icon">
                    <div class="team-front payment-style">
                      <i class="fa-3x fa-lightbulb-o font-icon-color"></i> 
                      <h3>Electricity</h3>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="our-team-main">
                  <a href="javascript:void(0);" class="anchor_icon">
                    <div class="team-front payment-style">
                      <img src="{{ asset('public/images/water-solid-svg.webp')}} " alt="" class="font-icon-color" style="height: 50px;">
                      <h3>Water</h3>
                  </a>
                </div>
              </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="our-team-main">
                  <a href="javascript:void(0);" class="anchor_icon">
                    <div class="team-front payment-style">
                       <img src="{{ asset('public/images/solar-panel-solid.webp')}} " alt="" class="font-icon-color" style="height: 50px;">
                      <h3>Solar</h3>
                    </div>
                  </a>

                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="our-team-main">
                  <a href="javascript:void(0);" class="anchor_icon">
                    <div class="team-front payment-style">
                      <i class="fa-3x fa-lightbulb-o font-icon-color"></i> 
                      <h3>Electricity</h3>
                    </div>
                  </a>

                </div>
              </div>
            </div>
          </li>
        </ul>
        <!-- <ul class="item-list striped">
          <li class="item item-list-header">
            <div class="row">
              <div class="col-md-4 col-sm-6">
              <button type="button" class="payment-btn payment-style btn-primary"><i class="fa fa-phone-square"></i>  PTCL Payment</button>
            </div>
            <div class="col-md-4 col-sm-6">
              <button type="button" class="payment-btn payment-style btn-primary"><i class="fa fa-tint"></i>  Gas Payment</button>
            </div>
            <div class="col-md-4 col-sm-6">
              <button type="button" class="payment-btn payment-style btn-primary"><i class="fa fa-lightbulb-o"></i>  Electricity Payment</button>
            </div>
            <div class="col-md-4 col-sm-6">
              <button type="button" class="payment-btn payment-style btn-primary"><i class="fa fa-phone"></i>  PTCL Payment</button>
            </div>
            <div class="col-md-4 col-sm-6">
              <button type="button" class="payment-btn payment-style btn-primary"><i class="fa fa-tint"></i>  Gas Payment</button>
            </div>
            <div class="col-md-4 col-sm-6">
              <button type="button" class="payment-btn payment-style btn-primary"><i class="fa fa-lightbulb-o"></i>  Electricity Paymentt</button>
            </div>
          </div>
          </li>
        </ul> -->
      </div>
      <!-- <div class="row">
  
  
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
            <div class="team-front">
              <i class="fa-3x fa-phone-square font-icon-color"></i> 
              <h3>PTCL Payment</h3>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
            <div class="team-front">
              <i class="fa-3x fa-phone-square font-icon-color"></i> 
              <h3>PTCL Payment</h3>
              <p>&nbsp;</p>
            </div>
          </div>
        </div> 
        

        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
            <div class="team-front">
              <i class="fa-3x fa-tint font-icon-color"></i> 
              <h3>Gas Payment</h3>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
            <div class="team-front">
              <i class="fa-3x fa-lightbulb-o font-icon-color"></i> 
              <h3>Electricity Payment</h3>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
          
            <div class="team-front">
              <i class="fa-3x fa-phone-square font-icon-color"></i> 
              <h3>PTCL Payment</h3>
              <p>&nbsp;</p>
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
          
            <div class="team-front">
              <i class="fa-3x fa-phone-square font-icon-color"></i> 
              <h3>PTCL Payment</h3>
              <p>&nbsp;</p>
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="our-team-main">
          
            <div class="team-front">
              <i class="fa-3x fa-phone-square font-icon-color"></i> 
              <h3>PTCL Payment</h3>
              <p>&nbsp;</p>
            </div>

          </div>
        </div> 

      </div>-->    
  </center>
  </div>

</article>
@endsection
      



