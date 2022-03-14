<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarif;

class TariffDetailsController extends Controller
{
     public function index(){
         $tarif = Tarif::first();
         return view('backend.homepage.tariff_details',compact('tarif'));
     }


     public function edit_tarif(Request $request ,$id){
        $data = Tarif::first();
        $data->name=$request->name;
        $data->detailes=$request->detailes;
        $data->price=$request->price;

        if($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $filename = $image->getClientOriginalName();
            $image_new = $image->move(public_path('/assets/images/img_index'), $filename);
            $data->img_path = $request->file('img_path')->getClientOriginalName();
        }
       $data->save();
       return redirect()->back()->with('message','Вы успешно редактировали');;
     }
}
