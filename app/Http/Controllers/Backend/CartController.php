<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $users=User::where('id','!=',Auth::id())->get();
        $cards = Card::where('id','!=',Auth::id())->get();
  
        return view('backend.cart.index',compact('cards'));
    }
    public function cart_acceptfoo($id)
    {
        $cardAc = Card::find($id);
        $cardAc['status'] = $cardAc['status'] == 'active' ? 'deactive' : 'active';
        $cardAc->save();

        return redirect()->back();
    }
    public function index1(Request $request)
    {
        $users=User::where('id','!=',Auth::id())->get();
        return view('backend.cart.createcard',compact('users'));
    }
    public function CreateCard(Request $request)
    {
        $validArr = [
                     'user_id' => 'required',
                     "card_number.*"  => "required|min:6|unique",
                     "car_numbers.*"  => "required",
                     "model.*"  => "required",
                    ];
                  
           
            $invalid=$this->validate($request,$validArr);
            $input = $request->all(); 
            foreach($request->object as $key => $value){
                $insert = Card::create([
                    'user_id'=>$request['user_id'],
                    'card_number'=>$value['card_number'],
                ]);
                $insert1 = Car::create([
                    'card_id'=> $insert['id'],
                    'car_numbers'=>$value['car_numbers'],
                    'model'=>$value['model']
                ]);
           
            }
        
        return redirect()->back()->with('message','ваши данные успешно добавлены');;
    }
}
