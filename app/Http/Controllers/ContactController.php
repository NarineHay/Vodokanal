<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\footer;

class ContactController extends Controller
{
     public function  index(){
         $footer = footer::all();
         return view('includes.footer',compact('footer'));
     }
}
