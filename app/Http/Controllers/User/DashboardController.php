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
use App\PhoneNumber\QTSMS;
use Illuminate\Support\Facades\Validator;
// use App\PhoneNumber\Src\SmsActionPostSms;
// use App\PhoneNumber\Src\SmsClient;

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

    function verification_token() {

        return substr(md5(time()), 0, 8);
    }

    public function send_code($phone_number, $token){

        $qtsms= new QTSMS('1694101', ' 16941011', 'https://a2p-sms-https.beeline.ru/proto/http/');
        return $qtsms->post_message($token, $phone_number, 'Duedo');

    }
    public function savenumber(Request $request)
    {
        $this->validate($request, [
            'phone_number'=> 'required | regex:/[0-9]{11}/',
            ],['phone_number.regex'=> " Формат записи номера телефона: 7xxxxxxxxxx"]);

            $input = $request->all();
            $user = Auth::user();

        $check=Phone_number::where("phone_number", $request->phone_number)->first();
        if(!$check){
            Phone_number::create([
                        'user_id'=>$user->id,
                        'phone_number'=> $request->phone_number,
                        'token' => $this->verification_token()
                    ]);

            $this->send_code($request->phone_number, $this->verification_token());

            return redirect()->back()
            ->with('result', 1)
            ->with('phone_number', $request->phone_number)
            ->with('result_phone_number_message', "На указанный номер телефона отправлен код.\n Для подтверждения кода у вас ест 5 минут.");

        }
        else{
            if($check->status==0){
                $post = $check->update(['token' => $this->verification_token()]);
                $this->send_code($request->phone_number, $this->verification_token());

                    return redirect()->back()
                    ->with('result', 1)
                    ->with('phone_number', $request->phone_number)
                    ->with('result_phone_number_message', 'На указанный номер телефона отправлен код. Для подтверждения кода у вас ест 5 минут.');

            }
            else{

                return redirect()->back()
                ->with('result', 0)
                ->with('result_phone_number_message', 'Этот номер телефона уже существует.');
            }

        }

    }
    // ------------- user pone number --------------------
    public function verify_phone_token(Request $request){
        $this->validate($request, [
                'verify_token'=> 'required '
            ]);
            $input = $request->all();

        $id=Auth::user()->id;
        $date=date("Y-m-d H:i:s");
        $verify_token=$request->verify_token;
        $phone_numer=$request->phone_numer;
        $five_minute_ago=date('Y-m-d H:i:s', strtotime(' -5 minute'));
        $user_phone=Phone_number::where(['user_id'=>$id, 'phone_number'=> $phone_numer, 'token'=>$verify_token])->first();

        if($user_phone != null){
            if($user_phone->updated_at > $five_minute_ago){
                $user_phone->update(['token' => '', 'status'=>1]);

                return redirect()->back()
                ->with('result_token', 1)
                ->with('result_verify_phone_token', 'Ваш номер телефона подтвержден.');

            }
            else{
                return redirect()->back()
                ->with('result_token', 0)
                ->with('result_verify_phone_token', 'Время отправки кода истек попробуйте еще раз.');
            }
        }
        else{
                return redirect()->back()
                ->with('result_token', 0)
                ->with('result_verify_phone_token', "Код для подтверждения номера телефона неверный");
        }

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
