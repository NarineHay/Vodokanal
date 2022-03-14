<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Main;

class MainHomePageController extends Controller
{
    public function index(){
        $Main = Main::first();
        return  view('backend.homepage.main_home_page',compact('Main'));
    }

    public function edit_main_home(Request $request){

        $data = Main::first();
        $data->url=$request->url;
        if($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $filename = $image->getClientOriginalName();
            $image_new = $image->move(public_path('/assets/images/img_index'), $filename);
            $data->img_path = $request->file('img_path')->getClientOriginalName();
        }
       $data->save();
       return redirect()->back()->with('message','Вы успешно редактировали баннер');;

    }
}
