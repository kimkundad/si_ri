
@extends('layouts.template')
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
        left: 15px;
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
        <div class="col-md-12 " style="background-image:url('{{url('assets/banner/'.$setting->image)}}'); border: 1px solid #e0e0e0;">
          <a href="#" style="width:100%;height:180px;display:block;">&nbsp</a>
        </div>
        </div>

          <div class="row">
            <br>

          <h3 id="fix-location"><i class="fa fa-heart-o"></i> Wishlist </h3>
          <hr style="margin-top: 10px;">

          <div class="body-project">

                    <div class="row">




                      <div class="col-lg-12 col-md-12">

                        <form  action="{{url('my_wishlist_del/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                          <input type="hidden" name="_method" value="POST">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @if(isset($home))
                        @foreach($home as $homes)






                        <div class="col-sm-4 col-md-4">
                          <input type="checkbox" name="product_wish[]" value="{{$homes->id_w}}"  >
                          <label>เลือกอสังหา</label>

                          <div class="thumbnail a_sd_move">
                            <a href="{{url('asset-'.$homes->id_p)}}" >
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
                                  <a href="{{url('asset-'.$homes->id_p)}}"><?=mb_strimwidth($homes->name, 0, 29, '...');?></a>
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

                      <button type="submit" class="btn btn-danger pull-right" style="margin-top:15px;">ลบอสังหาที่เลือกไว้</button>

                      </form>






                    </div>

<hr>

                    <div class="text-center">
                        @if(isset($home))
                                {{ $home->links() }}
                       @endif
                              </div>



          </div>









    </div>



        </div>
</div>














    @stop

    @section('scripts')




    @stop('scripts')
