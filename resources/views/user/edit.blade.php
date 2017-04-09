@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

    </div>
    <div class="row">
      <div class="col-sm-8">
        @if (count($errors) > 0)
            <div class="alert alert-danger fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <h4 style="color: #fff; margin: 10px;"><i class="mdi mdi-alert-circle"></i> Error!</h4>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <h4 style="color: #fff; margin: 10px;"><i class="mdi mdi-clipboard-check"></i> Berhasil!</h4>
              <p>{{ session('status') }}</p>
            </div>
        @endif

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#changedata"><i class="mdi mdi-account-settings-variant"></i> Edit Detail Profile</a></li>
          <li><a data-toggle="tab" href="#changepass"><i class="mdi mdi-key-change"></i> Ganti Password</a></li>
          <li><a data-toggle="tab" href="#changepicture"><i class="mdi mdi-image"></i> Ganti Gambar Profil</a></li>
        </ul>
        <div class="card">
          <div class="tab-content">
            <div id="changedata" class="tab-pane fade in active">
              <form action="{{ route('profilepostdata') }}" method="post">
                {{ csrf_field() }}
                <div class="col-sm-12">
                  <h4>Edit Profile</h4>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="nama" class="label-control">Nama : </label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="email" class="label-control">Email : </label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="nim" class="label-control">NIM : </label>
                    <input type="text" id="nim" name="nim" class="form-control" value="{{ $user->nim }}">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="prodi" class="label-control">Prodi : </label>
                    <input type="text" id="prodi" name="prodi" class="form-control" value="{{ $user->prodi }}">
                </div>

                <div class="col-sm-12 form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
              </form>
            </div>

            {{-- change pass --}}
            <div id="changepass" class="tab-pane fade">
              <div class="col-sm-12">
                <h4>Change Password</h4>
              </div>

              <form class="" action="index.html" method="post">
                <div class="col-sm-12 form-group">
                    <label for="oldpass" class="label-control">Password Lama : </label>
                    <input type="password" id="oldpass" name="oldpass" class="form-control">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="newpass" class="label-control">Password Baru : </label>
                    <input type="password" id="newpass" name="newpass" class="form-control">
                </div>
                <div class="col-sm-12 form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
              </form>
            </div>
            {{-- end change password --}}

            {{-- Change Picture Form --}}
            <div id="changepicture" class="tab-pane fade">
              <div class="col-sm-12">
                <h4>Change Picture</h4>
              </div>

              <form class="" action="index.html" method="post">
                <div class="col-xs-3">
                  <img src="http://karyaku.dev/img/logofull-black.png" alt="" class="img-responsive">
                </div>
                <div class="col-xs-9">
                  <form class="" action="index.html" method="post" enctype="multipart/form-data">
                    <div class="form-group">

                    </div>
                  </form>
                </div>
              </form>
            </div>
            {{-- end change picture --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
