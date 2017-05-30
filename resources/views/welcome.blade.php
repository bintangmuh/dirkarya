@extends('layouts.master')

@section('content')
  @include('components.navbar')

  <header class="jumbo">
    <div class="container">
      <div class="col-sm-6">
        <img src="{{asset('/img/karyaku-full-300px.png')}}" alt="">
        <p>Kumpulkan karya-karya terbaikmu disini. Direktori Karya Mahasiswa yang digunakan sebagai acuan <i>assesment</i> portofolio (non) resmi dari Universitas Negeri Yogyakarta.</p>

        <a href="{{ url('/login')}}" class="btn btn-primary btn-lg">Login</a>
        <a href="{{ url('/register')}}" class="btn btn-default btn-lg">Register</a>
      </div>
    </div>
  </header>

  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <h2 class="text-center title">Karya Mahasiswa</h2>
        <form class="" action="{{ route('search') }}" method="post">
          {{ csrf_field() }}
          <div class="input-group col-sm-5">
            <input class="form-control" type="text" name="search" value="" placeholder="Jelajahi Karya...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="Submit">Cari</button>
            </span>
          </div>
        </form>
        <hr>

        <div class="row">
          <div class="col-sm-12" style="
          -moz-column-width: 10em;
          -webkit-column-width: 25em;
          -moz-column-gap: .5em;
          -webkit-column-gap: .5em;
          ">
            @foreach ($karyas as $karya)
              <div class="card card-karya-grid" style="
              display: inline-block;
              margin:  .5em;
              width:98%;
              ">
                <img src="{{ asset($karya->img_thumb) }}" class="img-responsive" alt="">
                <div class="col-sm-12">
                  <a href="{{ route('karya', ['id' => $karya->id]) }}" class="title">{{ $karya->nama }}</a>
                  <span class="kreator"><a href="{{ route('profileUser', ['id' => $karya->user->id])}}"><i class="mdi mdi-user"></i> {{ $karya->user->name }}</a></span>
                </div>
              </div>
            @endforeach
          </div>
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

{{-- @push('js')
  <script src="{{asset('js/masonry.pkgd.min.js')}}" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.grid').masonry({
    // options
      itemSelector: '.card-karya-grid',
      columnWidth: '.grid-sizer',
      percentPosition: true,
      gutter: 5

    });
  });
  </script>
@endpush --}}
