<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <a class="navbar-brand" href="#" style="color: bisque;font-weight:bold;font-size:20px">ArabTube</a>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{url('/')}}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{ route('AllChannels') }}">Channels</a></li>
                                        <!-- Authentication Links -->
                                        @guest
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                        @if (Route::has('login'))
                                            <li>
                                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif


                                        @else

                                            <li><a>{{ Auth::user()->name }}</a>
                                                <ul class="submenu">
                                                    <li> <a href="{{ route('channel.index', ['channel' => Auth::user()->channel])}}">

                                                        {{ Auth::user()->channel->name}}
                                                    </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('videos.all',['channel'   => Auth::user()->channel]) }}">My Videos</a>
                                                    </li>
                                                    <li><a href="{{ url('/allVideos') }}">All Videos</a></li>

                                                    <li><a href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{route('video.create' , ['channel' => Auth::user()->channel ])}}">
                                                    Add New Video
                                                </a>
                                            </li>
                                        @endguest

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="header-right f-right d-none d-lg-block">
                                <!-- Heder social -->

                                <!-- Search Nav -->
                                <div class="nav-search search-switch">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
