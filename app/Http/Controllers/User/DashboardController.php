<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Support_task;
use App\Models\Phone_number;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // return view('user.dashboard');
        if (! auth()->user()->isAdmin()) {
            // return redirect(route('user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
            return view('user.dashboard');

        }

        return view('backend.dashboard');
        // dd(auth()->user()->isAdmin());
        // dd(auth()->user()->roles);

    }

    public function savenumber(Request $request)
    {
        $this->validate($request, [

        'phone_number'=> 'required',

        ]);
        
        $input = $request->all();//take all validates lines
        $user = Auth::user()->id;//take my verifide user id
        $insert = Phone_number::create([//put inide datebase
            'user_id'=>$user,
           
            'phone_number'=>$request->phone_number,           
        ]);
        
        return redirect()->back();
    }
    public function delete($id)
    {   
        
        $delete = Phone_number::where('id',$id)->delete();

        return  redirect()->back();

       
    }
    public function indexcars()
    {
        return view('user.mycars.index');

    }
}
