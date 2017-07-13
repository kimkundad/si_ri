@extends('layouts.template')
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


@foreach($slide as $slide_show)
#first-slider .{{$slide_show->name}} {
    background-image: url({{url('assets/uploads/'.$slide_show->bg_image)}});
}
@endforeach

/*  */
</style>
                <div id="first-slider">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade">
                        <!-- Indicators -->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox" style="max-height:428px">
                            <!-- Item 1 -->


                            @foreach($slide as $slide_show)

                            <div class="item @if($slide_show->name == 'slide1') active @endif {{$slide_show->name}}">
                                <div class="row"><div class="container">
                                    <div class="col-md-3 text-right">
                                        <img style="max-width: 200px;"  data-animation="animated zoomInLeft" src="{{url('assets/uploads/'.$slide_show->icon)}}">
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <h3 data-animation="animated bounceInDown">{{$slide_show->first_text}}</h3>
                                        <h4 data-animation="animated bounceInUp">{{$slide_show->secend_text}}</h4>
                                     </div>
                                </div></div>
                             </div>

                             @endforeach












                        </div>
                        <!-- End Wrapper for slides-->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>







                <div class="container-fluid" style=" bottom: 60px; background: rgba(255, 255, 255, 0); position: relative;">
                    <div class="col-sm-2"></div>
                    <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                      <form action="{{url('/search')}}" method="GET" enctype="multipart/form-data" name="product">
                        {{ csrf_field() }}
                  <div class="row">
                    <input class="flipkart-navbar-input col-xs-6" type="" placeholder="Search for Products, Brands and more" name="ark">

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
                              <div class="t_v_mid"><img src="http://www.learnsbuy.com/assets/images/free_point.png"></div>
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














<div class="content-section-b">
        <div class="container" >

          <div class="row hidden-sm hidden-xs">
        <div class="col-md-12 " >
          <a href="#" style="width:100%;height:180px;display:block;">
            <img src="{{url('assets/banner/'.$setting->image)}}" class="img-responsive" style="border: 1px solid #e0e0e0; margin: 0 auto;">
          </a>
        </div>
        </div>

          <div class="row">
            <br>
        <div class="col-md-12 " >
          <h3>SIRI RECOMMEND</h3>
          <p>Find the hottest property in Bangkok</p>



          <div class="body-project">

                    <div class="row">


                  @foreach($home as $homes)

                  <div class="col-sm-4 col-md-3">

                        <div class="thumbnail a_sd_move">
                          <div style="max-height: 184px; overflow: hidden; position: relative;">
                          <a href="{{url('asset-'.$homes->id)}}" >
                          <img src="{{url('assets/cusimage/'.$homes->image)}}" >
                          <div class="g_l_box">
                                <div class="t_white">
                                <p>
                              <b class="t18 t_white">฿{{$homes->Price}}</b>
                                </p>
                                  </div>
                              </div>
                          </a></div>
                          <div class="caption" style="padding: 3px;">
                            <div class="descript bold">
                                <a href="{{url('asset-'.$homes->id)}}"><?=mb_strimwidth($homes->name, 0, 29, '...');?></a>
                            </div>
                            <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                              <?=mb_strimwidth($homes->shortdetail, 0, 32, '...');?>
                            </div>

                            <div class="descript" style="height: 20px;">
                              <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i><?=mb_strimwidth($homes->AMPHUR_NAME_ENG, 0, 25, '...');?></span>
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
              <h3>RECENT UPDATES </h3>
              <p>We're update a fresh listing everyday!</p>


              <div class="body-project">

                        <div class="row">


                          @foreach($home_top as $home_tops)

                          <div class="col-sm-4 col-md-3">

                                <div class="thumbnail a_sd_move">
                                  <div style="max-height: 184px; overflow: hidden; position: relative;">
                                  <a href="{{url('asset-'.$home_tops->id)}}" >
                                  <img src="{{url('assets/cusimage/'.$home_tops->image)}}" >
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
                                      <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> {{$home_tops->AMPHUR_NAME_ENG}}</span>
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


            <div class="col-md-2 col-sm-3 col-xs-6">
              <img alt="dealcha.com" src="assets/image/dealcha.png"></a>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6" >

              <div id="Certificate-banners"><a title="กรมพัฒนาธุรกิจการค้า sirispace" style="padding-left: 5px;">
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/bns_registered.png"></a>
              </div>

                <!--  <script src="https://www.trustmarkthai.com/callbackData/initialize.js?t=14f50-15-5-837d5ecc2533522de0fc24060ca019bf16612f49" id="dbd-init"></script><div id="Certificate-banners"></div> -->

            </div>

            <div class="col-md-2 col-sm-3 col-xs-6" >
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/vbv.png"></a>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6" >
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/jb.png"></a>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6" >
                <img alt="กรมพัฒนาธุรกิจการค้า sirispace" src="assets/image/whatsonsukhumvit.png"></a>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
              <img alt="dealcha.com" src="assets/image/tccc-logo.png"></a>
            </div>

        </div>



            </div>
    </div>
@stop

@section('scripts')

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


@stop('scripts')
