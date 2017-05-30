@extends('layouts.app')

@section('title', 'Jelajah Karya')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Jelajah Karya</h1>
        <form class="" action="{{ route('search') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <input class="form-control" type="text" name="search" value="" placeholder="Jelajahi Karya...">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="col-sm-12">
        @if (isset($search))
          <div class="alert alert-default" role="alert">
            <h4>Menampilkan hasil pencarian "{{ $search }}"</h4>
          </div>

        @endif
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
