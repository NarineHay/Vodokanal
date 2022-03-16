<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\Car;
use App\Models\User;
use App\Models\Contracts;
use App\Models\ContractFile;
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
        return redirect()->back()->with('message','ваши данные успешно добавлены');
    }
    public function addblance_u()
    {
        $users=User::where('id','!=',Auth::id())->get();
        $contracts=Contracts::all();
        $ContractFiles=ContractFile::all();

        return view('backend.cart.addbalance',compact('users'));
    }
    public function SelectUser(Request $request)
    {  
        $id=$request->sel_val;
        $contracts=Contracts::where('user_id', $id)->first();
        $content='';
        if($contracts){
            $cont_files=ContractFile::where('contract_id', $contracts->id)->get();
            $content .= " 
            номер договора :
            $contracts->number<p></p>
            срок договора do :
            $contracts->date_start<p></p>
            срок договора posle :
            $contracts->date_end<p></p>
            ";
            foreach ($cont_files as $key => $value) {
                $content .= '
                        <div>договор : <a class="resume" href="'.$value->file_path.'/'.$value->file_name.'">'.$value->file_name.'</a></div><p></p>
                ';
            }
        }
        else{
            $content="no info";
        }
        echo $content;
    }
    public function addblance_user_balance(Request $request)
    {
        $validArrBal=$this->validate($request, [
            'user_id'=> 'required',
            'balance'=> 'required',
        ]);
        if($validArrBal->fails()){
            return redirect()->back()->with('message','найдена ошибка');
        }else{

            $user = User::find($request->user_id);
            $balance=User::all();
            $balance += $request->balance;
            $user->update([
                'balance'=>$request->balance,
            ]);
        }
        return redirect()->back();
    }
    public function checkbalance()
    {
        $users=User::where('id','!=',Auth::id())->get();
        return view('backend.cart.checkbalance',compact('users'));
    }
    public function ShowUserInfos(Request $request)
    {
        $id=$request->sel_val;
        $contracts=Contracts::where('user_id', $id)->first();
        $content='';
        if($contracts){
            $cont_files=ContractFile::where('contract_id', $contracts->id)->get();
            $content .= " 
            
            
            
            номер договора:
            $contracts->number
            срок договора do:
            $contracts->date_start
            срок договора posle:
            $contracts->date_end
              
           
             
            ";
            foreach ($cont_files as $key => $value) {
                $content .= '
               
                    
                        договор<a class="resume" href="'.$value->file_path.'/'.$value->file_name.'">'.$value->file_name.'</a>
                   
               
                ';
            }
        }
        else{
            $content="no info";
        }
        echo $content;
    }

}
