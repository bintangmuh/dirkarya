<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Galleries as Galleries;
use Auth;
use Carbon\Carbon as Carbon;

class GalleryController extends Controller
{
    public function viewUploader($id) {
      $gallery = Galleries::where('karya_id', $id)->get();
      return view('karya.addimages',
      [
        'id' => $id,
        'galleries' => $gallery
      ]);
    }

    public function upload($id, Request $request) {
      $validator = Validator::make($request->all(), [
        'imagegallery' => 'image|mimes:jpeg,jpg,png,gif'
      ]);

      if ($validator->fails()) {
          return Redirect::back()
                ->withErrors($validator)
                ->withInput();
      }

      $filename = "gallery-karya-".$id."-".Carbon::now()->format('YmdHis').".".$request->file('imagegallery')->getClientOriginalExtension(); //save name of pictures
      $path = $request->file('imagegallery')->storeAs('public', $filename); //store to public storage

      $gallery = new Galleries();
      $gallery->karya_id = $id;
      $gallery->user_id = Auth::user()->id;
      $gallery->img_url = "storage" . $filename; //write on database
      $gallery->save();

      return redirect()->route('karya', ['id' => $gallery->karya_id]);

    }


}
