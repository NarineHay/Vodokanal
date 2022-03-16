<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support_task;
use App\Models\User;
use App\Mail\UserTaskMail;
use Illuminate\Support\Facades\Mail;

class SupportTaskController extends Controller
{
     public function index(){
        $Contracts = Support_task::with('user')->get();
         return view('backend.support.index_user_message',compact('Contracts'));
     }

     public function show($id){
        $Contracts = Support_task::with('user')->find($id);
        $Contracts->update([
            'status'=>true
        ]);
         return view('backend.support.show_user_message',compact('Contracts'));
     }

     public function sendmail(Request $request){

        $details = [
            'message' => $request->message,
        ];
        Mail::to($request->mail)->send(new UserTaskMail($details));
       
        return redirect()->back()->with('status', 'Ваше письмо успешно отправлено');

     }

     public function delete($id){

       $Support_task = Support_task::find($id)->delete();
       return redirect()->back()->with('delate', 'Удалено успешно');

     }

     
}