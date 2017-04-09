<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User as User;

class UserController extends Controller
{
    public function editViewProfile() {
      $user = User::findOrFail(Auth::user()->id);

      return view('user.edit', ['user' => $user]);
    }

    public function editProfile(Request $request){
      $user = User::findOrFail(Auth::user()->id);

      $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'email' => 'required',
        'nim' => 'required',
        'prodi' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()
        ->route('profileeditview')
        ->withErrors($validator)
        ->withInput();
      }

      $user->name = $request->input('nama');
      $user->email = $request->input('email');
      $user->nim = $request->input('nim');
      $user->prodi = $request->input('prodi');

      $user->save();

      return redirect()->route('profileeditview')->with('status', 'Profil Berhasil Terupdate');
    }

    public function changePass(){
      # code...
    }

    public function changePicture(){
      # code...
    }
}
