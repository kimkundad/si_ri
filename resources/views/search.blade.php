@extends('layouts.template')
@section('title')
Search | Siri Space
@stop
@section('content')

<style>
#search_container {

    position: relative;
    height: 280px;
    background: #4d536d url(assets/cusimage/1920x450_BangKong.jpg) no-repeat center top;
    background-size: cover;
    color: #fff;
    width: 100%;
    display: table;
    z-index: 99;
}
@media (min-width: 1200px)
{
  #search_container {
      margin-bottom: 22px;
  }
  .container {
      width: 970px;
  }
  .t_v_midden{
    border-right: 1px solid #e0e0e0;
  }

  .col-sm-6, .col-md-6{
    padding-right: 5px; padding-left: 5px;
  }
  .thumbnail {
      margin-bottom: 0px;
    }
    .g_l_box {
        /* top: 20px; */
        left: 5px;
    }

}
ul#cat_nav li a  {
    font-size: 12px;

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
  color: #999999;
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
.active_li{
  background: #f9f9f9;
  color: #f90 !important;
  font-weight: 700;
  font-size: 13px !important;
}
</style>

    <div class="col-lg-12 hero-banner " id="search_container">


      <div class="container-fluid" style=" margin-top: 220px; background: rgba(255, 255, 255, 0); position: relative;">
          <div class="col-sm-2"></div>
          <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
            <form action="{{url('/search')}}" method="GET" enctype="multipart/form-data" name="product">
              {{ csrf_field() }}
        <div class="row">
          <input class="flipkart-navbar-input typeahead col-xs-6" type="" placeholder="Search for Products, Brands and more" name="ark" value="{{$ark}}">

          <div class="col-xs-2 col-lg-2 hidden-xs hidden-sm no-padding" style="border-left:solid 1px #999999;     background: rgba(255, 255, 255, 1);">
              <select name="type_ark" class="list_menu_y" style="height:43px; width:120px;     padding: 1px 18px;">
                  <option value="2"
                  @if($type_ark == 2)
                  selected="selected"
                  @endif >Rent</option>
                  <option value="1"   @if($type_ark == 1)
                    selected="selected"
                    @endif>Sale</option>
              </select>
          </div>

          <div class="col-xs-2 col-lg-2 hidden-xs hidden-sm no-padding" style="border-left:solid 1px #999999;     background: rgba(255, 255, 255, 1);">
              <select name="type_home" class="list_menu_y" style="height:43px; width:110px;     padding: 1px 18px;">
                  <option value="">Residential</option>

                      @if(isset($type_home))
                      @foreach($category as $u_cat)
                  <option value="{{$u_cat->id}}" @if($type_home == $u_cat->id)
                    selected="selected"
                    @endif>{{$u_cat->name}}</option>
                      @endforeach

                      @else

                      @foreach($category as $u_cat)
                  <option value="{{$u_cat->id}}">{{$u_cat->name}}</option>
                      @endforeach

                      @endif

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

          <div class="row" style="margin-right: 5px; margin-left: 5px;">
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



                </div>




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
                option{

                }
                </style>












<div class="content-section-a">
        <div class="container" >



          <div class="row">
            <br>

            <h3 id="fix-location"><i class="icon_set_1_icon-23"></i>ผลการค้นหาทั้งหมด : {{$home_count}} </h3>


          <hr style="margin-top: 10px;">

          <div class="body-project">

                    <div class="row">


                      <div class="col-lg-4 col-md-4">


                        <div class="widget">
                                <form method="get" action="{{url('/search')}}">
                                  {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="ark" placeholder="Search name property...">
                                    <input type="hidden" class="form-control" name="type_ark" value="{{$type_ark}}">
                                    <input type="hidden" class="form-control" name="type_home" value="{{$type_home}}">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" style="margin-left:0;"><i class="fa fa-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            </div>
                                        <br>









@if(isset($sort))

@if($type_home != NULL && $ark != NULL)

<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-100#fix-location')}}" @if($sort == 100)
      class="active_li"
        @endif><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-101#fix-location')}}" @if($sort == 101)
      class="active_li"
        @endif><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-102#fix-location')}}" @if($sort == 102)
      class="active_li"
        @endif><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-103#fix-location')}}" @if($sort == 103)
      class="active_li"
        @endif><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-104#fix-location')}}" @if($sort == 104)
      class="active_li"
        @endif ><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>

@elseif($type_home == NULL && $ark != NULL)

<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-100#fix-location')}}" @if($sort == 100)
      class="active_li"
        @endif><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-101#fix-location')}}" @if($sort == 101)
      class="active_li"
        @endif><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-102#fix-location')}}" @if($sort == 102)
      class="active_li"
        @endif><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-103#fix-location')}}" @if($sort == 103)
      class="active_li"
        @endif><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-104#fix-location')}}" @if($sort == 104)
      class="active_li"
        @endif ><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>

@elseif($type_home != NULL && $ark == NULL)

<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-100#fix-location')}}" @if($sort == 100)
      class="active_li"
        @endif><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-101#fix-location')}}" @if($sort == 101)
      class="active_li"
        @endif><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-102#fix-location')}}" @if($sort == 102)
      class="active_li"
        @endif><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-103#fix-location')}}" @if($sort == 103)
      class="active_li"
        @endif><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-104#fix-location')}}" @if($sort == 104)
      class="active_li"
        @endif ><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>


@else


<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property3-'.$type_ark.'-100#fix-location')}}" @if($sort == 100)
      class="active_li"
        @endif><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-101#fix-location')}}" @if($sort == 101)
      class="active_li"
        @endif><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-102#fix-location')}}" @if($sort == 102)
      class="active_li"
        @endif><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-103#fix-location')}}" @if($sort == 103)
      class="active_li"
        @endif><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-104#fix-location')}}" @if($sort == 104)
      class="active_li"
        @endif ><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>


@endif



@else


@if($type_home != NULL && $ark != NULL)
<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-100#fix-location')}}" ><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-101#fix-location')}}"><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-102#fix-location')}}"><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-103#fix-location')}}"><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property-'.$type_ark.'-'.$type_home.'-'.$ark.'-104#fix-location')}}"><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>
@elseif($type_home == NULL && $ark != NULL)
<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-100#fix-location')}}" ><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-101#fix-location')}}"><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-102#fix-location')}}"><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-103#fix-location')}}"><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property1-'.$type_ark.'-'.$ark.'-104#fix-location')}}"><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>
@elseif($type_home != NULL && $ark == NULL)
<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-100#fix-location')}}" ><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-101#fix-location')}}"><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-102#fix-location')}}"><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-103#fix-location')}}"><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property2-'.$type_ark.'-'.$type_home.'-104#fix-location')}}"><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>
@else

<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_search_property3-'.$type_ark.'-100#fix-location')}}" ><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-101#fix-location')}}"><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-102#fix-location')}}"><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-103#fix-location')}}"><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_search_property3-'.$type_ark.'-104#fix-location')}}"><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>

@endif


@endif


                        <div class="box_style_2">
              						<i class="icon_set_1_icon-57" aria-hidden="true"></i>
              						<h4 style="margin-bottom: 0px;">Need <span style="color: #00c402;">Help?</span></h4>
              						<a href="tel://0940547728" class="phone">0940547728</a>
              						<small>Monday to Friday 9.00am - 7.30pm</small>
              					</div>


                      </div>

                      <div class="col-lg-8 col-md-8">

                        @if(isset($home))
                        @foreach($home as $homes)


                        <div class="col-sm-6 col-md-6" style="min-height:303px;">

                          <div class="thumbnail a_sd_move">
                            <div style="max-height: 204px; overflow: hidden; position: relative;">
                            <a href="{{url('asset-'.$homes->id)}}" >
                            <img src="{{url('assets/cusimage/'.$homes->image)}}" >
                            <div class="g_l_box">
                                  <div class="t_white">
                                  <p>
                                <b class="t18 t_white">฿{{number_format($homes->Price)}}</b>
                                  </p>
                                    </div>
                                </div>
                            </a></div>
                            <div class="caption" style="padding: 3px;">
                              <div class="descript bold">
                                  <a href="{{url('asset-'.$homes->id)}}"><?=mb_strimwidth($homes->name, 0, 29, '...');?></a>
                              </div>
                              <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                <?=mb_strimwidth($homes->shortdetail, 0, 38, '...');?>
                              </div>

                              <div class="descript" style="height: 20px;">
                                <span style="color: #e03753; font-size: 12px;"><i class="fa fa-map-marker"></i> <?=mb_strimwidth($homes->AMPHUR_NAME_ENG, 0, 25, '...');?></span>
                                <div class="descript-t">
                                <div class="postMetaInline-authorLockup">

                                  @if($homes->rating == 5)
                                  <div class="rating">
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <span style="color: #777; font-size: 13px;">{{$homes->rating}}.0</span>
                                  </div>
                                  @endif
                                  @if($homes->rating == 4)
                                  <div class="rating">
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star-o"></i>
                                      <span style="color: #777; font-size: 13px;">{{$homes->rating}}.0</span>
                                  </div>
                                  @endif
                                  @if($homes->rating == 3)
                                  <div class="rating">
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                      <span style="color: #777; font-size: 13px;">{{$homes->rating}}.0</span>
                                  </div>
                                  @endif
                                  @if($homes->rating == 2)
                                  <div class="rating">
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                      <span style="color: #777; font-size: 13px;">{{$homes->rating}}.0</span>
                                  </div>
                                  @endif
                                  @if($homes->rating == 1)
                                  <div class="rating">
                                      <i class="fa fa-star voted"></i>
                                      <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                      <span style="color: #777; font-size: 13px;">{{$homes->rating}}.0</span>
                                  </div>
                                  @endif


                                </div>
                                </div>
                              </div>

                            </div>
                          </div>

                            </div>


@endforeach

@endif

                      </div>








                    </div>

<hr>

                    <div class="text-center">

                                {{ $home->render() }}
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


    <script  type="text/javascript" src="{{url('assets/js/typeahead.bundle.js')}}"></script>

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


    @stop('scripts')
