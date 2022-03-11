<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainActivitie2;


class MainActivities2Controller extends Controller
{
    public function index(){
        $MainActivitie2 = MainActivitie2::first();
        return view('backend.homepage.main_activities2',compact('MainActivitie2'));
    }

    public function edit_main_activities2(Request $request ,$id){
        $MainActivitie2 = MainActivitie2::find($id);

        $MainActivitie2->update([
            'title'=>$request->title,
            'content'=>$request->content
        ]);
        return redirect()->back()->with('message','успех');

    }
}
