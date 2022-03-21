<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelectedVolumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tarif_id' => 'required',
            'card_id' => 'required',
            'volume' => 'required | integer',
        ];
    }
}
