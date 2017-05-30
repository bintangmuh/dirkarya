@extends('layouts.app')

@section('title', 'File Upload')
@section('content')
  <div class="container">
    <div class="col-sm-8">
      <ol class="breadcrumb">
        <li><a href="{{ route('karya', ['id' => $karya->id ])}}">{{ $karya->nama }}</a></li>
        <li class="active">Tambah Gambar Gallery</li>
      </ol>
      <h3>Gallery File Upload</h3>
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
      @endif
        <div class="card">
          <div class="col-sm-12">
            <form class="" action="{{ route('addimagepost', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="imagegallery">Masukkan Gambar Disini</label>
                <input type="file" id="imagegallery" name="imagegallery[]" multiple>
              </div>
              <div class="card">
                <img id="preview" src="" alt="" style="max-height: 300px">
              </div>
              <div class="form-group">
                <input type="submit" name="" value="Upload" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="col-sm-12">
            <h4 class="title">Gambar yang telah diupload</h4>
          </div>
          <div class="col-sm-12">
            <ul class="gallery">
              @foreach ($galleries as $gallery)
                <div class="img-squared-gallery">
                  <img src="{{ asset($gallery->img_url) }}" alt="" class="img-responsive" style="height: 300px; display: inline;">
                  <a href="{{route('deleteimage', ['postid' => $gallery->karya_id, 'id' => $gallery->id])}}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                </div>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="card">
          <div class="col-sm-12">
            <h3>Tambah <i style="color: red" class="mdi mdi-youtube-play"></i> Youtube Video</h3>
            <form class="" action="{{ route('videoembedpost', ['id' => $id])}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="video">Masukkan Video Disini</label>
                <input type="text" class="form-control" id="video" name="video" placeholder="contoh URL: https://www.youtube.com/watch?v=FM7MFYoylVs">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="button" value="Submit Video">Submit Video</button>
              </div>
            </form>
            <p>
              <h4>List Video</h4>
              <ul class="video-list">
              @foreach ($karya->videos as $video)
                <li>
                  <a target="__blank" href="https://www.youtube.com/watch?v={{$video->youtube_url}}"><img src="https://img.youtube.com/vi/{{$video->youtube_url}}/default.jpg" alt=""></a>

                  <a href="{{route('videodelete', ['id' => $gallery->karya_id, 'video' => $video->id])}}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                </li>
              @endforeach
              </ul>
            </p>
          </div>
        </div>
    </div>

  </div>

@endsection

@push('js')
  <script type="text/javascript">
    $('#preview').hide();
    function readURL(input) {
      if (input.files) {
        var reader = new FileReader();
        reader.onload = function(e) {
          for (var i = 0; i < input.files.length; i++) {
            console.log(input.files[i]);
          }
          $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imagegallery").change(function() {
      readURL(this);
      $('#preview').show('slow');
    });


  </script>
@endpush
