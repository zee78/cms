<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormulation extends FormRequest
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
            
            'formulation_name' => 'required',
            'ingredient_name' => 'required',
            'quantity' => 'required|numeric',
            'equipment_used' => 'required',
            'procedure' => 'required',
            'container_used' => 'required',
            'label_type_used' => 'required',
            'pack_size' => 'required',

        ];
    }
}
