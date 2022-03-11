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
            'email1' => 'required |email',
            'message1' => 'required'
        ]);
         
        $insert = Feedback::create([
            'email'=>$request->email1,
            'message'=>$request->message1
        ]);
        Mail::to($request->email)->send(new FeedbackMail);
        return redirect()->back()->with('status', 'Ваше письмо успешно отправлено');
     }
}
