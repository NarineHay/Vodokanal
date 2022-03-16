<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Mail\Supportfeedbackmail;
use Illuminate\Support\Facades\Mail;

class FeeddbackController extends Controller
{
  public function index(){

      $Feedback = Feedback::All();
      return view("backend.support.feedback_index",compact('Feedback'));
  }


  public  function show(Request $request , $id){
     
     $Feedback = Feedback::find($id);
     $Feedback->update([
      'status'=>true
  ]);
     return view('backend.support.show_feedback',compact('Feedback'));

  }

  public function send_mail(Request $request){

          $details = [
            'message' => $request->message,
        ];
        
        Mail::to($request->mail)->send(new Supportfeedbackmail($details));
        return redirect()->back()->with('status', 'Ваше письмо успешно отправлено');

        

      
  }

  public function delete($id){

    $Feedback = Feedback::find($id)->delete();
    return redirect()->back()->with('delate', 'Удалено успешно');
  }

  
}
