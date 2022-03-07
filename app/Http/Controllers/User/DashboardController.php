<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Phone_number;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
            // $phone_number=Phone_number::where('user_id', Auth::user()->id)->first();
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
        
        $this->validate($request, [
        'balance'=> 'required',
        'card_id'=> 'required',

        ]); 


        $cardbalance=Card::find($request->card_id)->balance;
        $cardFind = Card::find($request->card_id);
        $cardbalance += $request->balance;

        // if($cardFind['balance']<= 300){
        //     return redirect()->back()->withErrors(['balance' => 'ededed']);
        // }

        $cardFind->update([
            'balance'=>$cardbalance,
        ]);     

        $balance = Auth::user()->balance;
        $balance -= $request->balance;
        Auth::user()->update([
          'balance'=>$balance,
        ]);
        return redirect()->back(); 

          
    }
    


}
