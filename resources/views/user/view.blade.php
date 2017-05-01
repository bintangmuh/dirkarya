@extends('layouts.app')


@section('content')
<div class="container">
  <div class="col-sm-3">
    <div class="card dashboard-profile">
      <div class="profile-image">
        <img src="{{ url('img/favicon.png') }}" class="img-square" alt="">
      </div>
      <div class="profile-info">
        <span class="nama">{{ $user->name }}</span>
        <span class="nim">{{ $user->nim }}</span>
        <span class="prodi">{{ $user->prodi }}</span>
      </div>
    </div>
  </div>

  <div class="col-sm-9 grid" style="padding: 0px;">
    <div class="row">
      <div class="grid-sizer" style="width:45%">

      </div>
      @foreach ($user->karya as $karya)
        <div class="card card-karya-grid">
          <img src="{{ asset($karya->img_thumb) }}" class="img-responsive" alt="">

          <div class="col-sm-12">
            <span class="title">{{ $karya->nama }}</span>
            <div class="desc">
              {!! $karya->deskripsi !!}
            </div>
          </div>
          <div class="col-sm-12">
            <a href="{{ route('karya', ['id' => $karya->id ]) }}" class="btn btn-primary btn-block">Lihat Selengkapnya</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection


@push('js')
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
@endpush
