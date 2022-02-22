<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\ReplenishBalanceRequest;
use App\Http\Resources\ReplenishBalanceResource;
use App\Models\Card;
use Illuminate\Http\Request;

class ReplenishBalanceController extends BaseController
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
    public function store(ReplenishBalanceRequest $request, $id)
    {
        $card = Card::find($id);
        if (is_null($card)) {
            return $this->sendError('Card not found.');
        }
        else{
            $price=intval($request->price);
            $balance=$card->balance;
            $total_balance=$balance+$price;
            $update_card=$card->update(['balance'=>$total_balance]);
            if($update_card){
                return $this->sendResponse(new ReplenishBalanceResource($card), 'Invoice received successfully');
            }
            else{
                return $this->sendError('Error.');
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
