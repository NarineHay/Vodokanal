<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\CardRequest;
use App\Http\Resources\CardResource;
use App\Models\Car;
use App\Models\Card;
use App\Models\MinimumAmountOnTheCard;
use Illuminate\Http\Request;

class CardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CardResource::collection(Card::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::find($id);
        $car = Car::where('card_id', $card->id)->first();

        $car != null ? $card->model = $car->model : $card->model=NULL;
        $car != null ? $card->car_number = $car->car_numbers : $card->car_number=NULL;
        $minimum_price=MinimumAmountOnTheCard::where('status', true)->first()->value;
        return is_null($card) ? $this->sendError('Карта не найдена.') :
                ( $card->status != 'active' ?  $this->sendError('Карта не активна.') :
                ( $card->car == NULL ?  $this->sendError('К карту не привязана машина.') :
                ( $card->balance < $minimum_price ?  $this->sendError('Недостаточно средств на карте.') :
                ( $card->model == NULL || $card->car_number==NULL ?  $this->sendError('Карте не подкреплена машина.') :
                $this->sendResponse(new CardResource($card), 'Карта найдена успешно.') ) ) ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
