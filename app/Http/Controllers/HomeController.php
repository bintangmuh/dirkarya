<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karya as Karya;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $karya = Karya::all();
      return view('home', ['karyas' => $karya]);
    }

    public function indexdua()
    {
        $karya = Karya::all();
        return view('home2', ['karya' => $karya]);
    }

    public function karya($id)
    {
      return view('user.karya');
    }
}
