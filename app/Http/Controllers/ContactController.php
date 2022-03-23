<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class ContactController extends Controller
{
     public function  index(){
         $footer = Footer::all();
         return view('includes.footer',compact('footer'));
     }
}
