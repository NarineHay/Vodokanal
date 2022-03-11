<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About_us;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = About_us::first();
        return view('backend.homepage.about_us',compact('about'));
    }

    public function edit_about_us(Request $request,$id){

        $data = About_us::find($id);
    
        $data->update([
            'title'=>$request->title,
            'content'=>$request->content
        ]);
        return redirect()->back()->with('message','успех');
    }
}
