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
                <img src="{{url('assets/image/shutterstock_172030709.jpg')}}" height="45" title="logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links Classifieds-->
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Rent <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{url('property-2-3')}}">House</a></li>
                            <li><a href="{{url('property-2-1')}}">Townhouse</a></li>
                            <li><a href="{{url('property-2-2')}}">Condo</a></li>
                            <li><a href="{{url('property-2-4')}}">Commercial</a></li>
                        </ul>
                    </li>


                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Buy <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                              <li><a href="{{url('property-1-3')}}">House</a></li>
                              <li><a href="{{url('property-1-1')}}">Townhouse</a></li>
                              <li><a href="{{url('property-1-2')}}">Condo</a></li>
                              <li><a href="{{url('property-1-4')}}">Commercial</a></li>
                            </ul>
                        </li>

                <li><a href="{{url('classifieds_siri')}}"><i class="fa fa-bullseye"></i> Classifieds</a></li>

                @if (Auth::guest())
                    <li><a href="{{url('login')}}"><i class="fa fa-user"></i> Login</a></li>
                    <li><a href="{{url('register')}}"><i class="fa fa-lock"></i> Register</a></li>
                @else
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
