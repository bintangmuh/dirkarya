<?php

namespace App\Http\Controllers;
use Validator;
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
    $validator = Validator::make($request->all(), [
      'judul' => 'required|max:255',
      'deskripsi' => 'required',
      'thumbs' => 'required|mimes:jpg,jpeg,png|image',
    ]);

    if ($validator->fails()) {
      return redirect('karya/new')
      ->withErrors($validator)
      ->withInput();
    }

    //store to database
    $karya = new Karya();
    $karya->nama = $request->input('judul');
    $karya->deskripsi = $request->input('deskripsi');

    // Get file input
    if (($request->hasFile('thumbs'))) {

      $filename = "karya-".Carbon::now()->format('YmdHis') .'.jpg'; //save name of pictures
      $path = $request->file('thumbs')->storeAs('public', $filename); //store to public storage
      $karya->img_thumb = "storage/" . $filename; //write on database

    } else { //if apps had'nt thumbs
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
    $karya = Karya::findOrFail($id);
    return view('karya.edit', ['karya' => $karya]);
  }
  public function postEdit($id, Request $request)
  {
    $karya = Karya::findOrFail($id);

    $validator = Validator::make($request->all(), [
      'judul' => 'required|max:255',
      'deskripsi' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect()->route('karyaeditview', ['id' => $karya->id])
      ->withErrors($validator)
      ->withInput();
    }

    $karya->nama = $request->input('judul');
    $karya->deskripsi = $request->input('deskripsi');

    // Get file input
    if (($request->hasFile('thumbs'))) {

      $filename = "karya-".Carbon::now()->format('YmdHis') .'.jpg'; //save name of pictures
      $path = $request->file('thumbs')->storeAs('public', $filename); //store to public storage
      $karya->img_thumb = "storage/" . $filename; //write on database

    }

    $karya->save();

    return redirect()->route('karyaeditview', ['id' => $karya->id]);

  }

  public function delete($id)
  {

  }
}
