<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_us;

class WelcomeController extends Controller
{
    public function index()
    {
        $Aboutus = About_us::All();
        return view('welcome',compact('Aboutus'));
    }
}
