<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSoldStatus extends FormRequest
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
             'product_name' => 'required',
            'date' => 'required',
            'packs_sold' => 'required',
            'packs_in_hand' => 'required',
            'amount_received' => 'required|numeric',
        ];
    }
}
