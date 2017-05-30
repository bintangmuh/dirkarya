<?php

namespace App\Http\Controllers;
use App\Karya as Karya;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
      $keyword = $request->input('search');

      $karya = Karya::where('nama', 'LIKE', '%'.$keyword.'%')->orWhere('deskripsi', 'LIKE', '%'.$keyword.'%')->get();
      return view('user.search', ['karyas' => $karya, 'search' => $keyword]);

    }
    public function explore() {
      $karya = Karya::all();
      return view('user.search', ['karyas' => $karya]);
    }
}
