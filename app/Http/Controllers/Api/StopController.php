<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\StopRequest;
use App\Http\Resources\CompletedResource;
use App\Http\Resources\StopResource;
use App\Models\Card;
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
    public function store(Request $request)
    {
        //
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
    public function update(StopRequest $request, $id )
    {
        date_default_timezone_set( 'Europe/Moscow' );
        $mytime = Carbon::now();
        if( $request->validated()){

            $update_job_status='';
            $update_job='';
            $update_user='';
            $tarif_amount='';
            $tarif_price='';
            $amount='';
            $price='';
            $total_card_balance='';
            $job=Job::find($id);
            $card=Card::where('id', $job->card_id)->first();

            if( $job ){

                $job_status=JobStatus::where('job_id', $id)->first();
                $tarif=Tarif::find($job->tarif_id);

                if($job_status->status=='in_process'){
                    $tarif_amount=$tarif->parametr;
                    $tarif_price=$tarif->price;
                    $amount=$request->amount;
                    if($amount <= $tarif_amount){
                        $price=$amount * $tarif_price / $tarif_amount;
                        $total_card_balance=$card->balance + ( $tarif_price - $price );
                    }
                    else{
                        return $this->sendError('Quantity higher tariff quantity.');
                    }
                    $job_status->amount=$amount;
                    $job_status->price=$price;
                    $job_status->status='stop';
                    $update_job_status= $job_status->update();

                    $job->amount=$amount;
                    $job->price=$price;
                    $job->status='stop';
                    $job->date_end=$mytime->toDateTimeString();
                    $update_job= $job->update();

                    $update_card=$card->update(['balance' => $total_card_balance]);

                }
                else{
                    return $this->sendError('Proccess alredy completed.');
                }
                if($update_job_status && $update_job && $update_card){
                    return $this->sendResponse(new StopResource($job), 'Job successfully stoped');
                }
            }
            else{
                return $this->sendError('Job not found.');
            }

            // return $job->update($request->validated());
        // return $this->sendResponse(new StopResource($job), 'ddd');
        // return new StopResource($job);


        }
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
