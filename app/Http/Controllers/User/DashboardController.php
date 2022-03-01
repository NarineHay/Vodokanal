<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Phone_number;  
use App\Models\balance; 
use App\Models\User; 
use App\Models\Card; 
use Illuminate\Support\Facades\Validator;

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

            $cards=Auth::user();
            // dd($cards);
            return view('user.dashboard',compact('cards'));
            
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
        $input = $request->all();
        $user = Auth::user()->id;
        
        $insert = Phone_number::create([
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
    
    public function CreateBlance(Request $request)
    {
        $validArr = [ "balance"  => "required" ];
        
        $this->validate($request,$validArr);
        $input = $request->all();//take all validates lines
         
            $insert = Card::create([//put inide datebase
            'balance'=>$request->balance,
          
        ]);
          return redirect()->back();
    }

}
