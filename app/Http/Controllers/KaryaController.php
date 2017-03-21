<?php

namespace App\Http\Controllers;
use App\Karya as Karya;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon as Carbon;

class KaryaController extends Controller
{
  public function index()
  {
    $karya = Karya::all();
    return $karya;
  }

  public function show($id)
  {
    $karya = Karya::find($id);
    return view('karya.view', ['karya' => $karya]);
  }

  public function postCreate(Request $request)
  {
    $karya = new Karya();
    $karya->nama = $request->input('judul');
    $karya->deskripsi = $request->input('deskripsi');
    if (($request->hasFile('thumbs'))) {
      $filename = "karya-".Carbon::now()->format('YmdHis') .'.jpg';
      $path = $request->file('thumbs')->storeAs('public', $filename);
      $karya->img_thumb = "storage/" . $filename;
    } else {
      $karya->img_thumb = 'default.jpg';
    }
    $karya->user_id = Auth::user()->id;
    $karya->save();

    return redirect()->route('karya', ['id' => $karya->id]);
  }

  public function createView()
  {
    return view('karya.create');
  }
  public function edit($id)
  {

  }
  public function postEdit($id)
  {

  }
  public function delete($id)
  {

  }
}