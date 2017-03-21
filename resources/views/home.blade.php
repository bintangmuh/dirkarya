@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="container-fluid">
              <img src="" alt="">
            </div>
            <div class="col-sm-12">
              <h3>Bintang Muhammad <small>14520241057</small></h3>
            </div>
          </div>
          <a href="{{route('buatkaryabaru')}}" class="btn btn-info">
            Karya Baru
          </a>
        </div>

        <div class="col-lg-8">
            @foreach ($karyas as $karya)
              <div class="karya-card card">
                  <div class="col-sm-3 thumbs">
                    <div class="row">
                      <img src="{{ asset($karya->img_thumb) }}">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <h3>{{ $karya->nama }}</h3>
                    <small> By: <b>{{ $karya->user->name }}</b></small>
                    <p>{{ $karya->deskripsi }}</p>
                    <a href="{{route('karya', ['id' => $karya->id])}}" class="btn btn-info">Lihat Selengkapnya</a>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
