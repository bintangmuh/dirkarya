@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Masukan Karya Baru</h2>
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <form class="" action="{{route('postkaryabaru')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-12">
              <h4 class="title">Data Karya</h4>
              <hr>
            </div>
            <div class="">
              <div class="col-sm-12">
    							<div class="form-group ">
    								<div class="col-sm-2">
                      <label class="control-label">Judul Karya</label>
    								</div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="judul">
                    </div>
    							</div>
    					</div>

              <div class="col-sm-12">
    							<div class="form-group ">
    								<div class="col-sm-2">
                      <label class="control-label">Deskripsi</label>
    								</div>
                    <div class="col-sm-10">
                      <textarea name="deskripsi" rows="8" cols="80" class="form-control" name="deskripsi"></textarea>
                    </div>
    							</div>
    					</div>

              <div class="col-sm-12">
    							<div class="form-group ">
    								<div class="col-sm-2">
                      <label class="control-label">Thumbnail</label>
    								</div>
                    <div class="col-sm-10">
                      <label class="btn btn-success"><span class="mdi mdi-file-image"></span><input type="file" name="thumbs"></label>
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
