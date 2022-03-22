<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Phone_number;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\balance;
use App\Models\User;
use App\Models\Card;
use App\Models\Car;
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
        if (! auth()->user()->isAdmin()) {
            $cards=Auth::user();

            return view('user.dashboard',compact('cards'));

        }
        return view('backend.dashboard');
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
        $cards=Card::where('user_id',  Auth::user()->id)->pluck('id');
        $Cars = Car::whereIn('card_id', $cards)->get();
        

        return view('user.mycars.index',compact('Cars'));
    }

    public function CreateBlance(Request $request)
    {
        $num = $request['num'];
        $bal = 'balance' . $num;
        $erMessage = 'er' . $num;

        $this->validate($request, [
        $bal=> 'required',
        'card_id'=> 'required',
        ]);


        if(intval(Auth::user()->balance)<=intval($request[$bal])){
            return redirect()->back()->withErrors([$erMessage=>'переоценен баланс']);
        }else{
            $cardbalance=Card::find($request->card_id)->balance;
        $cardFind = Card::find($request->card_id);
        $cardbalance += $request[$bal];
        $cardFind->update([
            'balance'=>$cardbalance,
        ]);
            $a = Auth::user();
            $a['balance'] = intval($a['balance']) - intval($request[$bal]);
            $a->save();
        }


        return redirect()->back();
    }


}
