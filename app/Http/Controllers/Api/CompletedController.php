<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CompletedRequest;
use App\Http\Resources\CompletedResource;
use App\Models\Card;
use App\Models\CardJob;
use App\Models\Job;
use App\Models\JobStatus;
use App\Models\Tarif;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompletedController extends BaseController
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
    public function store(CompletedRequest $request, $id)
    {
        date_default_timezone_set( 'Europe/Moscow' );
        $mytime = Carbon::now();
        $job = CardJob::find($id);
        if( $job && $job->volume != 0 ){
            $update_job_status = '';
            $update_job = '';
            $total_card_balance = '';

            $job_status = JobStatus::where('job_id', $id)->first();
            $job = CardJob::find($id);
            $tarif = Tarif::find($job->tarif_id);
            $card = Card::where('id', $job->card_id)->first();
            $user = $card->user;
            $phone_number='';
                // $phone_number = $user->phone_number[0]['phone_number'];
            $phone_numbers = $user->phone_number;
            foreach ($phone_numbers as $key => $value) {
                if($value->status ==1){
                    $phone_number = $value->phone_number;
                    break;
                }
            }
            if($job_status->status == 'in_process'){
                $total_card_balance = $card->balance - $job_status->price;

                $job_status->status = 'completede';
                $update_job_status = $job_status->update();
                $job->price = $job_status->price;
                $job->status = 'completede';
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
                return $this->sendResponse(new CompletedResource($job), 'Произведен отпуск воды.');
            }
        }
        else{
            return $this->sendError('Job not found.');
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
