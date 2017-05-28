@extends('layouts.app')

@section('title', 'Error 403')

@section('content')
  <div class="container">
    <div class="alert alert-warning text-center">
      <h3 style="color:white">403 Forbidden Action</h3>
      <p>Anda mengakses sesuatu yang terlarang dan bukan milik anda</p>
    </div>
  </div>
@endsection
