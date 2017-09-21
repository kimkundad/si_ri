@extends('layouts.template')

@section('title')
About us | Siri Space
@stop




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
    padding-right: 15px; padding-left: 15px;
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
.feature {
    padding: 30px 10px 20px 110px;
    position: relative;
    background: #fff;
    margin-bottom: 30px;
    color: #888;
    border: 1px solid #dff0d8;
}
.feature i {
    margin: 0;
    position: absolute;
    top: 30px;
    left: 30px;
    padding: 0;
    margin: 0;
    width: 65px;
    height: 65px;
    line-height: 60px;
    text-align: center;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 1px dashed #ccc;
    font-size: 34px;
    color: #F90;
}
.feature p {
  font-size: 13px;
}
.feature img {
    margin: 0;
    position: absolute;
    top: 30px;
    left: 30px;
    padding: 0;
    margin: 0;
    width: 65px;
    height: 65px;
    line-height: 60px;
    text-align: center;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 1px dashed #ccc;
    font-size: 34px;
    color: #F90;
}
</style>

<div class="jumbotron" style="margin-bottom: 10px;">
    <div id="carousel-home-banner" class="carousel slide fade in" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
          <div class="item active">
              <img alt="Places to visit in Japan" src="{{url('assets/image/1920x450_BangKong.jpg')}}">
              <div class="carousel-caption">

                <h2>

                    ABOUT US
             </h2>

                <div class="meta" style="padding-left:2px;">
                  <p class="published-at" style="font-size: 14px;">
                    SIRISPACE.com
                      is a real estate company located in Bangkok, Thailand that helps connect property hunters with the most current database of
                      commercial and residential properties for sale and rent, with property news and all the resources a buyer, renter or seller needs to
                      make their next real estate decision. SIRISPACE.com
                       offer the first cash back program for renters, buyers or referrals in Asia..</p>

                </div>
              </div>
          </div>
      </div>
    </div>
  </div>




<div class="content-section-a" style="padding: 0px 0;">
        <div class="container" >

          <div class="row">
            <br>


          <p style="font-size: 14px; text-align:left; color:#666"></p>


          <div class="body-project">

                    <div class="row">






                      <div class="col-md-6">

                        <div class="feature">
                            <img src="{{url('assets/images/free_point.png')}}" style="height:65px">
                            <h3><span style="color:#08a00a">WHAT </span> IS CASH BACK?</h3>
                            <p>
                              How it works is anyone who registers an account with Siri Space is offered a
                              10% cash back of the applicable agent fees on a transaction. Basically,
                              Siri Space is giving the customer back 10% of the commission.  </p>
                        </div>

                      </div>



                      <div class="col-md-6">

                          <div class="feature">
                              <img src="{{url('assets/image/319882852_n.png')}}" style="height:65px">
                              <h3><span style="color:#08a00a">BUYING </span></h3>
                              <p>
                                 For example, a purchase in Bangkok (3% commission) for a condo worth 10M THB. The commission for Siri Space as the agent will be 300,000 THB. 10% of the commission (30,000 THB) will be given to the buyer upon completion of the transaction.
                             </p>
                          </div>
                      </div>


                      <div class="col-md-6">

                        <div class="feature">
                            <img src="{{url('assets/image/288744.png')}}" style="height:65px">
                            <h3><span style="color:#08a00a">RENTING </span> </h3>
                            <p>
                              For example, a rental in Bangkok (1 month commission) for a condo worth 50,000 THB. The commission for Siri Space as the agent will be 50,000 THB. 10% of the commission (5,000 THB) will be given to the renter upon completion of the transaction.</p>
                        </div>

                      </div>


                      <div class="col-md-6">

                          <div class="feature">
                              <img src="{{url('assets/image/19668278_1451671071581344_996143722_n.jpg')}}" style="height:65px">
                              <h3>REFERRING A <span style="color:#08a00a">FRIEND</span> </h3>
                              <p>
                                A person has a friend moving to Thailand for a new job. The friend has a budget of 100,000 THB per month for a condo. The person refers their friend to Siri Space.
                                Siri space finds the friend a condo for 100,000 THB.
                                The commission for Siri Space as the agent will be 100,000 THB.
                                10% of the commission (10,000 THB) will be given to the referrer upon completion of the transaction.</p>
                          </div>
                      </div>










                    </div>
                    <hr>
                  </div>

                </div>



        </div>
</div>














    @stop

    @section('scripts')




    @stop('scripts')
