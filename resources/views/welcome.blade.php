@extends('layouts.master')

@section('content')
  <header class="header header-filter" style="background-image: url('https://siakad2013.uny.ac.id/assets/photos/rektorat.JPG'); background-size:cover; height: 500px;">
    <div class="container">
      <div class="col-md-12 text-center" style="color: #fff; opacity: 100;">
        <h1 class="title" style="color: #fff">Karyaku</h1>
        <h4><i>Unggah Karya-karyamu</i></h4>
        <p>Karyaku adalah tempat karya-karya mahasiswa UNY mempublikasikan karyanya sebagai bentuk portofolio.</p>
        <a href="{{url('/login')}}" class="btn btn-lg btn-info">Login</a>
        <p>atau</p>
        <a href="/register" class="btn btn-primary btn-sm">Daftarkan Diri</a>
      </div>
    </div>
  </header>

  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <h2 class="text-center title">Karya Masuk</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <div class="row">
          @for ($i=0; $i < 4; $i++)
            <div class="col-xs-6 col-sm-4">
              <div class="karya-thumb card">
                  <div class="col-sm-12">
                    <div class="row">
                      <a href="#" class="title">Judul Karya</a>
                      <img src="http://www-static-blogs.operacdn.com/multi/wp-content/uploads/sites/2/2016/09/Opera-Mini-data-saving-apps.png" class="img-responsive">
                    </div>
                  </div>
                  <div class="col-sm-12 footer">
                    <img src="http://demos.creative-tim.com/material-kit/assets/img/avatar.jpg" class="profil img-circle" alt=""> Alexa Andriani
                  </div>
                </div>
            </div>
          @endfor
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
