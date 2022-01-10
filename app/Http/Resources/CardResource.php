<?php

namespace App\Http\Resources;

use App\Models\Tarif;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'card_number' => $this->card_number,
            'balance' => $this->balance,
            'status' => $this->status,
            'tarif' => TarifResource::collection(Tarif::all())
        ];
    }
}
