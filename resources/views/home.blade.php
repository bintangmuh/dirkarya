@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
          <div class="card dashboard-profile">
            <div class="profile-image">
              <img src="{{ url('img/favicon.png') }}" class="img-square" alt="">
            </div>
            <div class="profile-info">
              <span class="nama">{{ Auth::user()->name }}</span>
              <span class="nim">{{ Auth::user()->nim }}</span>
              <span class="prodi">{{ Auth::user()->prodi }}</span>
            </div>
            <div class="card-footer">
              <a href="{{ route('profileeditview') }}">Edit Profil</a>
            </div>
          </div>
          <a href="{{ route('buatkaryabaru')}}" class="btn btn-block btn-primary"><i class="mdi mdi-file"></i> Buat Karya Baru</a>
        </div>

        <div class="col-sm-9">
            @foreach ($karyas as $karya)
              <div class="karya-card card">
                  <div class="col-sm-3 thumbs">
                    <div class="row">
                      <img src="{{ asset($karya->img_thumb) }}">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <h3>{{ $karya->nama }}</h3>
                    <small> By: <a href="{{ route('profileUser', ['id' => $karya->user->id ])}}"><b>{{ $karya->user->name }}</a></b></small>
                    <div class="karya-desc">{!! $karya->deskripsi !!}</div>
                    <a href="{{route('karya', ['id' => $karya->id])}}" class="btn btn-primary">Lihat Selengkapnya</a>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
