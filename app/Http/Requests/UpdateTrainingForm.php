<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingForm extends FormRequest
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
            'title' => 'required',
            'type' => 'required',
            'date' => 'required',
            'speaker' => 'required',
            'number_participants' => 'required|numeric',
            'total_amount_received' => 'required|numeric',
            'total_amount_spent' => 'required|numeric',
        ];
    }
}
