<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\card;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $users=User::where('id','!=',Auth::id())->get();
        $cards = card::where('id','!=',Auth::id())->get();
        // dd($cards);
        return view('backend.cart.index',compact('cards'));
    }
    public function index1()
    {
        $users=User::where('id','!=',Auth::id())->get();
    //    dd($users);
        return view('backend.cart.createcard',compact('users'));
    }
    public function CreateCard(Request $request)
    {
        $validArr = [
                     'user_id' => 'required',
                     "card_number.*"  => "required|min:6",
                    ];


        $this->validate($request,$validArr);
        $input = $request->all();//take all validates lines
        for ($i=0; $i < count($request->card_number); $i++) {
             $insert = card::create([//put inide datebase
            'user_id'=>$request->user_id,
            'card_number'=>$request->card_number[$i],
        ]);
        }


          return redirect()->back();
    }


}
