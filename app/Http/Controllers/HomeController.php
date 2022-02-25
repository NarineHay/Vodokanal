<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_us;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Aboutus = About_us::All();
        return view('home',compact('Aboutus'));
    }
}
