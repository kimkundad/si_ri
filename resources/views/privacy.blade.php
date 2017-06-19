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

                <h2>PRIVACY POLICY</h2>

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

          <h3 id="fix-location" >Privacy Policy </h3>
          <hr style="margin-top: 10px; margin-bottom: 10px;">
          <p align="justify" style="font-size: 13px; color:#666"><span style="color: #08a00a; font-weight: 700;">SIRISPACE.com</span>
            "Company", "we" or "us") provides the user and/or viewer ("you") with access to information through this website (the "Site")
            and provides certain products and services in conjunction with this Site (the “Services”). This privacy policy describes our information
            collection and use practices in connection with the Site and the Services, as well as circumstances under which we disclose information collected from you.</p>



            <h4 id="fix-location" >Information </h4>
            <p align="justify" style="font-size: 13px; color:#666">"Personal Information" means data that allows someone to identify or contact you
              (e.g. your name, address, telephone number, e-mail address, credit/debit numbers, expiration date and other billing information;
              people to whom purchases have been shipped, including addresses and phone number). "Non-Personal Information"
              means data that is not associated with or linked to your Personal Information.</p>


              <h4 id="fix-location" >Information That Is Gathered From Visitors </h4>
              <p align="justify" style="font-size: 13px; color:#666">In common with other websites, log files are stored on our web server saving details
                such as the visitor's Internet Protocol (IP) address (a number that is automatically assigned to your computer
                when you use the Internet, which may vary from session to session) address, browser type, referring page and time of visit.
                Such information is not associated with any online account or registration information.</p>


                <h4 id="fix-location" >Information You Give Us </h4>
                <p align="justify" style="font-size: 13px; color:#666">We receive and store information that you enter on the Site or give us in any other way
                  (e.g., by telephone). This may include information you provide when you engage in transactions, search, contact customer service, or participate in contests,
                   promotions, surveys, forums, content submissions, chats, bulletin boards, discussion groups, requests for suggestions or other aspects or services
                   offered by us. As a result, you may supply us with such Personal Information. By submitting Personal Information through the Site or the Services,
                   you agree to the terms of this Privacy Policy and you expressly consent to the collection, use and disclosure of your Personal Information in accordance
                   with this Privacy Policy. The Site has security measures in place to protect against the loss, misuse and unauthorized alteration of Personal Information
                   in Company's possession and control. Although we endeavor to provide security for information in our possession and control, no security system can prevent
                   against all potential security breaches, and we bear no liability for uses or disclosures of Personal Information or Non-Personal Information arising in connection with the theft thereof.</p>






                   <h4 id="fix-location" >How the Information is used</h4>
                   <p align="justify" style="font-size: 13px;  color:#666">We use information collected from our Site and the Services in several ways. For example, we use Personal Information as needed to provide the Site and the Services. We may send E-mails to you regarding news of the Services or offers by us or our affiliates. We also use both Personal Information and Non-Personal Information when evaluating ways to improve the Site and the Services. As further described below, in limited circumstances we may disclose collected information, including Personal Information, to certain third parties in connection with providing the Services or as required by law. We use Non-Personal Information in a variety of ways, including, by way of example, to evaluate the performance of the Site and Services and the general preferences of users, or to generate anonymous statistics for our benefit or for our business partners. Because Non-Personal Information is entirely anonymous, and therefore can never be used by us to identify you, this policy does not limit our ability to use or disclose Non-Personal Information. We may use third-party advertising companies to serve ads when you visit the Site. These companies may use information (not including your name, address, email address, or telephone number) about your visits to this and other websites in order to provide advertisements about goods and services of interest to you. If you enter and win a contest or other promotion, you expressly consent to us (a) providing your Personal Information (e.g., your name and address) to the third party providing the prize for the contest or other promotion, solely to provide you such prize and (b) publicly disclosing your name and the fact that you won the contest or promotion.</p>


                   <h4 id="fix-location" >Information Shared with Third Parties</h4>
                   <p align="justify" style="font-size: 13px;  color:#666">We receive and store information that you enter on the Site or give us in any other way
                     (e.g., by telephone). This may include information you provide when you engage in transactions, search, contact customer service, or participate in contests,
                      promotions, surveys, forums, content submissions, chats, bulletin boards, discussion groups, requests for suggestions or other aspects or services
                      offered by us. As a result, you may supply us with such Personal Information. By submitting Personal Information through the Site or the Services,
                      you agree to the terms of this Privacy Policy and you expressly consent to the collection, use and disclosure of your Personal Information in accordance
                      with this Privacy Policy. The Site has security measures in place to protect against the loss, misuse and unauthorized alteration of Personal Information
                      in Company's possession and control. Although we endeavor to provide security for information in our possession and control, no security system can prevent
                      against all potential security breaches, and we bear no liability for uses or disclosures of Personal Information or Non-Personal Information arising in connection with the theft thereof.</p>


                      <h4 id="fix-location" >Visitor Options </h4>
                      <p style="font-size: 13px;  color:#666">If you have subscribed to one or more of our Services,
                        you may unsubscribe by following the instructions which are included in the e-mail that you receive</p>



                        <h4 id="fix-location" >Cookies </h4>
                        <p align="justify" style="font-size: 13px;  color:#666">Cookies are small digital signature files that are stored by your web browser that allow your preferences to be recorded when visiting the Site. They may also be used to track your return visits to the Site. When using the Services, we may create “cookies” on your computer for purposes of facilitating and maintaining your current user session, and may collect Personal Information using those cookies in order to enable Company to identify you in connection with the Services and to track use of the Services for purposes consistent with this policy. To make our Site and Services more useful to you, our servers (which may be hosted by a third party service provider) collect information from you, including your browser type, operating system, IP, which may vary from session to session), domain name, and/or a date/time stamp for your visit. Third party advertising companies may also use cookies for tracking purposes. You may be able to block cookies via your browser settings, but this may prevent you from access to certain features of the website.</p>


                        <h4 id="fix-location" >Minors </h4>
                        <p style="font-size: 13px;  color:#666">You must be of age 18 or older to place orders with the Company.</p>


                        <h4 id="fix-location" >Changes to Privacy Policy </h4>
                        <p align="justify" style="font-size: 13px;  color:#666">If we change our privacy policy, we will post those changes on the Site so that users are always aware of what information we collect, how we use it, and under what circumstances, if any, we will disclose it. These changes will be effective immediately. In any event, changes to this Privacy Policy may affect our use of Personal Information that you provided us prior to our notification to you of the changes. Your continued access to and/or use of the Site or the Services following notice of such changes constitutes your assent to, and acceptance of, this policy, including all posted changes for which we have provided notice as described herein.</p>
<hr>
              <br><br>
                </div>



        </div>
</div>














    @stop

    @section('scripts')




    @stop('scripts')
