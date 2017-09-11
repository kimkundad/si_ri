@extends('layouts.template')

@section('title')
{{$home->name_pro}}
@stop

@section('description')
{!! strip_tags(str_limit($home->detail, 150)) !!}
@stop

@section('ogtags')
    @include('layouts.og_tags', ['title' => $home->name_pro , 'description' => strip_tags(str_limit($home->detail, 150)),
    'image' => url('assets/cusimage/'.$home->image_pro) ])
@stop

@section('stylesheet')
<link href="{{url('assets/bootstrap-sweetalert-master/dist/sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/css-stars.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{url('assets/css/fontawesome-stars.css')}}">
@stop('stylesheet')
@section('content')

<div id="position">
            <div class="container">
                        <ul>
                        <li><a href="{{url('/')}}">Home </a></li>
                        <li><a href="{{url('property-2-'.$home->id_cat)}}">{{$home->name_cat}}</a></li>
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
                              <form id="cutproduct1">
                                <input type="hidden" id="product_id" class="form-control" name="id"   value="{{ $home->id_pro }}" >
                                  <a class="tooltip_flip tooltip-effect-1" id="submit" style="text-decoration:none;">
                                  <i class="fa fa-heart-o t_main j_collect t20" style="top:3px;position:relative;font-size:22px;" ></i>
                                  <span class="icon-label j_collect_txt">Wishlist</span>
                                  </a>
                                </form>
                              </div>
                          </div>


          <hr>

          <div class="body-project">

<!-- visible-sm visible-xs -->

<div class="row magnific-gallery hidden-sm hidden-xs">

  @if($home_image_count > 4)

<div class="col-md-6 col-sm-6" style="padding-right: 3px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[0]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[0]->image)}}" alt="" style="height: 279px;"></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[1]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[1]->image)}}" alt="" style="height: 279px;"></a>
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

@else

<div class="col-md-6 col-sm-6" style="padding-right: 3px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[0]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[1]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[1]->image)}}" alt=""></a>
</div>

@endif

<div class="hidden">{{$i = 0}}</div>
@foreach ($home_image_all as $images)
<div class="hidden">{{$i++}}</div>
@if($i > 5)

<div class="col-md-4 col-sm-4 hidden " style="padding-left: 0px; padding-top:5px">
<a class="example-image-link" href="{{url('assets/cusimage/'.$images->image)}}" >
</a>
</div>
@endif

@endforeach

</div>



<!-- visible-sm visible-xs -->
<style>

</style>
<div class="row magnific-gallery visible-sm visible-xs">

  @if($home_image_count > 4)

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[0]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[1]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[2]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[2]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[3]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[3]->image)}}" alt=""></a>
</div>


<div class="col-md-4 col-sm-4" style="margin-bottom: 8px;">
<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[4]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[4]->image)}}" alt="">
  <div class="see-all-overlay" style="width: 90%;"><span class="see-all-overlay-text">ดูทั้งหมด {{$home_image_count}} รูป</span></div></a>
</div>

@else

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[0]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/cusimage/'.$home_image[1]->image)}}" >
  <img class="img-responsive example-image" src="{{url('assets/cusimage/'.$home_image[1]->image)}}" alt=""></a>
</div>

@endif

<div class="hidden">{{$i = 0}}</div>
@foreach ($home_image_all as $images)
<div class="hidden">{{$i++}}</div>
@if($i > 5)

<div class="col-md-4 col-sm-4 hidden " >
<a class="example-image-link" href="{{url('assets/cusimage/'.$images->image)}}" >
</a>
</div>
@endif

@endforeach

</div>







<div class="border_gray pay_info visible-sm visible-xs" style="margin-bottom: 0px;">

  @if($home->Status == 1 && $home->For_Sale == 2)
  <h1 style="color: #ff1b1b; margin-top: 5px;"><i class="fa fa-frown-o"></i> Rented!</h1>
  @elseif($home->Status == 2 && $home->For_Sale == 1)
  <h1 style="color: #ff1b1b; margin-top: 5px;"><i class="fa fa-frown-o"></i> Sold!</h1>
  @else
  @endif

  <p style="color:#666">Price property ID <strong>{{$home->id_pro}} </strong></p>
  <h4 style=" color: #ff5722; font-weight: bold;"><i class="icon_set_1_icon-36" style="font-size:28px;"></i> THB {{ number_format($home->Price) }}</h4>
  <hr>
  <p>Siri Space is giving <strong style=" color: #ff5722;">cash back</strong>.</p>
  <button type="button" class="btn btn-success btn-block " style="border-radius: 2px;"><strong style="font-size:20px;">THB {{ number_format($home->Refer) }}</strong></button>
  <p style="color:#888; font-size:12px; margin-top:10px; margin-bottom:0px;">
    <i class="fa fa-info-circle"></i> Siri Space is giving the customer back 20% of the commission.</p>
  <p style="color:#888; font-size:12px;"><i class="fa fa-tag"></i> For 1 year lease</p>
  <hr>

  <div class="descript" style="height: 20px;">


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









<br>






<h3 class="visible-sm visible-xs">Facility</h3>

<div class="hidden-sm hidden-xs">
<ul class="basic_info" style="list-style:none;">
@if($home->Poll == 1)
<li> <i class="icon_set_2_icon-110"></i> <div class="t_v_mid_box icon-div"> <div class="t_v_mid"> <div class="t14 hidden-sm hidden-xs" title="Show Mobile E-Voucher">Swimming pool</div> </div> </div> </li>
@endif

@if($home->Fitness == 1)
<li><i class="icon_set_2_icon-117" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid hidden-sm hidden-xs"><div class="t14" title="Join In Group Tour">Fitness Center</div></div></div></li>
@endif

@if($home->allowed == 1)
<li><i class="icon_set_1_icon-22" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid hidden-sm hidden-xs"><div class="t14" title="Minimum 6 Traveler(s)">Pet allowed</div></div></div></li>
@endif

@if($home->Accessibiliy == 1)
<li><i class="icon_set_1_icon-13" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid hidden-sm hidden-xs"><div class="t14" title="Minimum 6 Traveler(s)">Accessibiliy</div></div></div></li>
@endif

@if($home->Restaurant == 1)
<li><i class="icon_set_1_icon-58" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid hidden-sm hidden-xs"><div class="t14" title="Minimum 6 Traveler(s)">Restaurant</div></div></div></li>
@endif

@if($home->Wifi == 1)
<li><i class="icon_set_1_icon-86" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid hidden-sm hidden-xs"><div class="t14" title="Minimum 6 Traveler(s)">Wifi</div></div></div></li>
@endif

@if($home->Cable == 1)
<li><i class="icon_set_2_icon-116" style="font-size:26px;"></i><div class="t_v_mid_box icon-div"><div class="t_v_mid hidden-sm hidden-xs"><div class="t14" title="Minimum 6 Traveler(s)">TV with cable</div></div></div></li>
@endif

</ul>
</div>



<div class="visible-sm visible-xs">

@if($home->Poll == 1)
 <div class="col-md-3"> <div class="t_v_mid_box icon-div"> <div class="t_v_mid"> <div class="t14 " title="Show Mobile E-Voucher"><i class="icon_set_2_icon-110" style="font-size:26px;"></i> Swimming pool</div> </div> </div> </div>
@endif

@if($home->Fitness == 1)
<div class="col-md-3"><div class="t_v_mid_box icon-div"><div class="t_v_mid "><div class="t14" title="Join In Group Tour"><i class="icon_set_2_icon-117" style="font-size:26px;"></i> Fitness Center</div></div></div></div>
@endif

@if($home->allowed == 1)
<div class="col-md-3"><div class="t_v_mid_box icon-div"><div class="t_v_mid "><div class="t14" title="Minimum 6 Traveler(s)"><i class="icon_set_1_icon-22" style="font-size:26px;"></i> Pet allowed</div></div></div></div>
@endif

@if($home->Accessibiliy == 1)
<div class="col-md-3"><div class="t_v_mid_box icon-div"><div class="t_v_mid "><div class="t14" title="Minimum 6 Traveler(s)"><i class="icon_set_1_icon-13" style="font-size:26px;"></i> Accessibiliy</div></div></div></div>
@endif

@if($home->Restaurant == 1)
<div class="col-md-3"><div class="t_v_mid_box icon-div"><div class="t_v_mid "><div class="t14" title="Minimum 6 Traveler(s)"><i class="icon_set_1_icon-58" style="font-size:26px;"></i> Restaurant</div></div></div></div>
@endif

@if($home->Wifi == 1)
<div class="col-md-3"><div class="t_v_mid_box icon-div"><div class="t_v_mid "><div class="t14" title="Minimum 6 Traveler(s)"><i class="icon_set_1_icon-86" style="font-size:26px;"></i> Wifi</div></div></div></div>
@endif

@if($home->Cable == 1)
<div class="col-md-3"><div class="t_v_mid_box icon-div"><div class="t_v_mid "><div class="t14" title="Minimum 6 Traveler(s)"><i class="icon_set_2_icon-116" style="font-size:26px;"></i> TV with cable</div></div></div></div>
@endif


</div>


<div>
<h3>Description</h3>
  <div class="start-detail">

    {!! $home->detail !!}
    <hr>
    <p>
      @if($home->Size == 0)
      <strong>Size :</strong> Land area {{$home->Square_Wah}} Square Wah</p>
      @else
      <strong>Size :</strong> Land area {{$home->Size}} square</p>
      @endif

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

                                <li>Floors : {{$home->Floors}}</li>
                                <li>Bedrooms : {{$home->Bedrooms}}</li>
                                <li>Bathrooms : {{$home->Bathrooms}}</li>

                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                <li>Living Rooms : {{$home->Living}}</li>
                                <li>Maid Rooms : {{$home->Maid}}</li>
                                <li>Parking Lots : {{$home->Parking}}</li>

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
  <h4 class="hidden-sm hidden-xs">Terms & Conditions</h4>
  <div class="start-detail conditions hidden-sm hidden-xs">
    <ul class="conditions">
    <p align="left|right|center|justify">If you do not agree to these Terms, you should not use or access this Site. Sirispace reserves the right to revise these Terms at any time by updating this posting. You are encouraged to review these Terms each time you use the Site because your use of the Site after the posting of changes will constitute your acceptance of the changes. We grant you a personal, limited, non-transferable non-exclusive, license to access and use the Site. We reserve the right, in our sole discretion and without notice to you, to revise the products and services available on the Site and to change, suspend or discontinue any aspect of the Site and we will not be liable to you or to any third party for doing so.  </p>
      </ul>
  </div>
  <hr>
</div>

<style>
.detail-footer h3 {
    font-size: 22px;
    margin-top: 5px;
}
#score_detail {
    font-size: 14px;
    margin-bottom: 15px;
}
#score_detail span {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    display: inline-block;
    width: 45px;
    height: 45px;
    border: 2px solid #555;
    line-height: 42px;
    font-size: 14px;
    font-weight: 700;
    color: #555;
    margin-right: 5px;
    text-align: center;
}
#score_detail small {
    color: #999;
}
small, .small {
    font-size: 85%;
}
.review_strip_single {
    position: relative;
    padding: 30px 0 20px;
    margin: 30px 0 25px;
    border-bottom: 1px solid #ddd;
}
.review_strip_single img {
    top: -15px;
    position: absolute;
    left: 0;
    border: 4px solid #fff;
}
.review_strip_single small {
    float: right;
    font-size: 12px;
    margin-top: -10px;
    font-style: italic;
}
#single_tour_desc h4 {
    line-height: 20px;
    font-size: 18px;
}
.review_strip_single h4 {
    font-size: 18px;
    margin: -12px 0 35px 90px;
    padding: 0;
}
.ap-avatar {
    margin-right: 10px;
}
.ap-pull-left {
    float: left !important;
}
.br-theme-fontawesome-stars .br-widget a.br-selected:after {
    color: #F90;
}
.text-muted {
    color: #777;
}
</style>


<div class="detail-footer">



  <div class="row" style="margin-left: 0px;">

    <div class="col-md-2">
                    <h3>Reviews</h3>
                </div>

                <div class="col-md-10" style="    padding-left: 0px;">

                  <div class="row">

                    <div class="col-md-6" id="score_detail" style="margin-bottom: 3px;"><span>{{$home->rating}}.0</span>


                      <small>(Based on
                        @if(isset($comment_count))
                        {{$comment_count}} reviews)
                        @endif
                      </small></div><!-- End general_rating -->


                   <div class="col-md-6" id="rating_summary" >
                     <div class="rating" style="font-size: 24px; margin-top: 8px;    float: right;">

                     @if($home->rating == 5)

                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>

                     @endif
                     @if($home->rating == 4)

                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star-o"></i>

                     @endif
                     @if($home->rating == 3)

                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-o"></i>

                     @endif
                     @if($home->rating == 2)

                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-o"></i>

                     @endif
                     @if($home->rating == 1)

                         <i class="fa fa-star voted"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-o"></i>

                     @endif
                      </div>

                   </div><!-- End row -->


                  </div>
<hr>


@if (Auth::guest())
<div style="margin-top:20px;background: #fff none repeat scroll 0 0; border: 1px solid #eee; padding: 15px 15px 5px 15px;">
    <p><i class="fa fa-lock"></i> โปรดทำการ <a href="{{url('login')}}">เข้าสู่ระบบ</a> หรือ <a href="{{url('register')}}">สมัครสมาชิก</a> เพื่อแสดงความคิดเห็น</p>
</div>
<hr>
@else


<div style="margin-top:40px;background: #fff none repeat scroll 0 0; border: 1px solid #eee; padding: 15px;">
                              <div class="clearfix">
                                <div class="ap-avatar ap-pull-left">
                                  <a href="user_profile-2.html" title="">
                                  <!-- TODO: OPTION - Avatar size -->
        @if(Auth::user()->provider == 'email')
        <img style="max-height:50px;" class="img-circle avatar avatar-30 photo ap-dynamic-avatar" src="{{url('assets/image/avatar/'.Auth::user()->avatar)}}"></a>
        @else
        <img style="max-height:50px;" class="img-circle avatar avatar-30 photo ap-dynamic-avatar" src="//{{Auth::user()->avatar}}"></a>
        @endif


                                </div><!-- close .ap-avatar -->


                                <form method="post" action="{{url('/comment')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_method" value="post">
                                  <input type="hidden" name="product_id" class="form-control" value="{{$home->id_pro}}">
                                  {{ csrf_field() }}
                                <div class="ap-comment-content no-overflow">
                                  <div class="ap-comment-header">
                                    <a  class="ap-comment-author"> {{ Auth::user()->name }} </a>

                                   </div><!-- close .ap-comment-header -->
                                  <div class="ap-comment-texts">
                                    <textarea class="form-control" name="comment" rows="3" style="width: 89%; margin-top:5px;" required></textarea>
                                  </div>
                                  <div class="col-sm-12" style="margin-top:10px; padding-right: 0px;">
                                    <div class="col-sm-1">
                                    </div>
                                  <div class="col-sm-5">
                                    <select id="example" name="ratting" required>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6" style="padding-right: 0px;"><button type="submit" class="btn btn-primary pull-right">แสดงความคิดเห็น</button></div>
                                  </div>
                                            </div><!-- close .ap-comment-content -->
                                            </form>
                              </div><!-- close #comment-* -->
                            </div>

@endif









<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
 ?>





<ul id="myList" style="list-style-type:none; -webkit-padding-start: 1px;">

                @if(isset($comment_course))

                  @foreach($comment_course as $cm)
                  <li style="display: list-item;">
                    <div class="review_strip_single" id="comment-{{$cm->c_id}}">

                        @if($cm->provider == 'facebook')
                        <img src="//{{$cm->avatar}}" alt="{{$cm->name}}" style="width:76px; border: 1px solid #E4E1E1;" class="img-circle">
                        @else
                        <img src="{{url('assets/image/avatar/'.$cm->avatar)}}" alt="{{$cm->name}}" style="width:76px; border: 1px solid #E4E1E1;" class="img-circle">
                        @endif


                        <small> - <?php echo DateThai($cm->created_att); ?> -</small>
                        <h4>{{$cm->name}}</h4>
                        <p>
                             "{{$cm->comment}}"
                        </p>



                        <div class="rating">
                        @if($cm->ratting == 5)

                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <span style="color: #777; font-size: 13px;">{{$cm->ratting}}.0</span>

                        @endif
                        @if($cm->ratting == 4)

                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star-o"></i>
                            <span style="color: #777; font-size: 13px;">{{$cm->ratting}}.0</span>


                        @endif
                        @if($cm->ratting == 3)

                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <span style="color: #777; font-size: 13px;">{{$cm->ratting}}.0</span>

                        @endif
                        @if($cm->ratting == 2)

                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <span style="color: #777; font-size: 13px;">{{$cm->ratting}}.0</span>

                        @endif
                        @if($cm->ratting == 1)

                            <i class="fa fa-star voted"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <span style="color: #777; font-size: 13px;">{{$cm->ratting}}.0</span>

                        @endif

                        @if(isset(Auth::user()->id))
                        @if($cm->u_id == Auth::user()->id)
                        <div class="pull-right">
                                                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                           <i class="fa fa-cog"></i>
                                                         </a>
                                                         <ul class="dropdown-menu" style="top: inherit !important; min-width: 100px;" role="menu" aria-labelledby="dLabel">
                                                          <li><a href="#" data-toggle="modal" data-target="#editer-{{$cm->c_id}}"><i class="fa fa-wrench"></i>  แก้ไข</a></li>
                                                          <li><a href="#" data-toggle="modal" data-target="#myModal-{{$cm->c_id}}"><i class="fa fa-trash-o"></i> ลบทิ้ง</a></li>
                                                         </ul>
                                                         </div>

                                                         <div class="modal fade" id="editer-{{$cm->c_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog " role="document">
                                                              <div class="modal-content">

                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                  </button> <h4 class="modal-title" style="margin:auto" id="myModalLabel">ทำการแก้ไข ?</h4>
                                                                </div>
                                                                <form method="post" action="{{url('comment/'.$cm->c_id)}}" enctype="multipart/form-data">
                                                                <div class="panel-body">
                                                                                  <div id="showalert2"></div>
                                                                                  <div class="modal-wrapper">


                                                                                    <div class="modal-text">
                                                                                      <input type="hidden" name="_method" value="put">
                                                                                      <input type="hidden" name="product_id" class="form-control" value="{{$home->id_pro}}">
                                                                                      {{ csrf_field() }}
                                                                                      <div class="form-group" style="margin-bottom: 1px;">

                                                                                        <textarea class="form-control" name="comment" rows="3">{{$cm->comment}}</textarea>
                                                                                      </div>



                                                                                    </div>
                                                                                  </div>
                                                                                </div>

                                                                                <footer class="panel-footer" style="margin-top: 0px;">
                                                                                  <div class="row">
                                                                                    <div class="col-md-12 text-right">


                                                                                      <button type="submit" class="btn btn-primary ">แก้ไข</button>
                                                                                      <button class="btn btn-default modal-dismiss" data-dismiss="modal" aria-label="Close">ยกเลิก</button>


                                                                                    </div>

                                                                                  </div>
                                                                                </footer>

                                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>






                                                         <div class="modal fade bs-example-modal-sm" id="myModal-{{$cm->c_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                           <div class="modal-dialog modal-sm" role="document">
                                                             <div class="modal-content">

                                                               <div class="modal-header">
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                   <span aria-hidden="true">×</span>
                                                                 </button> <h4 class="modal-title" style="margin:auto" id="myModalLabel">ต้องการลบ ?</h4>
                                                               </div>

                                                               <div class="panel-body">
                                                                                 <div id="showalert2"></div>
                                                                                 <div class="modal-wrapper">

                                                                                   <div class="modal-text">
                                                                                     <h4 style="margin:auto">ต้องการลบความคิดเห็นนี้ ใช่ไหม ?</h4>
                                                                                   </div>
                                                                                 </div>
                                                                               </div>

                                                                               <footer class="panel-footer" style="margin-top: 10px;">
                                                                                 <div class="row">
                                                                                   <div class="col-md-12 text-right">
                                                                                     <form method="post" action="{{url('comment/'.$cm->c_id)}}" enctype="multipart/form-data">

                                                                                      <input type="hidden" name="_method" value="DELETE">
                                                                                      {{ csrf_field() }}

                                                                                     <button type="submit" class="btn btn-primary ">ลบ</button>
                                                                                     <button class="btn btn-default modal-dismiss" data-dismiss="modal" aria-label="Close">ยกเลิก</button>

                                                                                   </form>
                                                                                   </div>
                                                                                 </div>
                                                                               </footer>


                                                             </div>
                                                           </div>
                                                         </div>



                        @endif
                        @endif
                        </div>




                    </div><!-- End review strip -->
                </li>
                  @endforeach
                @endif

</ul>
  {{ $comment_course->links() }}
  </div>



  </div>
</div><!-- end detail-footer -->





          </div>




        </div>

        <div class="col-md-4 " >
          <div class="border_gray pay_info">

            @if($home->Status == 1 && $home->For_Sale == 2)
            <h1 style="color: #ff1b1b; margin-top: 5px;"><i class="fa fa-frown-o"></i> Rented!</h1>
            @elseif($home->Status == 2 && $home->For_Sale == 1)
            <h1 style="color: #ff1b1b; margin-top: 5px;"><i class="fa fa-frown-o"></i> Sold!</h1>
            @else
            @endif

            <p style="color:#666">Price property ID <strong>{{$home->id_pro}} </strong></p>
            <h4 style=" color: #ff5722; font-weight: bold;"><i class="icon_set_1_icon-36" style="font-size:28px;"></i> THB {{ number_format($home->Price) }}</h4>
            <hr>
            <p>Siri Space is giving <strong style=" color: #ff5722;">cash back</strong>.</p>
            <button type="button" class="btn btn-success btn-block " style="border-radius: 2px;"><strong style="font-size:20px;">THB {{ number_format($home->Refer) }}</strong></button>
            <p style="color:#888; font-size:12px; margin-top:10px; margin-bottom:0px;">
              <i class="fa fa-info-circle"></i> Siri Space is giving the customer back 20% of the commission.</p>
            <p style="color:#888; font-size:12px;"><i class="fa fa-tag"></i> For 1 year lease</p>
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
            <form action="{{url('/contact_2')}}" method="post" enctype="multipart/form-data" name="product">
              {{ csrf_field() }}
            <h3 class="inner" style="margin-top: 10px;">Make an Enquiry</h3>

            <input class="form-control "  name="id_product" value="{{$home->id_pro}}" type="hidden" >
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-group-sm" style="position:relative">
                    <label>Name</label>
                    <input class="form-control "  name="name" value="{{ old('name') }}" type="text" required="">
                    @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>ใส่ ชื่อ-นามสกุล ด้วยนะ</strong>
                                  </span>
                              @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-group-sm" style="position:relative">
                    <label>Email</label>
                    <input class="form-control required" type="email" placeholder="Enter email address" name="email" id="email_hotel_booking" required="">
                    @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>ใส่ อีเมล์ ด้วยนะ</strong>
                                  </span>
                              @endif
                </div>
                <div class="form-group form-group-sm" style="position:relative">
                    <label>Telephone</label>
                    <input class="form-control required" type="text" placeholder="Enter phone number" name="phone" id="phone_hotel_booking" required="">
                </div>
                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}" style="position:relative">
                    <label>Description</label>
                    <textarea class="form-control" name="detail" rows="4" placeholder="Please enter your question" id="textareaAutosize" data-plugin-textarea-autosize="" required=""></textarea>
                    @if ($errors->has('detail'))
                                <span class="help-block">
                                    <strong>ใส่ข้อความติดต่อด้วยนะ!</strong>
                                </span>
                            @endif
                </div>

                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">


                            <!--  <div class="g-recaptcha" data-sitekey="6LdHOiUUAAAAAAobn_eaNZe6ieq_s1aE9fXK26_y" style="width:100%"></div> -->

                            <div class="g-recaptcha" data-sitekey="6LdHOiUUAAAAAAobn_eaNZe6ieq_s1aE9fXK26_y"></div>
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
            <i class="icon_set_1_icon-57" aria-hidden="true"></i>
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
<script src="{{url('assets/js/markerclusterer.js')}}"></script>
<script>
    function initialize() {
        var center = new google.maps.LatLng(51.5074, 0.1278);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.5074, 0.1278)
        });
        markers.push(marker);

        var options = {
            imagePath: 'images/m'
        };

        var markerCluster = new MarkerClusterer(map, markers, options);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
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


<script src="{{url('assets/js/jquery.barrating.js')}}"></script>
<script type="text/javascript">
   $(function() {
      $('#example').barrating({
        theme: 'fontawesome-stars'
      });

   });
</script>


<script src="{{url('assets/bootstrap-sweetalert-master/dist/sweetalert.js')}}"></script>

@if ($message = Session::get('success_contact'))
<script>
    swal("ส่งข้อความสำเร็จ!", "ทางเจ้าหน้าที่จะรบติดต่อกลับให้เร็วที่สุด!", "success")
  </script>
@endif

@if ($message = Session::get('success_comment'))
<script>
    swal("ส่งข้อความสำเร็จ!", "ขอบคุณที่ร่วมแสดงความความคิดเห็น!", "success")
  </script>
@endif

@if ($message = Session::get('success_comment_edit'))
<script>
    swal("แก้ไขข้อความสำเร็จ!", "ขอบคุณที่ร่วมแสดงความความคิดเห็น!", "success")
  </script>
@endif


@if ($message = Session::get('delete'))
<script>
    swal("ลบข้อความสำเร็จ!", "ขอบคุณที่ร่วมแสดงความความคิดเห็น!", "success")
  </script>
@endif


<script>
$(document).ready(function(){



$('.tooltip_flip.tooltip-effect-1').click(function(e){
  e.preventDefault();


  var $form = $(this).closest("form#cutproduct1");
            var formData =  $form.serializeArray();


            var dataString = {
                   product_id : $form.find("#product_id").val(),
                   _token : '{{ csrf_token() }}'
                 };



    $.ajax({
        type: "POST",
        url: "{{url('wishlist')}}",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){

          if(data.success == true){




          swal("ส่งข้อความสำเร็จ!", "เพิ่มสิ่งที่ชื่นชอบเพิ่อกลับมาดูภายหลังได้!", "success");



          } else if(data.success == false){

            swal("เสียใจด้วย!", "เข้าสู่ระบบหรือสมัครสมาชิกก่อนนะ", "error");

            var delayMillis = 4000;

        setTimeout(function() {
          window.open('{{url('login')}}', '_blank');
        }, delayMillis);



        var delayMilli = 6000;

          setTimeout(function() {
            window.location.reload();
          }, delayMilli);



          }



        } ,error: function(xhr, status, error) {
          alert(error);
        },

    });

});

});
</script>



@stop('scripts')
