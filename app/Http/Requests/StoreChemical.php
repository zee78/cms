<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChemical extends FormRequest
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
             'chemical_name' => 'required',
            'stock_in_hand' => 'required',
            'unit_cost' => 'required|between:0,99.99',
            'quantity_used' => 'required|numeric',
            'usage_detail' => 'required',
            'quantity_remaining' => 'required|numeric',
            'stock_level' => 'required',
            'cost_chemicals_used' => 'required|between:0,99.99',
            'wastage_amount' => 'required|between:0,99.99',
            'wastage_cost' => 'required|between:0,99.99',
        ];
    }
}
