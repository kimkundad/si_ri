@extends('layouts.template')
@section('stylesheet')
<link href="{{url('assets/css/confirm.css')}}" rel="stylesheet" type="text/css" />
@stop('stylesheet')

@section('content')


<style>
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
i{
  color: #038206;
}
a {
    color: #5cb85c;
    text-decoration: none;
}
</style>


<div class="jumbotron">
    <div id="carousel-home-banner" class="carousel slide fade in" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
          <div class="item active">
              <img alt="Places to visit in Japan" src="{{url('assets/image/geometic-bg-green.png')}}">
              <div class="carousel-caption">

                <h2>

                    CONTACT US
             </h2>

                <div class="meta" style="padding-left:2px;">
                  <span class="published-at">Please reach out through our online chat or through email inquiry using below form. Service is available 24 hours 7 days a week</span>

                </div>
              </div>
          </div>
      </div>
    </div>
  </div>

<div class="container" style="margin-bottom:100px;">
    <div class="row">






        <div class="col-md-9 " >
          <h3 class="text-success">Ask Sirispace</h3>

          <hr>
          <div class="body-project">

                    <div class="row">

                      <div class="col-md-12">
                        <form action="{{url('/contact')}}" method="post" enctype="multipart/form-data" name="product">
                          <input type="hidden" name="_method" value="post">
                          {{ csrf_field() }}
                          <div class="row" style=" padding-right: 15px; ">

                            <div class="col-md-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label >Name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="name" required>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>Please enter your name</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label >Email <span class="text-danger">*</span></label>
                              <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>Please enter your email address</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                              <label >Phone Number <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="phone" required>
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
                              <textarea class="form-control" rows="6" placeholder="Please enter your question, your booking number (if you have it) and the name of the activity you're enquiring about..." name="detail" required></textarea>
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
        <div class="col-md-3" style="margin-top: 0px;">

          <h3 class="text-success">About Sirispace</h3>

          <hr>
          <p style="color: #888;"><b>Siri Space Co.,Ltd. <br>26/58 Orakarn Building, Chidlom Alley, Ploenchit Road, Lumpini, Phathumwan, Bangkok 10330</b></p>
          <p class="conn" style="line-height: 2em;"><strong><i class="fa fa-globe"></i> Website: </strong><a href="http://www.sirispace.com">www.sirispace.com</a><br>
            <strong><i class="fa fa-envelope-o"></i> Email:</strong> siri@sirispace.com<br>
            <strong><i class="fa fa-mobile"></i> Phone:</strong> 094-054-7728<br>
          </p>
          <h3 style="font-size: 18px;">SOCIAL</h3>
          <hr>
          <p class="conn" style="line-height: 2em;">
            <strong><i class="fa fa-facebook"></i> Facebook:</strong> <a target="_blank" href="https://www.facebook.com/sirispace/">sirispace</a><br>
            <strong><i class="fa fa-twitter"></i> Twitter:</strong> <a target="_blank" href="https://twitter.com/siri_space">siri_space</a><br>
          </p>
        </div>



    </div>
</div>

@stop

@section('scripts')
<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
@stop('scripts')
