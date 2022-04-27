<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\StopRequest;
use App\Http\Resources\CompletedResource;
use App\Http\Resources\StopResource;
use App\Models\Card;
use App\Models\CardJob;
use App\Models\Job;
use App\Models\JobStatus;
use App\Models\Tarif;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StopController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StopRequest $request, $id)
    {

            date_default_timezone_set( 'Europe/Moscow' );
            $mytime = Carbon::now();
            if( $request->validated()){

                $update_job_status='';
                $update_job = '';
                $volume_price = '';
                $total_card_balance = '';
                $job = CardJob::find($id);
                $card = Card::where('id', $job->card_id)->first();
                $user = $card->user;
                
                $phone_number='';
                $phone_numbers = $user->phone_number;
                foreach ($phone_numbers as $key => $value) {
                    if($value->status ==1){
                        $phone_number = $value->phone_number;
                        break;
                    }
                }
                if( $job ){

                    $job_status = JobStatus::where('job_id', $id)->first();
                    $tarif = Tarif::find($job->tarif_id);

                    if($job_status->status == 'in_process'){

                        $volume = ceil($request->volume);

                        if( $job_status->volume == 0){
                           $volume_price = $volume * $tarif->price;

                           $job_status->volume = $volume;
                           $job_status->price = $volume_price;

                           $job->volume = $volume;
                        }
                        else{
                            $volume_price = $job_status->price;
                        }

                        $total_card_balance = $card->balance - $volume_price;

                        $job_status->status = 'stop';
                        $update_job_status = $job_status->update();

                        $job->price = $volume_price;
                        $job->status = 'stop';
                        $job->date_end = $mytime->toDateTimeString();
                        $update_job = $job->update();

                        $job->balance = $total_card_balance;
                        $update_card = $card->update(['balance' => $total_card_balance]);

                    }
                    else{
                        return $this->sendError('Процесс уже завершен.');
                    }
                    if($update_job_status && $update_job && $update_card){
                        $body = "Произведен отпуск воды. <br>
                                <p>Номер карты: $card->card_number. <br>
                                Количество отпущенной жидкости: $job->volume кубов. <br>
                                Стоимость: $job->price рублей. <br>
                                Остаток на карте: $total_card_balance рублей.";
                        $body_for_phone = "Произведен отпуск воды. Номер карты: $card->card_number. Количество отпущенной жидкости: $job->volume кубов. Стоимость: $job->price рублей. Остаток на карте: $total_card_balance рублей.";

                        $this->sendCardDataNotification( $user, $body );
                        $phone_number != '' ? $this->send_code( $phone_number, $body_for_phone ) : null;
                        // $this->send_code( $phone_number, $body_for_phone );
                        return $this->sendResponse(new StopResource($job), 'Произведен отпуск воды.');
                    }
                }
                else{
                    return $this->sendError('Job not found.');
                }
        }

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
    public function update(Request $request)
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
