<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support_task;

use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {   
        
        return view('user.support.index');
    }
   
    public function support_tasks(Request $request)
    {
        $this->validate($request, [

        'theme'=> 'required',
        'message'=> 'required',  

        ]);

        $input = $request->all();//take all validates lines
        $user = Auth::user()->id;//take my verifide user id
        $insert = Support_task::create([//put inide datebase
            'user_id'=>$user,
            'theme'=>$request->theme,
            'message'=>$request->message,
            
        ]);
        
        return view('user.support.supportaproved');
    }
    public function show_aproved_smm()
    {
        return view('user.support.supportaproved');
    }
    
    
 
}
