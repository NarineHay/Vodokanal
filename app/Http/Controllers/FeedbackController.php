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
         
        $insert = Feedback::create([
            'email'=>$request->email,
            'message'=>$request->message
        ]);
        Mail::to($request->email)->send(new FeedbackMail);
        return redirect()->back()->with('status', 'Ваше письмо успешно отправлено');
     }
}
