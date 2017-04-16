@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-sm-8">
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
      <div class="card">
        <div class="col-sm-12">
          <form class="" action="{{ route('addimagepost', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="imagegallery">Masukkan Gambar Disini</label>
              <input type="file" id="imagegallery" name="imagegallery" value="">
            </div>
            <div class="card">
              <img id="preview" src="" alt="" style="max-height: 300px">
            </div>
            <input type="submit" name="" value="Upload" class="btn btn-primary">
          </form>
        </div>
      </div>

      <div class="card">
        <div class="col-sm-12">
          <h4 class="title">Gambar yang telah diupload</h4>
        </div>
        <div class="col-sm-12">
          <ul>
            @foreach ($galleries as $gallery)
              <li>{{ $gallery->img_url }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript">
    $('#preview').hide();
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imagegallery").change(function() {
      console.log(this);
      readURL(this);
      $('#preview').show('slow');
    });
  </script>
@endpush
