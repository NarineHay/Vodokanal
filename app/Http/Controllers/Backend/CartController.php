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
        // $users=User::where('id','!=',Auth::id())->get();
        $cards = Card::where('id','!=',Auth::id())->get();
        $cars=Car::all();
        // dd($cars);
        return view('backend.card.index',compact('cards'));
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

        return view('backend.card.createcard',compact('users'));
    }
    public function CreateCard(Request $request)
    {
            $request->validate([
                "object"    => "required|array",
                "object.*.card_number"  => "required|min:6|unique:cards",
                "object.*.model"  => "required",
                "object.*.car_numbers"  => "required",
            ],
            [
                "object.*.card_number.unique" => "Этот номер карты уже существует",
                "object.*.card_number.min" => "Поле должен содержать не менее :min символов.",
                "object.*.card_number.required" => "Поле обязательно для заполнения.",
                "object.*.model.required" => "Поле обязательно для заполнения.",
                "object.*.car_numbers.required" => "Поле обязательно для заполнения."

            ]);
            
            
        // $invalid=$this->validate($request,$validArr);
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

        return redirect()->back()->with('message','Ваши данные успешно добавлены');
    }
    public function addbalance_u()
    {
        $users=User::where('id','!=',Auth::id())->get();
        $contracts=Contracts::all();
        $ContractFiles=ContractFile::all();

        return view('backend.card.addbalance',compact('users'));
    }
    public function SelectUser(Request $request)
    {
        $id=$request->sel_val;
        $request->session()->put('select_user', $id);

        $contracts=Contracts::where('user_id', $id)->first();

        $content='';
        if($contracts){
            $cont_files=ContractFile::where('contract_id', $contracts->id)->get();
            $balance=$contracts->user->balance;
            $content .= "

            Номер договора :
            $contracts->number<p></p>
            Баланс :
            $balance руб.<p></p>
            Срок договора от :
            $contracts->date_start<p></p>
            Срок договора до :
            $contracts->date_end<p></p>
            ";
            foreach ($cont_files as $key => $value) {
                $content .= '
                        <div>Договор : <a class="resume" href="'.$value->file_path.'/'.$value->file_name.'">'.$value->file_name.'</a></div><p></p>
                ';
            }

        }
        else{
            $content="Информация о пользователя отсутствует";
        }
        echo $content;

    }
    public function addblance_user_balance(Request $request)
    {
        $this->validate($request, [
            'user_id'=> 'required',
            'balance'=> 'required',
        ]);
        $userbalance=User::find($request->user_id)->balance;
        $formbalance = User::find($request->user_id);
        $userbalance += $request->balance;
        $formbalance->update([
            'balance'=>$userbalance,
        ]);



        return redirect()->back()->with('message','Данные успешно добавлены');
    }
    public function checkbalance()
    {
        $users=User::where('id','!=',Auth::id())->get();
        return view('backend.card.checkbalance',compact('users'));
    }
    public function ShowUserInfos(Request $request)
    {
        $id=$request->sel_val;
        $contracts=Contracts::where('user_id', $id)->first();
        $content='';
        if($contracts){
            $cont_files=ContractFile::where('contract_id', $contracts->id)->get();
            $balance=$contracts->user->balance;
            $content .= "
            Номер договора:
            $contracts->number
            Баланс :
            $balance руб.<p></p>
            Срок договора do:
            $contracts->date_start
            Срок договора posle:
            $contracts->date_end
            ";
            foreach ($cont_files as $key => $value) {
                $content .= '
                    Договор<a class="resume" href="'.$value->file_path.'/'.$value->file_name.'">'.$value->file_name.'</a>
                ';
            }
        }
        else{
            $content="Информация о пользователя отсутствует";
        }
        echo $content;

    }

}
