<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCroProject extends FormRequest
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
            'project_type' => 'required',
            'title' => 'required',
            'funder_type' => 'required',
            'funder_name' => 'required|numeric',
            'amount' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required',
            'team_lead' => 'required',
            'team_members' => 'required',
        ];
    }
}
