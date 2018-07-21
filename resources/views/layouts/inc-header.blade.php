<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('assets/image/SiriSpace-Logo.png')}}" height="50" title="logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links Classifieds-->

                <style>
                .with-icon{
                  margin-right: 0;
                    min-width: 130px;
                    text-align: center;
                    position: relative !important;
                    line-height: 26px !important;
                    font-weight: 500;

                    border-radius: 50px;
                }
                a.button.border {
                    background-color: transparent;
                    color: #66676b !important;
                    border: 1px solid #ffe11b;
                    padding: 9px 21px;
                }
                </style>


                <li><a href="{{url('Refer')}}"><i class="fa fa-paper-plane "></i> Refer</a></li>
                <li><a href="{{url('News')}}"><i class="fa fa-bullseye"></i> News</a></li>

                @if (Auth::guest())
                    <li><a href="https://sirispace.com/login"><i class="fa fa-user"></i> Login</a></li>

                    <li><a href="https://www.sirispace.com/register" class="button border with-icon"><i class="fa fa-lock"></i> Register</a></li>

                @else
                <li><a href="{{url('my_wishlist')}}"><i class="fa fa-heart-o"></i> wishlist</a></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{ url('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
