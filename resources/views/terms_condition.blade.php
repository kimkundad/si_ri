@extends('layouts.template')
@section('title')
TERMS AND CONDITION | Siri Space
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

</style>

<div class="jumbotron" style="margin-bottom: 10px;">
    <div id="carousel-home-banner" class="carousel slide fade in" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
          <div class="item active">
              <img alt="Places to visit in Japan" src="{{url('assets/image/1920x450_BangKong.jpg')}}">
              <div class="carousel-caption">

                <h2>TERMS AND CONDITION</h2>

                <div class="meta" style="padding-left:2px;">
                  <p class="published-at" style="font-size: 14px;">The Original Real Estate Cashback Network</p>

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

          <h3 id="fix-location" >Terms of Service </h3>
          <hr style="margin-top: 10px; margin-bottom: 10px;">
          <p align="justify" style="font-size: 13px;  color:#666"><span style="color: #08a00a; font-weight: 700;">Welcome to the Sirispace Inc.</span>
            (“Sirispace”) website (the “Site”). By accessing, browsing or using this Site, you acknowledge that you have read, understood and agreed to be
            bound by these Terms of Service (these “Terms”). If you do not agree to these Terms, you should not use or access this Site. Sirispace reserves
             the right to revise these Terms at any time by updating this posting. You are encouraged to review these Terms each time you use the Site because
              your use of the Site after the posting of changes will constitute your acceptance of the changes. We grant you a personal, limited, non-transferable
              non-exclusive, license to access and use the Site. We reserve the right, in our sole discretion and without notice to you, to revise the products
              and services available on the Site and to change, suspend or discontinue any aspect of the Site and we will not be liable to you or to any third
              party for doing so. We may also impose rules for and limits on use of the Site or restrict your access to part, or all, of the Site without notice or penalty.
              Your continued use of the Site will constitute your acceptance of any such changes.</p>



            <h4 id="fix-location" >1. Use of the Site </h4>
            <p align="justify" style="font-size: 13px;  color:#666">You may use the Site only for your own noncommercial personal use and in compliance with these Terms. You are responsible for your own communications, including the transmission, uploading or posting of information and are responsible for the consequences of such communications to the Site. We require all users to agree not to use the Site, and specifically prohibit any use of the Site, for any of the following purposes: We require all users to agree not to use the Site, and specifically prohibit any use of the Site, for any of the following purposes: Posting, communicating or transmitting any material that infringes on any intellectual property, publicity or privacy right of another person or entity Posting any information which is untrue, inaccurate or not your own Engaging in conduct that would constitute a criminal offense or give rise to civil liability or otherwise violate any law or regulation Attempting to interfere in any way with the Site’s or Sirispace’s network security, or attempting to use the Site’s service to gain unauthorized access to any other computer system You are responsible for maintaining the confidentiality of your account and password. You agree to accept responsibility for all activities that occur under your account or password. You agree to immediately notify us in the event of any unauthorized use of your account or other breach of security.</p>


            <h4 id="fix-location" >2. Additional Terms and Conditions</h4>
            <p align="justify" style="font-size: 13px; color:#666">You agree that additional terms and conditions may apply
              to specific products, orders or your use of certain portions of the Site, including with respect to ordering, shipping and return policies (“Additional Terms”), which Additional
              Terms are made part of these Terms by reference. If there is a conflict between these Terms and the Additional Terms, the Additional Terms shall control.</p>


              <h4 id="fix-location" >3. Product Information; Limitation on Quantities</h4>
              <p align="justify" style="font-size: 13px;  color:#666">Excluding any content which may be submitted by users from time to time, we strive to ensure that the information on the Site is complete and reliable. Certain information may contain pricing errors, typographical errors and other errors or inaccuracies which we may correct without liability. We also reserve the right to limit quantities purchased by users and to revise, suspend, or terminate an event or promotion at any time without notice (including after an order has been submitted and/or acknowledged). We do not guarantee that all products described on our Site will be available.</p>



              <h4 id="fix-location" >4. Proprietary Rights</h4>
              <p align="justify" style="font-size: 13px;  color:#666">You acknowledge and agree that the content (other than content that may be submitted by users), materials, text, images, videos, graphics, trademarks, logos, button icons, music, software and other elements available on the Site are the property of Sirispace or our licensors and are protected by copyright, trademark and/or other proprietary rights and laws. You agree not to sell, license, rent, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit, modify or create derivative works from any content or materials on the Site. Sirispace and the Sirispace logo are trademarks of Sirispace. All other trademarks are the property of their respective owners. All of our Site's content is Copyright 2014 Sirispace Inc. All rights reserved.</p>


              <h4 id="fix-location" >5. Submitted Content</h4>
              <p align="justify" style="font-size: 13px;  color:#666">Sirispace does not claim ownership of any materials you make available through the Site. With respect to any materials you submit or make available for inclusion on the Site, you grant Sirispace a perpetual, irrevocable, non-terminable, worldwide, royalty-free and non-exclusive license to use, copy, distribute, publicly display, modify, create derivative works, and sublicense such materials or any part of such materials. You hereby represent, warrant and covenant that any materials you provide do not include anything
                (including, but not limited to, text, images, music or video) to which you do not have the full
                right to grant Sirispace the license specified above. You further represent, warrant and covenant
                that any materials you provide will not contain libelous or otherwise unlawful, abusive or obscene
                material. Sirispace will be entitled to use any content submitted by you without incurring obligations of confidentiality, attribution or compensation to you.</p>


              <h4 id="fix-location" >6. Disclaimers</h4>
              <p align="justify" style="font-size: 13px;  color:#666">You assume all responsibility and risk with respect to your use of the Site. The site, and all content, merchandise, and other information on or accessible from or through this site or A “Linked” site are provided on an “As Is” and “As Available” Basic without warranty of any kind, Either express or implied, including but not limited to the implied warranties of merchantability, Fitness for a particular purpose, Non Infringement, Security or Accuracy. Specifically, But without limitation, sirispace does not warrant that : (1) The information on this site is correct, Accurate or Reliable : (2) The functions contained on this site will be uninterrupted or error-free : Or (3) Defects will be corrected, Or that this site or the server that makes it available is free of viruses or other harmful components. Sirispace makes no warranties of any kind regarding any non-Sirispace sites to which you may be directed or hyperlinked from this Site. Hyperlinks are included solely for your convenience, and Sirispace
                makes no representations or warranties with regard to the accuracy, availability, suitability or safety of information provided in
                such non-Sirispace sites. Sirispace does not endorse, warrant or guarantee any products or services offered or provided by or on behalf of third parties on the Site.</p>


                <h4 id="fix-location" >7. Indemnification</h4>
                <p align="justify" style="font-size: 13px;  color:#666">You agree to indemnify, hold harmless, and defend Sirispace, its parent, subsidiaries, divisions, and affiliates, and their respective officers, directors, employees, agents and affiliates from any and all claims, liabilities, damages, costs and expenses of defense, including attorneys’ fees, in any way arising from or related to your use of the Site, your violation of these Terms or the Privacy Policy, content posted to the Site by you, or your violation of any law or the rights of a third party.</p>


                <h4 id="fix-location" >8. Limitation of Liability</h4>
                <p align="justify" style="font-size: 13px; color:#666">In no event shall Sirispace its affiliates or any of their respective officers, Directors, Employees, Agent, Successors, Subsidiaries, Supplies, Affiliates, Or third parties providing information on this site be liable to any user of the site or any other person or entity for any direct, Indirect, Special, Incidental, Punitive, Consequential or Exemplary damages (including, but not limited to, damages for loss of profits, Loss of data, or Loss of use) Arising out of the use or inability to use the site, Whether based upon warranty, Contract, tort, Or Otherwise, Even if Sirispace has been advised of or should have known of the possibility of such damages or losses. In no event shall the total liability of Sirispace its affiliates or any of their respective officers, Directors, Employees, Agents, Successors, Subsidiaries, Suppliers, Affiliates or third parties providing information on this site to you for all damages, Losses, and causes of action resulting from your use of this site, Whether in contract, Tort (Including, But not limited to, negligence) or otherwise, Exceed the amount you
                  paid to Sirispace in connection with the event giving rise to such liability.</p>

<hr>
              <br><br>
                </div>



        </div>
</div>














    @stop

    @section('scripts')




    @stop('scripts')
