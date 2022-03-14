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
        $Cars = Card::where('id',Auth::id())->get();
        
        return view('user.mycars.index',compact('Cars'));
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
        $cardFind->update([
            'balance'=>$cardbalance,


        ]);     
        if(Auth::user()->balance<=$request->balance){
            return redirect()->back()->with('message','Активирована ограничения на балансе');
        }else{
            $balance = Auth::user()->balance;
            $balance -= $request->balance;
            Auth::user()->update([
              'balance'=>$balance,
            ]);
        }


        return redirect()->back();
    }
    

}
