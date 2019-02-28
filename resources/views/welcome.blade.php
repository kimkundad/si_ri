@extends('layouts.template')

@section('title')
The Original Real Estate CASHBACK Network | Siri Space
@stop

@section('description')
SIRISPACE.com is a real estate company located in Bangkok, Thailand that helps connect property hunters with the most current database of commercial and residential properties for sale and rent, with property news and all the resources a buyer
@stop

@section('ogtags')
    @include('layouts.og_tags', ['title' => 'The Original Real Estate CASHBACK Network | Siri Space', 'description' => 'SIRISPACE.com is a real estate company located in Bangkok,
    Thailand that helps connect property hunters with the most current database of commercial and residential properties for sale and rent, with property news and all the resources a buyer',
    'image' => url('assets/image/sirispace_facebook.png')])
@stop

@section('content')
<style>
.list_menu_y {
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url(assets/image/arrow_black_bottom.png) no-repeat right;
    background-size: 12px 6px;
    width: 150px;
    border: none !important;
    font-family: "Tahoma", "Geneva", "sans-serif";
    font-size: 14px;
    color: #555555;
    font-weight: normal;
    line-height: 1.2em;
    outline: none !important;
    padding: 5px;
}
.list_menu_y select:hover{
  border: none;
}
.bs-example {
    margin-right: 0;
    margin-left: 0;

    border-color: #ddd;
    border-width: 1px;
    border-radius: 4px 4px 0 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}
@media (max-width: 767px){

  .promo_full_wp>div {
      display: table-cell;
      padding: 0% 0%;
      vertical-align: middle;
      text-align: center;
      color: #fff;
      font-size: 16px;
  }
  .form-group {
    margin-bottom: 8px;
}
.logo-style{
  margin-top: 10px;
    margin-bottom: 10px;
}

}







.tt-hint {
	color: #999999;
}
.tt-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 15px;  /* Set suggestion dropdown font size */
	padding: 2px 15px;
}
.tt-suggestion:hover {
	cursor: pointer;
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}






.homepage-hero-module {
    border-right: none;
    border-left: none;
    position: relative;
}
.no-video .video-container video,
.touch .video-container video {
    display: none;
}
.no-video .video-container .poster,
.touch .video-container .poster {
    display: block !important;
}
.video-container {
    position: relative;
    bottom: 0%;
    left: 0%;
    height: 100%;
    width: 100%;
    overflow: hidden;
    background: #000;
}
.video-container .poster img {
    width: 100%;
    bottom: 0;
    position: absolute;
}
.video-container .filter {
    z-index: 100;
    position: absolute;
    background: rgba(0, 0, 0, 0.4);
    width: 100%;
}
.video-container video {
    position: absolute;
    z-index: 0;
    bottom: 0;
}
.video-container video.fillWidth {
    width: 100%;
}
.text-white {
    color: #fff ;
}
.affix {
    margin: 80px 10px;
    z-index: 1020;
}
.affix-top {
    position: absolute;
    top: 35%;
    left: 10px;
    z-index: 1020;
}
.share-button-banner {
    display: table;
    text-align: center;
    border: 2px solid #fff;
    width: 35px;
    height: 35px;
    border-radius: 100%;
    margin-bottom: 20px;
    text-decoration: none;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
}
.share-button-banner .share-container {
  padding-top: 4px;
    display: table-cell;
}
.share-container .share-content {

    vertical-align: middle;
}
.affix .share-button-banner {
    color: #999;
    border-color: #999;
}
.video-container .title-container {
    z-index: 1000;
    position: absolute;
    top: 35%;
    width: 100%;
    text-align: center;
    color: #fff;
}
/*  */
</style>




<div class="homepage-hero-module hidden-sm hidden-xs">
    <div class="video-container">

      <div class="share-buttons-group affix-top" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
            <a href="https://twitter.com/siri_space" target="_blank" class="btn-track" data-event="TwitterShare_Click">
                <div id="twitter-button" class="share-button-banner">
                    <div class="share-container">
                        <i class="fa fa-twitter share-content"></i>
                    </div>
                </div>
            </a>

            <a href="https://www.facebook.com/sirispace/" target="_blank" class="btn-track" data-event="FacebookShare_Click">
                <div id="facebook-button" class="share-button-banner">
                    <div class="share-container">
                        <i class="fa fa-facebook share-content"></i>
                    </div>
                </div>
            </a>

            <a href="#" target="_blank" class="btn-track" data-event="GoogleShare_Click">
                <div id="google-button" class="share-button-banner">
                    <div class="share-container">
                        <i class="fa fa-google-plus share-content"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="title-container">
            <div class="headline">
                <!--Original logo height 80px-->
                <!-- <img src="" height="80" alt=""> -->
                <img src="{{url('assets/image/SiriSpace-Logo-cover.png')}}" height="80" alt="">
                <h3 class="text-white text-thin" style="font-size:35px;">Let Siri Space Be Your personal assistant</h3>
                <h5 class="text-white text-thin" style="font-size:20px;">REFER YOUR FRIEND -
                  <a class="coverr-nav-item btn-track" href="" data-event="MondayScroll_Click"
                  style="text-decoration: none; border-bottom: 1px dotted #fff; color: #fff;">GET REFER BONUS</a></h5>
            </div>

            <div class="text-center" id="loadBannerVideoSpinner" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 4px; display: none; margin-top: 20px;">
                <h5 class="text-thin text-primary">Loading Coverr... <i class="fa fa-circle-o-notch fa-spin"></i></h5>
            </div>
        </div>

        <div class="filter"></div>

      <!--  <video autoplay loop muted playsinline id="video" class="fillWidth"></video>
          <div class="poster">
            <img src="{{url('assets/In-And-Out/Snapshots/main-search-video-poster.jpg')}}" alt="home video">
          </div> -->

    <!--    <video class="fillWidth"  poster="{{url('assets/In-And-Out/Snapshots/main-search-video-poster.jpg')}}" loop autoplay muted>
    			<source src="{{url('assets/In-And-Out/MP4/main-search-video.mp4')}}" type="video/mp4">
    		</video> -->



    </div>
    <div style="position: absolute; bottom: 50px; left: 50%; margin-left: -19px;">
            <a class="coverr-nav-item" href="#RECOMMEND" style="text-decoration: none;">
                <div class='icon-scroll'></div>
            </a>
        </div>
</div>

</div>




<div class="content-section-b visible-sm visible-xs" style="padding: 20px 0 0px;">
  <div class="container">
    <h4 class="text-center">Siri Space Property Search</h4>
    <div class="bs-example">
      <form action="{{url('/search')}}" method="GET" enctype="multipart/form-data" name="product2">
        <div class="form-group">

          <input type="text" class=" form-control input-lg"  style="font-size: 14px; " name="ark" placeholder="Enter Area, BTS MRT station or Property Name..."> </div>

        <div class="form-group">
        <select name="type_ark" class="form-control input-lg" style="font-size: 14px;">
            <option value="2">Rent</option>
            <option value="1">Sale</option>
        </select>
        </div>

        <div class="form-group">
          <select name="type_home" class="form-control input-lg" style="font-size: 14px;">
              <option value="">Residential</option>
                  @foreach($category as $u_cat)
              <option value="{{$u_cat->id}}">{{$u_cat->name}}</option>
                  @endforeach
          </select>
        </div>

        <div class="form-group center-block">
          <button type="button" id='button_open_res' class="btn btn-danger btn-sm center-block" style="background: #e04f67;">More Option <i class="fa fa-plus"></i></button>
        </div>



        <div id="newpost_res" style="display: none;">





                              <div class="form-group" >
                                  <select name="min_price" class="form-control">
                                      <option value="" selected="">No Min Price</option>
                                      <option value="0">฿0</option>
                                      <option value="10000">฿10,000</option>
                                      <option value="20000">฿20,000</option>
                                      <option value="30000">฿30,000</option>
                                      <option value="40000">฿40,000</option>
                                      <option value="50000">฿50,000</option>
                                      <option value="60000">฿60,000</option>
                                      <option value="70000">฿70,000</option>
                                      <option value="80000">฿80,000</option>
                                      <option value="90000">฿90,000</option>
                                      <option value="100000">฿100,000</option>
                                  </select>
                              </div>


                              <div class="form-group" >
                                  <select name="max_price" class="form-control">
                                      <option value="">No Max Price</option>
                                      <option value="10000">฿10,000</option>
                                      <option value="20000">฿20,000</option>
                                      <option value="30000">฿30,000</option>
                                      <option value="40000">฿40,000</option>
                                      <option value="50000">฿50,000</option>
                                      <option value="60000">฿60,000</option>
                                      <option value="70000">฿70,000</option>
                                      <option value="80000">฿80,000</option>
                                      <option value="90000">฿90,000</option>
                                      <option value="100000">฿100,000</option>
                                      <option value="100000000">MAX</option>
                                  </select>
                              </div>


                              <div class="form-group" >
                                  <select name="Bedrooms" class="form-control" data-placeholder="All">
                                      <option value="">Bedrooms</option>
                                      <option value="1">1 Bedrooms</option>
                                      <option value="2">2 Bedrooms</option>
                                      <option value="3">3 Bedrooms</option>
                                      <option value="4">4 Bedrooms</option>
                                      <option value="5">5 Bedrooms</option>
                                      <option value="6">6 Bedrooms</option>
                                      <option value="7">7 Bedrooms</option>
                                  </select>
                              </div>


                              <div class="form-group" >
                                  <select name="Bathroom" class="form-control" data-placeholder="All">
                                      <option value="">Bathroom</option>
                                      <option value="1">1 Bathroom</option>
                                      <option value="2">2 Bathroom</option>
                                      <option value="3">3 Bathroom</option>
                                      <option value="4">4 Bathroom</option>
                                      <option value="5">5 Bathroom</option>
                                      <option value="6">6 Bathroom</option>
                                      <option value="7">7 Bathroom</option>
                                  </select>
                              </div>



        </div>

<br>



        <input class="btn btn-default btn-block btn-lg" style="background: #51bce6; color:#fff" type="submit" value="Search">
      </form>
    </div>
  </div>
</div>













                <div class="container-fluid hidden-sm hidden-xs" style=" bottom: 60px; background: rgba(255, 255, 255, 0); position: relative;">
                    <div class="col-sm-2"></div>
                    <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                      <form action="{{url('/search')}}" method="GET" enctype="multipart/form-data" name="product">
                        {{ csrf_field() }}
                  <div class="row">
                    <input autocomplete="off" spellcheck="false" class="flipkart-navbar-input typeahead col-xs-6" type="text" style="height:43px" placeholder="Enter Area, BTS KRT station or Property Name..." name="ark">

                    <div class="col-xs-2 col-lg-2 hidden-xs hidden-sm no-padding" style="border-left:solid 1px #999999;     background: rgba(255, 255, 255, 1);">
                        <select name="type_ark" class="list_menu_y" style="height:43px; width:110px;   cursor: pointer;  padding: 1px 18px;">
                            <option value="2" style="padding: 10px 2px 1px;">Rent</option>
                            <option value="1">Sale</option>
                        </select>
                    </div>

                    <div class="col-xs-2 col-lg-2 hidden-xs hidden-sm no-padding" style="border-left:solid 1px #999999;     background: rgba(255, 255, 255, 1);">
                          <select name="type_home" class="list_menu_y" style="height:43px; width:110px;   cursor: pointer;  padding: 1px 18px;">
                              <option value="">Residential</option>
                                  @foreach($category as $u_cat)
                              <option value="{{$u_cat->id}}">{{$u_cat->name}}</option>
                                  @endforeach
                          </select>
                      </div>

                    <div class=" col-lg-1 hidden-xs hidden-sm no-padding" style="border-left:solid 1px #999999;     background: rgba(255, 255, 255, 1);">

                      <ul class="nav navbar-nav " style="width:100%">

                        <li class="dropdown" style="height:43px; width:100%">
                          <a  style="cursor: pointer; height:43px; padding-top: 13px; padding: 13px 5px 13px 9px; color: #555555;" id='button_open' > More <i class="fa fa-plus"></i></a>

                        </li>
                      </ul>

                      </div>





                  <!--  <div class="col-xs-2 col-lg-2 hidden-xs hidden-sm no-padding" style="border-left:solid 1px #999999;     background: rgba(255, 255, 255, 1);">
                        <select name="type_home" class="list_menu_y" style="height:43px; width:120px;     padding: 1px 18px;">
                            <option value="">ประเภทที่พัก</option>
                                @foreach($category as $u_cat)
                            <option value="{{$u_cat->id}}">{{$u_cat->name}}</option>
                                @endforeach
                        </select>
                    </div> -->

                    <button class="flipkart-navbar-button col-xs-1" type="submit">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                  </div>




                  <div id="newpost" style="display: none;">
                  <br>
                  <div  class="panel-body " style="background: rgba(255, 255, 255, 1); padding-bottom: 0px;">

                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <select name="min_price" class="form-control">
                                                <option value="" selected="">No Min Price</option>
                                                <option value="0">฿0</option>
                                                <option value="10000">฿10,000</option>
                                                <option value="20000">฿20,000</option>
                                                <option value="30000">฿30,000</option>
                                                <option value="40000">฿40,000</option>
                                                <option value="50000">฿50,000</option>
                                                <option value="60000">฿60,000</option>
                                                <option value="70000">฿70,000</option>
                                                <option value="80000">฿80,000</option>
                                                <option value="90000">฿90,000</option>
                                                <option value="100000">฿100,000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <select name="max_price" class="form-control">
                                                <option value="">No Max Price</option>
                                                <option value="10000">฿10,000</option>
                                                <option value="20000">฿20,000</option>
                                                <option value="30000">฿30,000</option>
                                                <option value="40000">฿40,000</option>
                                                <option value="50000">฿50,000</option>
                                                <option value="60000">฿60,000</option>
                                                <option value="70000">฿70,000</option>
                                                <option value="80000">฿80,000</option>
                                                <option value="90000">฿90,000</option>
                                                <option value="100000">฿100,000</option>
                                                <option value="100000000">MAX</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <select name="Bedrooms" class="form-control" data-placeholder="All">
                                                <option value="">Bedrooms</option>
                                                <option value="1">1 Bedrooms</option>
                                                <option value="2">2 Bedrooms</option>
                                                <option value="3">3 Bedrooms</option>
                                                <option value="4">4 Bedrooms</option>
                                                <option value="5">5 Bedrooms</option>
                                                <option value="6">6 Bedrooms</option>
                                                <option value="7">7 Bedrooms</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <select name="Bathroom" class="form-control" data-placeholder="All">
                                                <option value="">Bathroom</option>
                                                <option value="1">1 Bathroom</option>
                                                <option value="2">2 Bathroom</option>
                                                <option value="3">3 Bathroom</option>
                                                <option value="4">4 Bathroom</option>
                                                <option value="5">5 Bathroom</option>
                                                <option value="6">6 Bathroom</option>
                                                <option value="7">7 Bathroom</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><hr style="margin-bottom: 0px;">
                  </div></div>



                  </form>
                  </div>
                  <div class="col-sm-2"></div>






                </div>



<div class="content-section-b" style="    padding: 0px 0; ">
<div class="banner hidden-sm hidden-xs">
    <div class="container" style="background-color: #fff;">
            <div class="g_main g_col1 " style="padding-top:30px; margin-top:-43px;">

                <div class="col-sm-4 m-b t_v_midden" >
                    <div class="t_v_mid ">
                        <div class="g_ib">
                            <div class="t_v_mid_box">
                              <div class="t_v_mid"><img src="{{url('assets/image/person-girl-flat.png')}}"></div>
                              <div class="t_v_mid t_left">
                                  <p class="t16 g_ma_8">Sign up to Sirispace</p>
                                  <p class="t14 t_gray g_ma_8">Create your account to Sirispace</p>
                              </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 m-b t_v_midden" >
                    <div class="t_v_mid ">
                        <div class="g_ib">
                          <div class="t_v_mid_box">
                            <div class="t_v_mid"><img src="{{url('assets/image/288744.png')}}"></div>
                            <div class="t_v_mid t_left">
                                    <p class="t16 g_ma_8">Rent Buy a Property</p>
                                    <p class="t14 t_gray g_ma_8">Search Properties in Thailand.</p>
                          </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 m-b" >
                    <div class="t_v_mid ">
                        <div class="g_ib">
                            <div class="t_v_mid_box">
                              <div class="t_v_mid"><img src="{{url('assets/image/free_point.png')}}"></div>
                              <div class="t_v_mid t_left">
                                  <p class="t16 g_ma_8">Get CashBack</p>
                                  <p class="t14 t_gray g_ma_8">Receive When Contract Signed.</p>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
</div>
        </div>
</div>







<style>
h3 span, h2 span{
    color: #e04f67;
}
.head-text{
  margin-bottom: 4px;
}
figure {

	margin: 0;
	padding: 0;
	background: #fff;
	overflow: hidden;
}
figure:hover+span {
	bottom: -36px;
	opacity: 1;
}

/* Zoom In #1 */
.hover01 figure img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 figure:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);
}
.main_title h3{
    text-align: center;


}
</style>






<div class="content-section-b">
        <div class="container" >

      <!--    <div class="row hidden-sm hidden-xs">
        <div class="col-md-12 " >
          <a href="#" style="width:100%;height:180px;display:block;">
            <img src="{{url('assets/banner/'.$setting->image)}}" class="img-responsive" style="border: 1px solid #e0e0e0; margin: 0 auto;">
          </a>
        </div>
      </div> -->

        <div class="row">

        </div>

          <div class="row">
            <br>
        <div class="col-md-12 " >

          <div class="text-center">
            <h3 id="RECOMMEND" class="head-text"><span>SIRI</span> RECOMMEND</h3>
            <p>Find the hottest property in Bangkok</p>
          </div>




          <div class="body-project">

                    <div class="row">


                  @foreach($home as $homes)

                  <div class="col-sm-4 col-md-3">

                    <?php
                      $data = getimagesize(url('assets/cusimage/'.$homes->image));
                       $height = $data[1];
                     ?>

                        <div class="thumbnail a_sd_move">



                          <div class="hover01" style="max-height: 184px; min-height: 184px; overflow: hidden; position: relative;">
                          <a href="{{url('asset-'.$homes->id)}}" >
                          <figure><img src="{{url('assets/cusimage/'.$homes->image)}}" class="img-responsive"
                            @if($height < 450)
                            style="height: 183px;"
                            @endif
                            ></figure>
                          <div class="g_l_box">
                                <div class="t_white">
                                <p>
                              <b class="t18 t_white">฿{{$homes->Price}}</b>
                                </p>
                                  </div>
                              </div>
                          </a>
                        </div>

                          <div class="caption" style="padding: 3px;">
                            <div class="descript bold">
                                <a href="{{url('asset-'.$homes->id)}}"><?=mb_strimwidth($homes->name, 0, 29, '...');?></a>
                            </div>
                            <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                              <?=mb_strimwidth($homes->shortdetail, 0, 32, '...');?>
                            </div>

                            <div class="descript" style="height: 20px;">
                              <span style="color: #e03753; font-size: 12px;"><i class="fa fa-map-marker"></i> <?=mb_strimwidth($homes->AMPHUR_NAME_ENG, 0, 15, '...');?></span>
                              <div class="descript-t">
                              <div class="postMetaInline-authorLockup">

                                @if($homes->rating == 5)
                                <div class="rating">
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <span style="color: #777; font-size: 12px;">{{$homes->rating}}.0</span>
                                </div>
                                @else
                                <div class="rating">
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span style="color: #777; font-size: 12px;">{{$homes->rating}}.0</span>
                                </div>
                                @endif

                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>


                      @endforeach








                    </div>



          </div>
        <!--    <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div> -->



        </div>


<style>
.view-more-wrapper {
    margin-bottom: 0px;
}
.view-more-wrapper {
    text-align: center;
    margin-top: 22px;
}
.view-more {
    text-decoration: none !important;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 30px !important;
    color: #666 !important;
    border-color: #666 !important;
    display: inline-block;
}
.view-more .plus-sign {
    display: inline-block;
    width: 60px;
    height: 60px;
    margin: 0 auto;
    padding: 5px;
    border: 1px solid #666;
    font-size: 46px;
    font-weight: 100;
    line-height: 46px;
    text-align: center;
    border-bottom-left-radius: 50%;
    border-top-left-radius: 50%;
    border-bottom-right-radius: 50%;
    border-top-right-radius: 50%;
}
.view-more .view-more-text {
    display: inline-block;
    width: 100%;
    text-align: center;
}
</style>

        <div class="col-xs-12">
                <div class="view-more-wrapper"><a href="{{url('siri_recommend')}}" class="view-more"><span class="plus-sign">+</span><span class="view-more-text">View More Posts</span></a></div>
              </div>



    </div>



        </div>
</div>



<section class="promo_full">
			<div class="promo_full_wp magnific">
				<div>
					<h3>#1 RENTAL PROFESIONAL</h3>
					<h4 style="font-size: 28px;">
						Welcome to your new home...
					</h4>

				</div>
			</div>
		</section>






    <div class="content-section-b" style="padding: 20px 0 20px;">
            <div class="container" >


              <div class="row">
                <br>
            <div class="col-md-12 " >



              <div class="text-center">
                <h3 id="RECOMMEND" class="head-text"><span>RECENT</span> UPDATES</h3>
                <p>We're update a fresh listing everyday!</p>
              </div>


              <div class="body-project">

                        <div class="row">


                          @foreach($home_top as $home_tops)

                          <?php
                            $data2 = getimagesize(url('assets/cusimage/'.$home_tops->image));
                             $height2 = $data2[1];
                           ?>

                          <div class="col-sm-4 col-md-3">

                                <div class="thumbnail a_sd_move">
                                  <div class="hover01" style="max-height: 184px; min-height: 184px; overflow: hidden; position: relative;">
                                  <a href="{{url('asset-'.$home_tops->id)}}" >

                                  <figure><img src="{{url('assets/cusimage/'.$home_tops->image)}}" class="img-responsive"
                                    @if($height2 < 440)
                                    style="height: 183px;"
                                    @endif
                                    ></figure>
                                  <div class="g_l_box">
                                        <div class="t_white">
                                        <p>
                                      <b class="t18 t_white">฿{{$home_tops->Price}}</b>
                                        </p>
                                          </div>
                                      </div>
                                  </a>
                                </div>
                                  <div class="caption" style="padding: 3px;">
                                    <div class="descript bold">
                                        <a href="{{url('asset-'.$home_tops->id)}}" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54"><?=mb_strimwidth($home_tops->name, 0, 29, '...');?></a>
                                    </div>
                                    <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                      <?=mb_strimwidth($home_tops->shortdetail, 0, 38, '...');?>
                                    </div>

                                    <div class="descript" style="height: 20px;">
                                      <span style="color: #e03753; font-size: 12px;"><i class="fa fa-map-marker"></i> {{$home_tops->AMPHUR_NAME_ENG}}</span>
                                      <div class="descript-t">
                                      <div class="postMetaInline-authorLockup">

                                        @if($home_tops->rating == 5)
                                        <div class="rating">
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <span style="color: #777; font-size: 12px;">{{$home_tops->rating}}.0</span>
                                        </div>
                                        @else
                                        <div class="rating">
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star voted"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span style="color: #777; font-size: 12px;">{{$home_tops->rating}}.0</span>
                                        </div>
                                        @endif

                                      </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>


                              @endforeach









                        </div>



              </div>
            <!--    <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        Your Application's Landing Page.
                    </div>
                </div> -->



            </div>

            <div class="col-xs-12">
                    <div class="view-more-wrapper"><a href="{{url('recent_updates')}}" class="view-more"><span class="plus-sign">+</span><span class="view-more-text">View More Posts</span></a></div>
                  </div>

        </div>



            </div>
    </div>





    <div class="content-section-b" style="padding: 20px 0 50px;">
            <div class="container" >

<hr style="border-top: 1px solid rgb(195, 202, 196);">
              <div class="row">
                <div class="col-md-12">
<h3 class="text-center" style="font-weight:700">CERTIFICATE AND PARTNERSHIPS </h3>
<br>
</div>


            <div class="col-md-2 col-sm-3 col-xs-6 logo-style">
              <img alt="dealcha.com" src="assets/image/dealcha.png"></a>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 logo-style" >

            <!--  <div id="Certificate-banners"><a title="กรมพัฒนาธุรกิจการค้า sirispace" style="padding-left: 5px;">
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/bns_registered.png"></a>
              </div> -->

              <div id="Certificate-banners" style="padding-left: 5px;"></div>

                <!--  <script src="https://www.trustmarkthai.com/callbackData/initialize.js?t=14f50-15-5-837d5ecc2533522de0fc24060ca019bf16612f49" id="dbd-init"></script><div id="Certificate-banners"></div> -->

            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 logo-style" >
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/vbv.png"></a>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 logo-style" >
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/jb.png"></a>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 logo-style" >
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/whatsonsukhumvit.png"></a>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 logo-style">
              <img alt="dealcha.com" src="assets/image/tccc-logo.png"></a>
            </div>

        </div>



            </div>
    </div>
@stop

@section('scripts')


<script>

//jQuery is required to run this code
$( document ).ready(function() {



    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;

    // console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

        if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}
</script>

<script>
console.log("Downloading video...hellip;Please wait...")
var xhr = new XMLHttpRequest();
xhr.open('GET', '{{url('assets/In-And-Out/MP4/main-search-video.mp4')}}', true);
xhr.responseType = 'blob';
xhr.onload = function(e) {
  if (this.status == 200) {
    console.log("got it");
    var myBlob = this.response;
    var vid = (window.webkitURL || window.URL).createObjectURL(myBlob);
    // myBlob is now the blob that the object URL pointed to.
    var video = document.getElementById("video");
    console.log("Loading video into element");
    video.src = vid;
    // not needed if autoplay is set for the video element
    // video.play()
   }
  }

xhr.send();
</script>

<script src="https://www.trustmarkthai.com/callbackData/initialize.js?t=14f50-15-5-837d5ecc2533522de0fc24060ca019bf16612f49" id="dbd-init"></script>
<script>


var button = document.getElementById('button_open');

button.onclick = function() {
    var div = document.getElementById('newpost');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};
</script>

<script  type="text/javascript" src="{{url('assets/js/typeahead.bundle.js')}}?v1"></script>

<script type="text/javascript">
$(document).ready(function(){
    // Defining the local dataset
    var cars = ['BTS Mo Chit', 'BTS Saphan Khwai', 'BTS Ari', 'BTS Sanam Pao', 'BTS Victory Monument', 'BTS Phaya Thai', 'BTS Ratchathewi', 'BTS Siam', 'BTS Chit Lom', 'BTS Ploen Chit', 'BTS Nana',
    'BTS Asoke', 'BTS Phrom Phong', 'BTS Thong Lo', 'BTS Ekkamai', 'BTS Phra Khanong', 'BTS On Nut', 'BTS Bang Chak', 'BTS Punnawithi', 'BTS Udom Suk', 'BTS Bang Na', 'BTS Bearing',
    'BTS National Stadium', 'BTS Ratchadamri', 'BTS Sala Daeng', 'BTS Chong Nonsi', 'BTS Surasak', 'BTS Saphan Taksin', 'BTS Krung Thon Buri', 'BTS Wongwian Yai', 'BTS Pho Nimit"',
    'BTS Talat Phlu', 'BTS Wutthakat', 'BTS Bang Wa', 'MRT Bang Sue', 'MRT Kamphaeng Phet', 'MRT Chatuchak Park', 'MRT Phahon Yothin', 'MRT Lat Phrao', 'MRT Ratchadaphisek', 'MRT Sutthisan',
    'MRT Huai Khwang', 'MRT Thailand Cultural Centre', 'MRT Phra ram 9', 'MRT Phetchaburi', 'MRT Sukhumvit', 'MRT Queen Sirikit', 'MRT Khlong Toei', 'MRT Lumphini',
    'MRT Silom', 'MRT Sam Yan', 'MRT Hua Lamphong'
    ];

    // Constructing the suggestion engine
    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });

    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing result */
    },
    {
        name: 'cars',
        source: cars
    });

});
</script>







<script>
var button = document.getElementById('button_open_res');

button.onclick = function() {
    var div = document.getElementById('newpost_res');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};




</script>


@stop('scripts')
