<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipment extends FormRequest
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
             'quipment_name' => 'required',
            'equipment_number' => 'required|numeric',
            'functional_status' => 'required',
            'hours_used' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'maintenance_date' => 'required',
            'due_date' => 'required',
        ];
    }
}
