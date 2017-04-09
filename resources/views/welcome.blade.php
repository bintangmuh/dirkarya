@extends('layouts.master')

@section('content')
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
  <header class="jumbo">
    <div class="container">
      <div class="col-sm-6">
        <img src="{{asset('/img/karyaku-full-300px.png')}}" alt="">
        <p>Kumpulkan karya-karya terbaikmu disini. Direktori Karya Mahasiswa yang digunakan sebagai acuan portofolio resmi dari Universitas Negeri Yogyakarta.</p>

        <a href="#" class="btn btn-primary btn-lg">Login</a>
        <a href="#" class="btn btn-default btn-lg">Register</a>
      </div>
    </div>
  </header>

  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <h2 class="text-center title">Karya Mahasiswa</h2>
        <hr>

        <div class="row">
          @foreach ($karyas as $karya)
            <div class="col-xs-6 col-sm-4">
              <div class="karya-thumb card">
                  <div class="col-sm-12">
                    <div class="row">
                      <a href="{{ route('karya', ['id' => $karya->id])}}" class="title">{{ $karya->nama }}</a>
                      <img src="{{asset($karya->img_thumb)}}" class="img-square img-responsive">
                    </div>
                  </div>
                  <div class="col-sm-12 footer">
                    <img src="http://demos.creative-tim.com/material-kit/assets/img/avatar.jpg" class="profil img-circle" alt=""> {{ $karya->user->name }}
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-sm-12 text-center">
            <a href="#" class="btn btn-primary">Lihat lebih banyak</a>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection
