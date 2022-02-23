<?php

namespace App\Http\Controllers;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
     public function sendFeedback(Request $request){

        $request->validate([
            'email' => 'required |email',
            'message' => 'required'
        ]);
       
        $data = new Feedback;
        $data->email=$request->email;
        $data->message=$request->message;
        Mail::to($request->email)->send(new FeedbackMail);
        $data->save();
        return redirect()->back()->with('status', 'You have successfully Created!');
        


        // $insert = SubCategories::create([
        //     'categories_id'=>$request->categories_id,
        //     'name'=>$catigory,
        // ]);
     }
}
