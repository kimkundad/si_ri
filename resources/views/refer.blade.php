@extends('layouts.template')
@section('title')
Refer friend | Siri Space
@stop
@section('stylesheet')
<link href="{{url('assets/css/confirm.css')}}" rel="stylesheet" type="text/css" />
@stop('stylesheet')

@section('content')


<style>
@media (min-width: 1200px)
{

  .container {
      width: 970px;
  }
}
.text-green{
      color: #038206;
}
h2 span, h3 span, h4 span, h5 span, h6 span {
    color: #038206;
}
ul.list_order {
    margin: 0 0 30px;
    padding: 0;
    line-height: 30px;
    font-size: 14px;
}
ul.list_order li {
    position: relative;
    padding-left: 40px;
    margin-bottom: 10px;
}
ul.list_order li span {
    background-color: #038206;
    color: #fff;
    position: absolute;
    left: 0;
    top: 0;
    text-align: center;
    font-size: 18px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    line-height: 30px;
}
 ul.list_order {
    list-style: none;
}
.conn{

  color: #888;
}


</style>


<div class="jumbotron">
    <div id="carousel-home-banner" class="carousel slide fade in" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
          <div class="item active">
              <img alt="Places to visit in Japan" src="{{url('assets/image/refer_image.png')}}">
              <div class="carousel-caption">

                <h2>

                    Refer Friend
             </h2>

                <div class="meta" style="padding-left:2px;">
                  <span class="published-at">The Original Real Estate Cashback Network</span>

                </div>
              </div>
          </div>
      </div>
    </div>
  </div>

<div class="container" style="margin-bottom:100px;">
    <div class="row">






        <div class="col-md-7 " >
          <h3 class="text-success">Refer Friend</h3>

          <hr>
          <div class="body-project">

                    <div class="row">

                      <div class="col-md-12">
                        <form action="{{url('/contact_refer')}}" method="post" enctype="multipart/form-data" name="product">
                          <input type="hidden" name="_method" value="post">
                          {{ csrf_field() }}
                          <div class="row" style=" padding-right: 15px; ">

                            <div class="col-md-9 col-sm-6">
                            <div class="form-group{{ $errors->has('cashback') ? ' has-error' : '' }}">
                                <label>Please choose Renter/Buyer</label>
                                <select id="typePay" name="cashback" class="form-control " required="">
                                  @if (old('cashback') == 2)
                                        <option value="2" selected>Friend</option>
                                  @else

                                  @endif

                                    <option value="">-- Please choose Renter/Buyer --</option>
                                    <option value="1">Me</option>
                                    <option value="2">Friend</option>
                                </select>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>Please choose your type refer</strong>
                                    </span>
                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-6">

                                      </div>



                            <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label >Your Name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>Please enter your name</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label >Your Email <span class="text-danger">*</span></label>
                              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>Please enter your email address</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group">
                              <label >Your Phone Number <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                            </div>

                            <div class=" @if (old('cashback') == 2)

                            @else
                            hide
                            @endif typePay2" >
                              <hr>
                  						<div class="col-md-12 col-sm-6">
                  							<div class="form-group{{ $errors->has('name_contact') ? ' has-error' : '' }}">
                  								<label>Friend Name</label>
                  								<input type="text" class="form-control" id="name_contact" value="{{ old('name_contact') }}" name="name_contact" placeholder="Enter Name">
                                  @if ($errors->has('name_contact'))
                                      <span class="help-block">
                                          <strong>Please enter your Friend name address</strong>
                                      </span>
                                  @endif
                  							</div>
                  						</div>


                  						<div class="col-md-6 col-sm-6">
                  							<div class="form-group{{ $errors->has('email_contact') ? ' has-error' : '' }}">
                  								<label>Friend Email</label>
                  								<input type="email" id="email_contact" name="email_contact" value="{{ old('email_contact') }}" class="form-control" placeholder="Enter Email">
                                  @if ($errors->has('email_contact'))
                                      <span class="help-block">
                                          <strong>Please enter your Friend email address</strong>
                                      </span>
                                  @endif
                  							</div>
                  						</div>
                  						<div class="col-md-6 col-sm-6">
                  							<div class="form-group{{ $errors->has('phone_contact') ? ' has-error' : '' }}">
                  								<label>Friend Phone</label>
                  								<input type="text" id="phone_contact" name="phone_contact" value="{{ old('phone_contact') }}" class="form-control" placeholder="Enter Phone number">
                                  @if ($errors->has('phone_contact'))
                                      <span class="help-block">
                                          <strong>Please enter your Friend phone number address</strong>
                                      </span>
                                  @endif
                  							</div>
                  						</div>
                  					</div>


                            <div class="col-md-12">
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                              <div class="g-recaptcha" data-sitekey="6LeJ1yUUAAAAACtPVyLQ5AhlsaiXX-Lv_BvAyoHM"></div>
                              @if ($errors->has('g-recaptcha-response'))
                                  <span class="help-block">
                                      <strong>Robot?!</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                              <label >Your Question <span class="text-danger">*</span></label>
                              <textarea class="form-control" rows="6" placeholder="Please enter your question, your booking number (if you have it) and the name of the activity you're enquiring about..."
                              name="detail" required>{{ old('detail') }}</textarea>
                              @if ($errors->has('detail'))
                                  <span class="help-block">
                                      <strong>Please enter your question!</strong>
                                  </span>
                              @endif
                            </div>
                            </div>




                            <div class="col-md-12">
                            <button type="submit"  class="btn btn-success pull-right btn-lg">Submit</button>
                            </div>
                            </div>
                          </form>
                      </div>



                    </div>




          </div>




        </div>
        <div class="col-md-5" style="margin-top: 0px;">

          <h3 class="text-success">About Sirispace</h3>

          <hr>
          <p style="color: #666;"><b>Siri Space Co.,Ltd. <br>26/58 Orakarn Building, Chidlom Alley, Ploenchit Road, Lumpini, Phathumwan, Bangkok 10330</b></p>
          <p class="conn" style="line-height: 2em;"><strong style="color: #333;"><i class="fa fa-globe"></i> Website: </strong><a href="http://www.sirispace.com">www.sirispace.com</a><br>
            <strong style="color: #333;"><i class="fa fa-envelope-o"></i> Email:</strong> siri@sirispace.com<br>
            <strong style="color: #333;"><i class="fa fa-mobile"></i> Phone:</strong> 094-054-7728<br>
          </p>
          <h3 style="font-size: 18px;">SOCIAL</h3>
          <hr>
          <p class="conn" style="line-height: 2em;">
            <strong style="color: #333;"><i class="fa fa-facebook"></i> Facebook:</strong> <a target="_blank" href="https://www.facebook.com/sirispace/">sirispace</a><br>
            <strong style="color: #333;"><i class="fa fa-twitter"></i> Twitter:</strong> <a target="_blank" href="https://twitter.com/siri_space">siri_space</a><br>
          </p>
          <hr>
          <img src="{{url('assets/image/refer-a-friend.jpg')}}" class="img-responsive">
        </div>



    </div>
</div>

@stop

@section('scripts')
<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>

<script type="text/javascript">



$(document).ready(function() {
       $('select#typePay').change(function() {
            var tex = $('select#typePay').val();

            if (tex == "2") {
                $(".typePay2").fadeIn().removeClass("hide");

            }  else {
            $(".typePay2").fadeIn().addClass("hide");


        }
        });


    });


</script>
@stop('scripts')
