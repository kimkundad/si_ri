@extends('layouts.template')
@section('content')

<style>
#search_container {

    position: relative;
    height: 280px;
    background: #4d536d url(assets/image/1920x450_BangKong.jpg) no-repeat center top;
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

          <h3>TOP DESTINATIONS </h3>
          <p>Discover tours, attractions and activities for your next adventure</p>
          <hr style="margin-top: 10px;">

          <div class="body-project">

                    <div class="row">


                      <div class="col-lg-4 col-md-4">


                                    <div class="widget">
                                            <form name="Search" method="post" action="Search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" placeholder="Search name property...">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" style="margin-left:0;"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                        </div>
                                        <br>










                                <div class="box_style_cat">
    <ul id="cat_nav">

      <li><a href="#"><i class="fa fa-thumbs-o-up"></i>Most popular </a>
      </li>
      <li><a href="#"><i class="fa fa-star-o"></i>Best reviewed </a>
      </li>
      <li><a href="#"><i class="fa fa-child"></i>Price (low to high) </a>
      </li>
      <li><a href="#"><i class="fa fa-street-view "></i>Price (high to low) </a>
      </li>
      <li><a href="#"><i class="fa fa-magnet "></i>Top new activities </a>
      </li>

    </ul>
  </div>



                        <div class="box_style_2">
              						<i class="fa fa-user" aria-hidden="true"></i>
              						<h4 style="margin-bottom: 0px;">Need <span style="color: #00c402;">Help?</span></h4>
              						<a href="tel://0940547728" class="phone">0940547728</a>
              						<small>Monday to Friday 9.00am - 7.30pm</small>
              					</div>


                      </div>

                      <div class="col-lg-8 col-md-8">

                        <div class="col-sm-6 col-md-6">

                              <div class="thumbnail a_sd_move">
                                <a href="#" >
                                <img src="http://www.sirispace.com/admin/cusimage/1495528775-house-ekkamai-pool1.jpg" >
                                <div class="g_l_box">
                                      <div class="t_white">
                                      <p>
                                    <b class="t18 t_white">฿20000</b>
                                      </p>
                                        </div>
                                    </div>
                                </a>
                                <div class="caption" style="padding: 3px;">
                                  <div class="descript bold">
                                      <a href="http://www.learnsbuy.com/courseinfo/8" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54">HOUSE IN TOWNHOME STYLE</a>
                                  </div>
                                  <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                    Exclusive special line entry with tour gu...
                                  </div>

                                  <div class="descript" style="height: 20px;">

                                    <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> Watthana</span>
                                    <div class="descript-t">
                                    <div class="postMetaInline-authorLockup">
                                      <div class="rating">
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star voted"></i>
                                          <i class="fa fa-star-o"></i> <span style="color: #777; font-size: 12px;">4.0</span>
                                      </div>
                                    </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                  <div class="thumbnail a_sd_move">
                                    <a href="#" >
                                    <img src="http://www.sirispace.com/admin/cusimage/1495730306-house-thonglor-pool1.jpg" >
                                    </a>
                                    <div class="caption" style="padding: 3px;">
                                      <div class="descript bold">
                                          <a href="http://www.learnsbuy.com/courseinfo/8" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54">HOUSE IN TOWNHOME STYLE</a>
                                      </div>
                                      <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                        Exclusive special line entry with tour gu...
                                      </div>

                                      <div class="descript" style="height: 20px;">

                                        <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> Watthana</span>
                                        <div class="descript-t">
                                        <div class="postMetaInline-authorLockup">
                                          <div class="rating">
                                              <i class="fa fa-star voted"></i>
                                              <i class="fa fa-star voted"></i>
                                              <i class="fa fa-star voted"></i>
                                              <i class="fa fa-star voted"></i>
                                              <i class="fa fa-star-o"></i> <span style="color: #777; font-size: 12px;">4.0</span>
                                          </div>
                                        </div>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                </div>





                                <div class="col-sm-6 col-md-6">
                                      <div class="thumbnail a_sd_move">
                                        <a href="#" >
                                        <img src="http://www.sirispace.com/admin/cusimage/1481080903-Luxury_house_Pool-View-House.jpg" >
                                        </a>
                                        <div class="caption" style="padding: 3px;">
                                          <div class="descript bold">
                                              <a href="http://www.learnsbuy.com/courseinfo/8" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54">HOUSE IN TOWNHOME STYLE</a>
                                          </div>
                                          <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                            Exclusive special line entry with tour gu...
                                          </div>

                                          <div class="descript" style="height: 20px;">

                                            <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> Watthana</span>
                                            <div class="descript-t">
                                            <div class="postMetaInline-authorLockup">
                                              <div class="rating">
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star-o"></i> <span style="color: #777; font-size: 12px;">4.0</span>
                                              </div>
                                            </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>





                                    <div class="col-sm-6 col-md-6">
                                          <div class="thumbnail a_sd_move">
                                            <a href="#" >
                                            <img src="http://www.sirispace.com/admin/cusimage/1483674484-house-soi-somkid5.jpg" >
                                            </a>
                                            <div class="caption" style="padding: 3px;">
                                              <div class="descript bold">
                                                  <a href="http://www.learnsbuy.com/courseinfo/8" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54">HOUSE IN TOWNHOME STYLE</a>
                                              </div>
                                              <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                                Exclusive special line entry with tour gu...
                                              </div>

                                              <div class="descript" style="height: 20px;">

                                                <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> Watthana</span>
                                                <div class="descript-t">
                                                <div class="postMetaInline-authorLockup">
                                                  <div class="rating">
                                                      <i class="fa fa-star voted"></i>
                                                      <i class="fa fa-star voted"></i>
                                                      <i class="fa fa-star voted"></i>
                                                      <i class="fa fa-star voted"></i>
                                                      <i class="fa fa-star-o"></i> <span style="color: #777; font-size: 12px;">4.0</span>
                                                  </div>
                                                </div>
                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                        </div>







                                        <div class="col-sm-6 col-md-6">
                                              <div class="thumbnail a_sd_move">
                                                <a href="#" >
                                                <img src="http://www.sirispace.com/admin/cusimage/1480579772-patsara-gardens-swimming-pool1.jpg" >
                                                </a>
                                                <div class="caption" style="padding: 3px;">
                                                  <div class="descript bold">
                                                      <a href="http://www.learnsbuy.com/courseinfo/8" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54">HOUSE IN TOWNHOME STYLE</a>
                                                  </div>
                                                  <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                                    Exclusive special line entry with tour gu...
                                                  </div>

                                                  <div class="descript" style="height: 20px;">

                                                    <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> Watthana</span>
                                                    <div class="descript-t">
                                                    <div class="postMetaInline-authorLockup">
                                                      <div class="rating">
                                                          <i class="fa fa-star voted"></i>
                                                          <i class="fa fa-star voted"></i>
                                                          <i class="fa fa-star voted"></i>
                                                          <i class="fa fa-star voted"></i>
                                                          <i class="fa fa-star-o"></i> <span style="color: #777; font-size: 12px;">4.0</span>
                                                      </div>
                                                    </div>
                                                    </div>
                                                  </div>

                                                </div>
                                              </div>
                                            </div>





                                            <div class="col-sm-6 col-md-6">
                                                  <div class="thumbnail a_sd_move">
                                                    <a href="#" >
                                                    <img src="http://www.sirispace.com/admin/cusimage/1484908095-baan-sansiri-sukhumvit67-type-D-parking.jpg" >
                                                    </a>
                                                    <div class="caption" style="padding: 3px;">
                                                      <div class="descript bold">
                                                          <a href="http://www.learnsbuy.com/courseinfo/8" data-dismiss="modal" data-toggle="modal" data-target="#show_detail54">HOUSE IN TOWNHOME STYLE</a>
                                                      </div>
                                                      <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                                        Exclusive special line entry with tour gu...
                                                      </div>

                                                      <div class="descript" style="height: 20px;">

                                                        <span style="color: #777; font-size: 12px;"><i class="fa fa-map-marker"></i> Watthana</span>
                                                        <div class="descript-t">
                                                        <div class="postMetaInline-authorLockup">
                                                          <div class="rating">
                                                              <i class="fa fa-star voted"></i>
                                                              <i class="fa fa-star voted"></i>
                                                              <i class="fa fa-star voted"></i>
                                                              <i class="fa fa-star voted"></i>
                                                              <i class="fa fa-star-o"></i> <span style="color: #777; font-size: 12px;">4.0</span>
                                                          </div>
                                                        </div>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>










                      </div>








                    </div>

<hr>

                    <div class="text-center">

                                <ul class="pagination">
                                  <li><a href="#">Prev</a>
                                  </li>
                                  <li class="active"><a href="#">1</a>
                                  </li>
                                  <li><a href="#">2</a>
                                  </li>
                                  <li><a href="#">3</a>
                                  </li>
                                  <li><a href="#">4</a>
                                  </li>
                                  <li><a href="#">5</a>
                                  </li>
                                  <li><a href="#">Next</a>
                                  </li>
                                </ul>
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













    <footer>


        <div class="footer-menu">
        <div class="container" >
            <div class="row">

                <div class="col-md-4">
                    <h4>เกี่ยวกับเรา<span class="head-line"></span></h4>
                    <p>สถาบันติว PAT ญี่ปุ่นและภาษาญี่ปุ่น ZA-SHI
                        ภาษาญี่ปุ่น (ครูพี่โฮม) คนแรกและคนเดียวที่ได้ PAT ญี่ปุ่น 300 คะแนนเต็ม
                        เกียรตินิยมอันดับ 1 (เหรียญทอง) อักษรศาสตร์ จุฬาฯ</p>

                   <ul>
                    <li><span>Tel:</span> 09-4052-6052 </li>
                    <li><span>Email:</span> info@coursesquare.co </li>
                    <li><span>Website:</span> www.coursesquare.co </li>
                    <li><span>Line Id:</span> coursesquare </li>
                   </ul>

                </div>

                <div class="col-md-4">
                    <h4>หน้าหลัก<span class="head-line"></span></h4>
                </div>

                <div class="col-md-4">
                    <h4>ติดตามข่าวสาร<span class="head-line"></span></h4>
                    <p>คุณสามารถติดตามข่าวสาร โปรโมชั่น และคอร์สใหม่ ๆ ของเราได้จากช่องทางต่อไปนี้</p>

                <ul class="social-icons">
                    <li>
                        <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a class="google" href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>

                </div>

                <div class="col-lg-12" style="border-top: 1px solid rgba(255,255,255,.06); margin-top:30px;">

                    <p class="copyright small" style="padding: 15px 0;">Copyright © Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
        </div>


    </footer>

    @stop

    @section('scripts')




    @stop('scripts')
