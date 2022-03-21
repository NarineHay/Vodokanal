<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Resources\SelectedVolumeResource;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Requests\SelectedVolumeRequest;
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


class SelectedVolumeController extends BaseController
{
    public function index()
    {

        //
    }

    public function store(SelectedVolumeRequest $request)
    {

        $max_volume = '';

        $tarif = Tarif::findOrFail($request->tarif_id);
        $card = Card::findOrFail($request->card_id);
        $minimum_price=MinimumAmountOnTheCard::where('status', true)->first()->value;

        $volume = $request->volume;
        $price = $tarif->price;
        $price_selected_volume = $price * $volume;

            if($card->balance < $minimum_price || $card->balance < $price_selected_volume){
                return $this->sendError('Недостаточно средств на карте.');
            }
            if($request->validated()){
                $selected_request = $request->all();
                $max_volume = $card->balance / $price;
                $card->selected_volume = $request->volume;
                $card->max_volume = $max_volume;
                $card->price_selected_volume = $price_selected_volume;

            }
            return $this->sendResponse(new SelectedVolumeResource($card), 'success');

    }
}
