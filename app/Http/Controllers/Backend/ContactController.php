<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footer;

class ContactController extends Controller
{
   public function index(){
       $footer = footer::All();
     return view('backend.homepage.footer_contact',compact('footer'));
   }

   public function update(Request $request){
    $footer = footer::first();

    $footer->update([
        'number'=>$request->number,
        'number2'=>$request->number2,
        'number3'=>$request->number3,
        'address'=>$request->address,
        'email'=>$request->email
    ]);

    return redirect()->back()->with('message','Вы успешно редактировали');
   }
}
