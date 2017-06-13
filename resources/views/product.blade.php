@extends('layouts.template')
@section('content')

<div id="position">
            <div class="container">
                        <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="category-18">{{$home->name_cat}}</a></li>
                        <li>{{$home->name_pro}}</li>
                        </ul>
            </div>
    </div>










<div class="content-section-a">
        <div class="container" >



          <div class="row">


        <div class="col-md-8 " >
          <h3 style="margin-top: 0px;">{{$home->name_pro}}</h3>


          <div class="table_style">
                              <div class="table_cell subtitle">
              	                <h2 class="t14 ">{{$home->address}}, {{$home->AMPHUR_NAME_ENG}}, Bangkok</h2>
                              </div>
              	            <div class="t14 table_cell other">
                                  <i class="fa fa-heart-o t_main j_collect t20" style="top:3px;position:relative;font-size:22px;" ></i>
                                  <span class="icon-label j_collect_txt">Wishlist</span>
                              </div>
                          </div>


          <hr>

          <div class="body-project">



<div class="row magnific-gallery">

<div class="col-md-6 col-sm-6" style="padding-right: 3px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[0]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[1]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="padding-right: 0px; padding-top:5px">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[2]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[2]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="padding-left: 6px; padding-right:6px; padding-top:5px; ">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[3]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[3]->image)}}" alt=""></a>
</div>


<div class="col-md-4 col-sm-4" style="padding-left: 0px; padding-top:5px">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[4]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[4]->image)}}" alt="">
  <div class="see-all-overlay"><span class="see-all-overlay-text">ดูทั้งหมด {{$home_image_count}} รูป</span></div></a>
</div>




<div class="hidden">{{$i = 0}}</div>
@foreach ($home_image_all as $image)
<div class="hidden">{{$i++}}</div>
@if($i > 5)

<div class="col-md-4 col-sm-4 hidden " style="padding-left: 0px; padding-top:5px">
<a class="example-image-link" href="{{url('assets/cusimage/'.$image->image)}}" >
</a>
</div>
@endif

@endforeach






</div>
<br>


<style>

</style>


<ul class="basic_info">

@if($home->Poll == 1)
<li> <i class="icon_set_2_icon-110"></i> <div class="t_v_mid_box icon-div"> <div class="t_v_mid"> <div class="t14" title="Show Mobile E-Voucher">Swimming pool</div> </div> </div> </li>
@endif

@if($home->Fitness == 1)
<li><i class="icon_set_2_icon-117" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid"><div class="t14" title="Join In Group Tour">Fitness Center</div></div></div></li>
@endif

@if($home->allowed == 1)
<li><i class="icon_set_1_icon-22" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid"><div class="t14" title="Minimum 6 Traveler(s)">Pet allowed</div></div></div></li>
@endif

@if($home->Accessibiliy == 1)
<li><i class="icon_set_1_icon-13" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid"><div class="t14" title="Minimum 6 Traveler(s)">Accessibiliy</div></div></div></li>
@endif

@if($home->Restaurant == 1)
<li><i class="icon_set_1_icon-58" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid"><div class="t14" title="Minimum 6 Traveler(s)">Restaurant</div></div></div></li>
@endif

@if($home->Wifi == 1)
<li><i class="icon_set_1_icon-86" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid"><div class="t14" title="Minimum 6 Traveler(s)">Wifi</div></div></div></li>
@endif

@if($home->Cable == 1)
<li><i class="icon_set_2_icon-116" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid"><div class="t14" title="Minimum 6 Traveler(s)">TV with cable</div></div></div></li>
@endif

</ul>


<div>
<h3>Description</h3>
  <div class="start-detail">

    {!! $home->detail !!}
    <p><strong></strong></p>
    <p><strong>Size :</strong> Land area {{$home->Size}} square</p>


    <style>
    ul.list_ok li:before {
    font-style: normal;
    font-weight: 700;
    font-family: "icon_set_1";
    font-size: 14px;
    content: "\6c";
    color: #e04f67;
    position: absolute;
    left: 0;
    top: 0;
}
ul.list_ok li {
    position: relative;
    padding-left: 25px;
}
ul.list_ok {
    list-style: none;
    margin: 0 0 20px;
    padding: 0;
    line-height: 22px;
}
    </style>


    <div class="row" style="    padding-left: 40px;">
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">

                                <li>Floors : 3</li>
                                <li>Bedrooms : 2</li>
                                <li>Bathrooms : 2</li>

                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                <li>Living Rooms : 1</li>
                                <li>Maid Rooms : 0</li>
                                <li>Parking Lots : 1</li>

                            </ul>
                        </div>
                    </div>


  </div>
  <hr>
  <h4>How To Get There</h4>
  <div class="start-detail">
      <div id="map" style="width:100%; border:0; height:316px;" frameborder="0">
      </div>

  </div>
  <hr>
  <h4>Terms & Conditions</h4>
  <div class="start-detail conditions">
    <ul class="conditions">
    <p align="left|right|center|justify">If you do not agree to these Terms, you should not use or access this Site. Sirispace reserves the right to revise these Terms at any time by updating this posting. You are encouraged to review these Terms each time you use the Site because your use of the Site after the posting of changes will constitute your acceptance of the changes. We grant you a personal, limited, non-transferable non-exclusive, license to access and use the Site. We reserve the right, in our sole discretion and without notice to you, to revise the products and services available on the Site and to change, suspend or discontinue any aspect of the Site and we will not be liable to you or to any third party for doing so.  </p>
      </ul>
  </div>
  <hr>
</div>


<style>

</style>

<div class="detail-footer">

  <div class="container">

  <div class="row">
    <div class="col-sm-3">
      <div class="rating-block">
        <h4>Average user rating</h4>
        <h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
      </div>
    </div>
    <div class="col-sm-3">
      <h4>Rating breakdown</h4>
      <div class="pull-left">
        <div class="pull-left" style="width:35px; line-height:1;">
          <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
        </div>
        <div class="pull-left" style="width:180px;">
          <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
            <span class="sr-only">80% Complete (danger)</span>
            </div>
          </div>
        </div>
        <div class="pull-right" style="margin-left:10px;">1</div>
      </div>
      <div class="pull-left">
        <div class="pull-left" style="width:35px; line-height:1;">
          <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
        </div>
        <div class="pull-left" style="width:180px;">
          <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
            <span class="sr-only">80% Complete (danger)</span>
            </div>
          </div>
        </div>
        <div class="pull-right" style="margin-left:10px;">1</div>
      </div>
      <div class="pull-left">
        <div class="pull-left" style="width:35px; line-height:1;">
          <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
        </div>
        <div class="pull-left" style="width:180px;">
          <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
            <span class="sr-only">80% Complete (danger)</span>
            </div>
          </div>
        </div>
        <div class="pull-right" style="margin-left:10px;">0</div>
      </div>
      <div class="pull-left">
        <div class="pull-left" style="width:35px; line-height:1;">
          <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
        </div>
        <div class="pull-left" style="width:180px;">
          <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
            <span class="sr-only">80% Complete (danger)</span>
            </div>
          </div>
        </div>
        <div class="pull-right" style="margin-left:10px;">0</div>
      </div>
      <div class="pull-left">
        <div class="pull-left" style="width:35px; line-height:1;">
          <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
        </div>
        <div class="pull-left" style="width:180px;">
          <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
            <span class="sr-only">80% Complete (danger)</span>
            </div>
          </div>
        </div>
        <div class="pull-right" style="margin-left:10px;">0</div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8">
      <hr/>
      <div class="review-block">
        <div class="row">
          <div class="col-sm-3">
            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
            <div class="review-block-name"><a href="#">nktailor</a></div>
            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
          </div>
          <div class="col-sm-9">
            <div class="review-block-rate">
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
            </div>
            <div class="review-block-title">this was nice in buy</div>
            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-sm-3">
            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
            <div class="review-block-name"><a href="#">nktailor</a></div>
            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
          </div>
          <div class="col-sm-9">
            <div class="review-block-rate">
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
            </div>
            <div class="review-block-title">this was nice in buy</div>
            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-sm-3">
            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
            <div class="review-block-name"><a href="#">nktailor</a></div>
            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
          </div>
          <div class="col-sm-9">
            <div class="review-block-rate">
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
            </div>
            <div class="review-block-title">this was nice in buy</div>
            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div> <!-- /container -->

</div>





          </div>




        </div>

        <div class="col-md-4 " >
          <div class="border_gray pay_info">
            <p style="color:#666">Price property ID <strong>{{$home->id_pro}} </strong></p>
            <h4 style=" color: #ff5722; font-weight: bold;"><i class="icon_set_1_icon-36" style="font-size:28px;"></i> THB {{ number_format($home->Price) }}</h4>
            <hr>
            <p>Siri Space is giving <strong style=" color: #ff5722;">cash back</strong>.</p>
            <button type="button" class="btn btn-success btn-block " style="border-radius: 2px;"><strong style="font-size:20px;">THB {{ number_format($home->Refer) }}</strong></button>
            <p style="color:#888; font-size:12px; margin-top:10px; margin-bottom:0px;"><i class="fa fa-info-circle"></i> Siri Space is offered a 20% cash back .</p>
            <p style="color:#888; font-size:12px;"><i class="fa fa-tag"></i> A rental in Bangkok (1 month commission).</p>
            <hr>

            <div class="descript" style="height: 20px;">
              <?php

              function format_number($number) {
                    if($number >= 1000) {
                       return $number/1000 . "k";   // NB: you will want to round this
                    }
                    else {
                        return $number;
                    }
                }

               ?>

                                    <span style="color: #777; font-size: 13px;"><i class="fa fa-user"></i> <?=format_number($home->view)?> review</span>
                                    <div class="descript-t">
                                    <div class="postMetaInline-authorLockup">

                                      @if($home->rating == 5)
                                      <div class="rating">
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <span style="color: #777; font-size: 13px;">{{$home->rating}}.0</span>
                                      </div>
                                      @endif
                                      @if($home->rating == 4)
                                      <div class="rating">
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star-o"></i>
                                          <span style="color: #777; font-size: 13px;">{{$home->rating}}.0</span>
                                      </div>
                                      @endif
                                      @if($home->rating == 3)
                                      <div class="rating">
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                          <span style="color: #777; font-size: 13px;">{{$home->rating}}.0</span>
                                      </div>
                                      @endif
                                      @if($home->rating == 2)
                                      <div class="rating">
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                          <span style="color: #777; font-size: 13px;">{{$home->rating}}.0</span>
                                      </div>
                                      @endif
                                      @if($home->rating == 1)
                                      <div class="rating">
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                          <span style="color: #777; font-size: 13px;">{{$home->rating}}.0</span>
                                      </div>
                                      @endif


                                    </div>
                                    </div>
                                  </div>

          </div>


          <div class="border_gray pay_info">
            <form action="{{url('/contact')}}" method="post" enctype="multipart/form-data" name="product">
            <h3 class="inner" style="margin-top: 10px;">24 Hours Confirmation</h3>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="position:relative">
                    <label>Name</label>
                    <input class="form-control " name="id" name="name" type="text" required="">
                    @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>ใส่ ชื่อ-นามสกุล ด้วยนะ</strong>
                                  </span>
                              @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="position:relative">
                    <label>Email</label>
                    <input class="form-control required" type="email" name="email" id="email_hotel_booking" required="">
                    @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>ใส่ อีเมล์ ด้วยนะ</strong>
                                  </span>
                              @endif
                </div>
                <div class="form-group" style="position:relative">
                    <label>Telephone</label>
                    <input class="form-control required" type="text" name="phone" id="phone_hotel_booking" required="">
                </div>
                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}" style="position:relative">
                    <label>Description</label>
                    <textarea class="form-control" name="detail" rows="4" id="textareaAutosize" data-plugin-textarea-autosize="" required=""></textarea>
                    @if ($errors->has('detail'))
                                <span class="help-block">
                                    <strong>ใส่ข้อความติดต่อด้วยนะ!</strong>
                                </span>
                            @endif
                </div>

                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                  

                              <div class="g-recaptcha" data-sitekey="6LdHOiUUAAAAAAobn_eaNZe6ieq_s1aE9fXK26_y" style="width:100%"></div>
                              @if ($errors->has('g-recaptcha-response'))
                                  <span class="help-block">
                                      <strong>คุณเป็นหุ่นยนต์หรือป่าวหล่ะ!</strong>
                                  </span>
                              @endif
                            </div>



          <button type="submit" class="btn btn-block btn-primary btn-sm">Send Enquiry</button>
          </form>
          </div>


          <div class="box_style_2">
            <i class="fa fa-user" aria-hidden="true"></i>
            <h4 style="margin-bottom: 0px;">Need <span style="color: #00c402;">Help?</span></h4>
            <a href="tel://0940547728" class="phone">0940547728</a>
            <small>Monday to Friday 9.00am - 7.30pm</small>
          </div>
        </div>




    </div>



        </div>
</div>



@stop

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>


<script language=javascript src='http://maps.google.com/maps/api/js?key=AIzaSyDawi5qne05jM6TOClvpuN673ChaNoMVxs&callback=initMap'></script>
<script>
function initialize(){
     var myLatlng = new google.maps.LatLng({{$home->lat}},{{$home->lng}});
     var myOptions = {
         zoom: 17,
         center: myLatlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
         }
      map = new google.maps.Map(document.getElementById("map"), myOptions);
      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
      title:"Fast marker"
     });
}

google.maps.event.addDomListener(window,'load', initialize);


</script>

<script>
$(document).ready(function() {
  $('.magnific-gallery').each(function() {
$(this).magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{enabled:true}
});
});
});
</script>

@stop('scripts')
