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

        <video class="fillWidth"  poster="{{url('assets/In-And-Out/Snapshots/main-search-video-poster.jpg')}}" loop autoplay muted>
    			<source src="{{url('assets/In-And-Out/MP4/main-search-video.mp4')}}" type="video/mp4">
    		</video> 



    </div>
    <div style="position: absolute; bottom: 50px; left: 50%; margin-left: -19px;">
            <a class="coverr-nav-item" href="#RECOMMEND" style="text-decoration: none;">
                <div class='icon-scroll'></div>
            </a>
        </div>
</div>







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
