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
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{asset('/img/logofull-black.png')}}" class="img-responsive navbar-img" alt="Brand">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if (!Auth::guest())
              <ul class="nav navbar-nav navbar-left">
                <li><a href="{{ url('/home') }}"><span class="mdi mdi-home"></span> Home</a></li>
                <li><a href="{{ url('/profile') }}"><i class="mdi mdi-account"></i> Profil</a></li>
                <li><a href="{{ url('/search') }}"><i class="mdi mdi-earth"></i> Jelajah</a></li>
              </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ url('img/favicon.png') }}" class="img-profile">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/profile/edit') }}">Edit Profil</a>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
