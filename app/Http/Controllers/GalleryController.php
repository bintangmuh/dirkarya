<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Galleries as Galleries;
use App\Karya as Karya;
use App\Video as Video;
use Auth;
use Carbon\Carbon as Carbon;

class GalleryController extends Controller
{
    function youtube_id_from_url($url) {
      $pattern =
          '%^# Match any YouTube URL
          (?:https?://)?  # Optional scheme. Either http or https
          (?:www\.)?      # Optional www subdomain
          (?:             # Group host alternatives
            youtu\.be/    # Either youtu.be,
          | youtube\.com  # or youtube.com
            (?:           # Group path alternatives
              /embed/     # Either /embed/
            | /v/         # or /v/
            | /watch\?v=  # or /watch\?v=
            )             # End path alternatives.
          )               # End host alternatives.
          ([\w-]{10,12})  # Allow 10-12 for 11 char YouTube id.
          $%x'
          ;
      $result = preg_match($pattern, $url, $matches);
      if (false !== $result) {
          return $matches[1];
      }
      return false;
    }


    public function viewUploader(Karya $id) {
      $gallery = Galleries::where('karya_id', $id->id)->get();
      $karya =  $id;
      return view('karya.addimages',
      [
        'id' => $id,
        'karya' => $karya,
        'galleries' => $gallery
      ]);
    }

    // Multiupload Image
    public function multiupload($id, Request $request) {
      $validator = Validator::make($request->all(), [
        'imagegallery.*' => 'image|mimes:jpeg,jpg,png,gif'
      ]);

      // validator fails
      if ($validator->fails()) {
          return Redirect::back()
                ->withErrors($validator)
                ->withInput();
      }

      try {
        foreach ($request->file('imagegallery') as $input) {
          $filename = "/gallery-karya-".$id."-".Carbon::now()->format('YmdHis').rand().".".$input->getClientOriginalExtension(); //save name of pictures
          $path = $input->storeAs('public', $filename); //store to public storage

          $gallery = new Galleries();
          $gallery->karya_id = $id;

          $gallery->user_id = Auth::user()->id;

          $gallery->img_url = "storage" . $filename; //write on database
          $gallery->save();
        }
      } catch (Exception $e) {
        return Redirect::back()->with('errors', 'Gambar telah berhasil ditambahkan');
      }

      return Redirect::back()->with('success', 'Gambar telah berhasil ditambahkan');
    }

    // adding videos
    public function videoEmbed(Karya $id, Request $request){
      $youtubeurl = $this->youtube_id_from_url($request->input('video'));
      $videos = Video::create([
        'karya_id' => $id->id,
        'youtube_url' => $youtubeurl
      ]);

      return Redirect::back()->with('success', 'Video telah berhasil ditambahkan : ' . $youtubeurl);
    }

    public function upload(Karya $id, Request $request) {
      $validator = Validator::make($request->all(), [
        'imagegallery' => 'image|mimes:jpeg,jpg,png,gif'
      ]);

      if ($validator->fails()) {
          return Redirect::back()
                ->withErrors($validator)
                ->withInput();
      }

      $filename = "/gallery-karya-".$id->id."-".Carbon::now()->format('YmdHis').".".$request->file('imagegallery')->getClientOriginalExtension(); //save name of pictures
      $path = $request->file('imagegallery')->storeAs('public', $filename); //store to public storage

      $gallery = new Galleries();
      $gallery->karya_id = $karya->id;
      $gallery->user_id = Auth::user()->id;
      $gallery->img_url = "storage" . $filename; //write on database
      $gallery->save();

      return redirect()->back();
      // return redirect()->route('karya', ['id' => $gallery->karya_id]);
    }

    public function removeimage($postid, $id) {
      $gallery = Galleries::findOrFail($id);
      $name = $gallery->img_url;
      $gallery->delete();

      return redirect()->back()->with('success', 'Gambar ' .$name. ' telah berhasil dhapus');
    }

    public function videoDelete(Karya $id, Video $video) {
      $video->delete();
      return redirect()->back()->with('success', 'Video sudah dihapus');
    }

}
