<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Requests\StartRequest;
use App\Http\Requests\StopRequest;
use App\Http\Resources\CardResource;
use App\Http\Resources\StartResource;
use App\Http\Resources\StopResource;
use App\Models\Auth\User as AuthUser;
use App\Models\Card;
use App\Models\CardJob;
use App\Models\JobStatus;
use App\Models\MinimumAmountOnTheCard;
use App\Models\Tarif;
use App\Models\User;
use Carbon\Doctrine\CarbonType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class StartController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return StartResource::collection(CardJob::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StartRequest $request)
    {
        $job_request='';
        $job_status_request='';

        date_default_timezone_set( 'Europe/Moscow' );
        $mytime = Carbon::now();
        $tarif = Tarif::findOrFail($request->tarif_id);
        $card = Card::findOrFail($request->card_id);
        $minimum_price=MinimumAmountOnTheCard::where('status', true)->first()->value;
        $user=$card->user;
        $phone_number='';
        $phone_numbers = $user->phone_number;
            foreach ($phone_numbers as $key => $value) {
                if($value->status ==1){
                    $phone_number = $value->phone_number;
                    break;
                }
            }
        $volume = intval($request->volume);
        $price = $tarif->price;
        $price_selected_volume = $price * $volume;
        // $total_card_balance = $card->balance - $price_selected_volume;

            if($card->balance < $minimum_price || $card->balance < $price_selected_volume){

                $body = "Отклонён отпуск воды. <br>
                         Недостаточно средств на карте. <br>
                         Номер карты: $card->card_number <br>
                         Остаток на карте: $card->balance рублей";
                $body_for_phone="Отклонён отпуск воды. Недостаточно средств на карте. Номер карты: $card->card_number. Остаток на карте: $card->balance рублей";

                $this->sendCardDataNotification( $user, $body );
                $this->send_code( $phone_number, $body_for_phone );
                return $this->sendError('Недостаточно средств на карте.');
            }
            if($request->validated()){
                $job_request = $request->all();
                $job_status_request = $request->all();
                $job_request['user_id'] = $card->user_id;
                $job_request['status'] = 'start';
                $job_request['date_start'] = $mytime->toDateTimeString();

                $job = CardJob::create($job_request);

                $job_status_request['job_id'] = $job->id;
                $job_status_request['user_id'] = $card->user_id;
                $job_status_request['status'] = 'in_process';
                $job_status_request['price'] = $price_selected_volume;

                $job_status = JobStatus::create($job_status_request);

                // $card->balance = $total_card_balance;
                // $card->update();
            }
            return $this->sendResponse(new StartResource($job), 'Proccess');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
