<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFunder extends FormRequest
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
            'funding_organization_name' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'phoneNo' => 'required|numeric',
            'team_lead' => 'required',
            'status' => 'required',
            'response' => 'required',
        ];
    }
}
