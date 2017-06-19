@extends('layouts.template')
@section('content')

<style>
#search_container {

    position: relative;
    height: 280px;
    background: #4d536d url(assets/cusimage/{{$cat_name->image}}) no-repeat center top;
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
.active_li{
  background: #f9f9f9;
  color: #f90 !important;
  font-weight: 700;
  font-size: 13px !important;
}
</style>

    <div class="col-lg-12 hero-banner " id="search_container">
                    <div id="search">

                    </div>
                </div>

















<div class="content-section-a">
        <div class="container" >

          <div class="row hidden-sm hidden-xs">
        <div class="col-md-12 " style="background-image:url('https://klook-res.cloudinary.com/image/upload/v1495246947/banner/pdxr3bty9gqeiwvflaik.jpg'); border: 1px solid #e0e0e0;">
          <a href="#" style="width:100%;height:180px;display:block;">&nbsp</a>
        </div>
        </div>

          <div class="row">
            <br>

          <h3 id="fix-location"><i class="icon_set_1_icon-23"></i> {{$cat_name->name}} </h3>
          <p>Everyone deserves to find their dream {{$cat_name->name}}</p>
          <hr style="margin-top: 10px;">

          <div class="body-project">

                    <div class="row">


                      <div class="col-lg-4 col-md-4">


                                    <div class="widget">
                                            <form method="post" action="{{url('/search')}}">
                                              {{ csrf_field() }}
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ark" placeholder="Search name property...">
                                                <input type="hidden" class="form-control" name="type_ark" value="{{$rent}}">
                                                <input type="hidden" class="form-control" name="type_home" value="{{$type}}">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" style="margin-left:0;"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                        </div>
                                        <br>









@if(isset($sort))
  <div class="box_style_cat">
    <ul id="cat_nav">

      <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-100#fix-location')}}" @if($sort == 100)
        class="active_li"
          @endif><i class="fa fa-thumbs-o-up"></i>Most popular </a>
      </li>
      <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-101#fix-location')}}" @if($sort == 101)
        class="active_li"
          @endif><i class="fa fa-star-o"></i>Best reviewed </a>
      </li>
      <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-102#fix-location')}}" @if($sort == 102)
        class="active_li"
          @endif><i class="fa fa-child"></i>Price (low to high) </a>
      </li>
      <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-103#fix-location')}}" @if($sort == 103)
        class="active_li"
          @endif><i class="fa fa-street-view "></i>Price (high to low) </a>
      </li>
      <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-104#fix-location')}}" @if($sort == 104)
        class="active_li"
          @endif ><i class="fa fa-magnet "></i>Top new activities </a>
      </li>

    </ul>
  </div>
@else

<div class="box_style_cat">
  <ul id="cat_nav">

    <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-100#fix-location')}}" ><i class="fa fa-thumbs-o-up"></i>Most popular </a>
    </li>
    <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-101#fix-location')}}"><i class="fa fa-star-o"></i>Best reviewed </a>
    </li>
    <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-102#fix-location')}}"><i class="fa fa-child"></i>Price (low to high) </a>
    </li>
    <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-103#fix-location')}}"><i class="fa fa-street-view "></i>Price (high to low) </a>
    </li>
    <li><a href="{{url('sort_property-'.$rent.'-'.$type.'-104#fix-location')}}"><i class="fa fa-magnet "></i>Top new activities </a>
    </li>

  </ul>
</div>

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


                        <div class="col-sm-6 col-md-6">

                          <div class="thumbnail a_sd_move">
                            <a href="{{url('asset-'.$homes->id)}}" >
                            <img src="{{url('assets/cusimage/'.$homes->image)}}" >
                            <div class="g_l_box">
                                  <div class="t_white">
                                  <p>
                                <b class="t18 t_white">฿{{$homes->Price}}</b>
                                  </p>
                                    </div>
                                </div>
                            </a>
                            <div class="caption" style="padding: 3px;">
                              <div class="descript bold">
                                  <a href="{{url('asset-'.$homes->id)}}"><?=mb_strimwidth($homes->name, 0, 29, '...');?></a>
                              </div>
                              <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                <?=mb_strimwidth($homes->shortdetail, 0, 38, '...');?>
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

                                {{ $home->links() }}
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




    @stop('scripts')
