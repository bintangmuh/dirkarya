@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
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
