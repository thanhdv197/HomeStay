<!-- start Header -->
<header id="header" class="overflow-x-hidden-xss">

    <!-- start Navbar (Header) -->
    <nav class="navbar navbar-default navbar-fixed-top with-slicknav">

        <div class="container">

            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/index')}}">EXTRETION</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse navbar-arrow pull-left">

                <ul class="nav navbar-nav" id="responsive-menu">
                    <!-- nav HOME -->

                    <li class="dropdown bt-dropdown-click">
                        <a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Home
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="currency-dropdown">
                            <li><a href="{{ url('/index')}}"> Home 1</a></li>
                            <li><a href="{{ url('/index')}}"> Home 2</a></li>
                            <li><a href="{{ url('/index')}}"> Home 3</a></li>
                        </ul>
                    </li>

                    <!-- nav HOTELS -->

                    <li class="dropdown bt-dropdown-click">
                        <a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Accommodation Types
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="currency-dropdown">

                            @foreach ($accommodation as $item)
                                <li><a href="{{ route('accommlists',$item->id) }}"> {{ $item->accommodation_type_name }}</a></li>
                            @endforeach

                        </ul>
                    </li>

                    <!-- nav Destinations -->

                    <li class="dropdown bt-dropdown-click">
                        <a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Destinations
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="currency-dropdown">

                            @foreach ($cities as $item)
                            <li><a href="{{ route('citylists',$item->id) }}"> {{ $item->city_name }}</a></li>
                            @endforeach
                           
                        </ul>
                    </li>

                    <!-- nav PAGES -->

                    <li class="dropdown bt-dropdown-click">
                        <a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Pages
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="currency-dropdown">
                            <li><a href="{{ url('/index')}}"> Dashboard 1</a></li>
                            <li><a href="{{ url('/index')}}"> About Us 2</a></li>
                            <li><a href="{{ url('/index')}}"> Blog 3</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="pull-right">

                <div class="navbar-mini">
                    <ul class="clearfix">
                        <li class="dropdown bt-dropdown-click">
                            <a id="currency-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ion-social-usd hidden-xss"></i> Dollar
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="currency-dropdown">
                                <li><a href="#"><i class="ion-social-usd"></i> Dollar</a></li>
                                <li><a href="#"><i class="ion-social-euro"></i> Europe</a></li>
                                <li><a href="#"><i class="ion-social-yen"></i> Yen</a></li>
                            </ul>
                        </li>
                        <li class="dropdown bt-dropdown-click">
                            <a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ion-android-globe hidden-xss"></i> English
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">France</a></li>
                                <li><a href="#">Japanese</a></li>
                            </ul>
                        </li>
                        @if (!Auth::user())

                        <li class="user-action">
                            <a data-toggle="modal" href="#loginModal" class="btn btn-primary btn-inverse">Sign up/in</a>
                        </li>

                        @else

                        <li class="dropdown bt-dropdown-click user-action">
                            <a class="btn btn-primary btn-inverse btn-loged-in dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="avatar" src="{{ Auth::user()->avatar }}" alt="image" />
                                Hi, {{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                                <li><a href="{{ route('profile') }}">Profile</a></li>

                                @if(Auth::user()->level == 'admin')
                                <li><a href="{{ route('admin-user-list') }}">Admin manager</a></li>
                                @endif

                                <li><a href="{{ route('booking') }}">My Bookings</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>

                        @endif
                    </ul>
                </div>

            </div>

        </div>

        <div id="slicknav-mobile"></div>

    </nav>
    <!-- end Navbar (Header) -->

</header>
<!-- end Header -->