<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terminal_location;

class TerminalController extends Controller
{
   public function index(){
      $Terminal_location = Terminal_location::All();
       return view('backend.terminal.index_terminal',compact('Terminal_location'));
   }

   public function show_new_terminal(Request $request){

     return view('backend.terminal.add_new_terminal');
   }

   public function store(Request $request){

    

    $this->validate($request,[
        'ip'=>'required',
        'name'=>'required',
        'address'=>'required',
        'number'=>'required|numeric',
        'lat'=>'required',
        'lng'=>'required'
    ]);

    Terminal_location::create([
        'ip'=>$request->ip,
        'name'=>$request->name,
        'address'=>$request->address,
        'number'=>$request->number,
        'lat'=>$request->lat,
        'lng'=>$request->lng,
    ]);

    return redirect()->back()->with('message','Вы успешно сохранили');

   }
}
