<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
            'vendor_type' => 'required',
            'placed_by' => 'required',
            'date' => 'required',
            'vendor_name' => 'required|numeric',
            'cost' => 'required|numeric',
            'procurement_person' => 'required',
            'receiving_date' => 'required',
        ];
    }
}
