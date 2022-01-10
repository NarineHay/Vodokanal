<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CompletedRequest;
use App\Http\Resources\CompletedResource;
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
    public function update(CompletedRequest $request, $id)
    {
        date_default_timezone_set( 'Europe/Moscow' );
        $mytime = Carbon::now();
        $job=Job::find($id);
        if( $job ){
            $update_job_status='';
            $update_job='';

            $job_status=JobStatus::where('job_id', $id)->first();
            $tarif=Tarif::find($job->tarif_id);

            if($job_status->status=='in_process'){

                $job_status->amount=$tarif->parametr;
                $job_status->price=$tarif->price;
                $job_status->status='completede';
                $update_job_status= $job_status->update();

                $job->amount=$tarif->parametr;
                $job->price=$tarif->price;
                $job->status='completede';
                $job->date_end=$mytime->toDateTimeString();
                $update_job= $job->update();

            }
            else{
                return $this->sendError('Proccess alredy completed.');
            }
            if($update_job_status && $update_job){
                return $this->sendResponse(new CompletedResource($job), 'Job successfully completed');
            }
        }
        else{
            return $this->sendError('Job not found.');
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
