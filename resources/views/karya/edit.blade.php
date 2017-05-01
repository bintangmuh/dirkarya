@extends('layouts.app')

@section('content')
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{ route('karya', ['id' => $karya->id ])}}">{{ $karya->nama }}</a></li>
      <li class="active">Edit Detail</li>
    </ol>
    <h2>Sunting Karya "{{ $karya->nama }}"</h2>
    <div class="row">
      <div class="col-sm-8">
        {{-- if errors throw this --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h3 style="color: #fff; margin: 10px;">Error!</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h3 style="color: #fff; margin: 10px;">Berhasil</h3>
                <p>{{ session('success')}}</p>
            </div>
        @endifU
        <div class="card">
          <form class="" action="{{route('karyaeditpost', ['id' => $karya->id ])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-12">
              <h4 class="title">Data Karya</h4>
              <hr>
            </div>

            <div class="">
              <div class="col-sm-12">
    							<div class="form-group ">
    								<div class="col-sm-12">
                      <label class="control-label">Judul Karya</label>
    								</div>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="judul" required value="{{ $karya->nama }}">
                    </div>
    							</div>
    					</div>

              <div class="col-sm-12">
    							<div class="form-group ">
    								<div class="col-sm-12">
                      <label class="control-label">Deskripsi</label>
    								</div>
                    <div class="col-sm-12">
                      <textarea name="deskripsi" rows="8" cols="80" class="form-control" name="deskripsi">{{ $karya->deskripsi }}</textarea>
                    </div>
    							</div>
    					</div>

              <div class="col-sm-12">
    							<div class="form-group ">
    								<div class="col-sm-12">
                      <label class="control-label">Thumbnail</label>
    								</div>
                    <div class="col-sm-12 file-form">
                      <input type="file" id="thumbsprevup" name="thumbs">
                      <div class="card">
                        <img id="thumbspreview" src="{{ asset($karya->img_thumb)}}" alt="" class="img-responsive">
                      </div>
                    </div>
    							</div>
    					</div>

              <div class="col-sm-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Masukkan</button>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/js/tinymce/tinymce.min.js') }}" charset="utf-8"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#thumbspreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#thumbsprevup").change(function() {
      console.log(this);
      readURL(this);
      $('#thumbspreview').show('slow');
    });
  </script>
@endsection
