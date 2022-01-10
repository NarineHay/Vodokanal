<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\StartRequest;
use App\Http\Requests\StopRequest;
use App\Http\Resources\CardResource;
use App\Http\Resources\StartResource;
use App\Http\Resources\StopResource;
use App\Models\Card;
use App\Models\Job;
use App\Models\JobStatus;
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
        return StartResource::collection(Job::all());
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
        $tarif=Tarif::find($request->tarif_id);
        $user=User::find($request->user_id);
        $card=Card::find($request->card_id);

        $price=$tarif->price;
        $total_card_balance=$card->balance-$price;
        if(is_null($tarif) || is_null($user) ||is_null($card)){
            return $this->sendError('Error.');
        }
        else{
            if($card->balance < $tarif->price){
                return $this->sendError('Insufficient funds on the card.');
            }
            if($request->validated()){
                $job_request=$request->all();
                $job_status_request=$request->all();

                $job_request['status']='start';
                $job_request['date_start']=$mytime->toDateTimeString();
                $job_request['type']=$tarif->type;
                $job=Job::create($job_request);

                $job_status_request['job_id']=$job->id;
                $job_status_request['status']='in_process';
                $job_status_request['price']=$tarif->price;
                $job_status_request['type']=$tarif->type;

                $job_status=JobStatus::create($job_status_request);

                $card->balance = $total_card_balance;
                $card->update();
            }
            return $this->sendResponse(new StartResource($job), 'Proccess');

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
