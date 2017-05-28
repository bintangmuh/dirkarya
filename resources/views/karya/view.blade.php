@extends('layouts.app')

@section('title',  $karya->nama)

@push('css')
  <link rel="stylesheet" href="{{ asset('/css/jquery.fancybox.min.css') }}">
@endpush
@section('content')
  <div class="container">
    <div class="row">
      @if (Auth::check())
        @if (Auth::user()->id === $karya->user->id)
          <div class="col-sm-12 text-right" style="margin-bottom: 20px;">
              <a href="{{ route('karyaeditview', ['id' => $karya->id]) }}" class="btn btn-primary"><i class="mdi mdi-pencil"></i> Edit Page</a>
              <a href="{{ route('addimage', ['idlorem' => $karya->id]) }}" class="btn btn-primary"><i class="mdi mdi-image"></i> Tambah Gallery</a>
          </div>
        @endif
      @endif
      <div class="col-sm-12">
        <div class="card karya-view">
          <div class="row">
            <div class="col-sm-8">
              <img src="{{ asset($karya->img_thumb) }}" class="img-responsive" alt="test">
            </div>
            <div class="col-sm-4">
              <h3>{{ $karya->nama }}</h3>
              by: <b>{{ $karya->user->name }}</b>
            </div>
          </div>
          <div class="panel-action-karya col-sm-12">
            <a href="#" class="btn btn-primary">Kunjungi Karya</a>
          </div>
          <ul class="col-sm-12 gallery">
            @foreach ($karya->videos as $video)
              <li class="video-gallery-list">
                <a data-fancybox href="https://www.youtube.com/watch?v={{$video->youtube_url}}">
                  <img src="https://img.youtube.com/vi/{{$video->youtube_url}}/maxresdefault.jpg" alt="test">
                  <a data-fancybox href="https://www.youtube.com/watch?v={{$video->youtube_url}}" class="btn btn-info btn-lg"><i class="mdi mdi-play-circle"></i> Video</a>
                </a>
              </li>
            @endforeach

            @foreach ($karya->images as $image)
              <li>
                <a data-fancybox="gallery" href="{{ asset($image->img_url) }}"><img src="{{ asset($image->img_url) }}"></a>
              </li>
            @endforeach
          </ul>
          <div class="col-sm-12 desc">
            <p>
              {!! html_entity_decode($karya->deskripsi) !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('/js/jquery.fancybox.min.js') }}" charset="utf-8"></script>
@endpush
