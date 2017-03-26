@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="col-sm-12">
            <h2 class="title">{{ $karya->nama }}</h2>
          </div>
          <img src="{{ asset($karya->img_thumb) }}" class="img-responsive" alt="test">
          <div class="col-sm-12">
            <p>
              {{ $karya->deskripsi }}
            </p>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card profile-card">
          <br>
          <div class="col-xs-4">
            <img src="{{ asset('/img/christian.jpg')}}" class="img-circle img-responsive" alt="">
          </div>
          <div class="col-xs-8">
            <h4 class="title">{{ $karya->user->name }}</h4>
            <p>
              <span>Pendidikan Teknik Informatika</span>
              <span>14520241057</span>
            </p>
          </div>
          <div class="col-sm-12">
            <a href="#" class="btn btn-info">Lihat Profil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
