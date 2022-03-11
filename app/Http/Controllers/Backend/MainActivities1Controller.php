<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainActivitie1;

class MainActivities1Controller extends Controller
{
    public function index(){
        $data = MainActivitie1::first();
        return view('backend.homepage.main_activities1',compact('data'));
    }

    public function edit_main_activities(Request $request ,$id){

        $main_activities_edit = MainActivitie1::find($id);
        $main_activities_edit->update([
            'title'=>$request->title,
            'content'=>$request->content
        ]);
        return redirect()->back()->with('message','успех');

    }
}
