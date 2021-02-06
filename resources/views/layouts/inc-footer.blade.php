<footer>

<style>
.text-gray{

color: #ccc;
  }
</style>
    <div class="footer-menu">
    <div class="container" >
        <div class="row">

            <div class="col-md-4">
                <h4>SIRISPACE<span class="head-line"></span></h4>
                <p>Siri Space Co.,Ltd.
                108/3 Sukhumvit 23, Sukhumvit Road, Khlongtoei Nue, Wattana, Bangkok 10110</p>

               <ul>
                <li><span>Tel:</span>  <span style="color:#fdf7ac">095-2323584</span> </li>
                <li><span>Email:</span>  <span style="color:#fdf7ac">siri@sirispace.com</span></li>
                <li><span>Website:</span>  <span style="color:#fdf7ac">www.sirispace.com</span> </li>
                <li><span>Line Id:</span> <a href="https://line.me/ti/p/aNDA3EuDMr?fbclid=IwAR15MhYUicfmb4UOd6bdXtG9LIC_5-Ae7s47jv-o94NYnAjQHOxkLdkGiSY" target="_blank" style="color:#fdf7ac">Sirispace1 </a></li>
               </ul>

            </div>

            <div class="col-md-2">
                <h4>ABOUTt<span class="head-line"></span></h4>
                <ul>
                  <li><a href="{{url('about')}}" ><span class="text-gray">About</span>   </a></li>
                  <li><a href="{{url('contact_us')}}" ><span class="text-gray">Contact</span>   </a></li>
                  @if (Auth::guest())
                  <li><a href="{{url('login')}}" ><span class="text-gray">Login</span>   </a></li>
                  <li><a href="{{url('register')}}" ><span class="text-gray">Register</span> </a>  </li>
                  @else
                  @endif
                  <li><a href="{{url('News')}}"><span>News</span>   </a></li>

                </ul>
            </div>

            <div class="col-md-2">
                <h4>TERMS OF USE<span class="head-line"></span></h4>
                <ul>

                 <li><a href="{{url('privacy')}}"><span>Privacy</span></a>   </li>
                 <li><a href="{{url('terms_condition')}}"><span>Terms and condition</span></a> </li>

                </ul>
            </div>

            <div class="col-md-4">
                <h4>SOCIAL<span class="head-line"></span></h4>
                <p>SIRISPACE is The Original Real Estate Cashback Network in Asia.</p>

            <ul class="social-icons">
                <li>
                    <a class="facebook" href="https://www.facebook.com/sirispace/"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                    <a class="twitter" href="https://twitter.com/siri_space"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a class="google" href="#"><i class="fa fa-youtube"></i></a>
                </li>
            </ul>

            </div>

            <div class="col-lg-12" style="border-top: 1px solid rgba(255,255,255,.06); margin-top:30px;">

                <p class="copyright small" style="padding: 15px 0;">Copyright © Siri Space Co.,Ltd. 2014. All Rights Reserved</p>
            </div>
        </div>
    </div>
    </div>


</footer>
