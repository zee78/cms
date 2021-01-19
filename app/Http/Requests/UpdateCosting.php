<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCosting extends FormRequest
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
            'ingredient_name' => 'required',
            'quantity_used' => 'required',
            'container_name' => 'required',
            'container_cost' => 'required',
            'sticker_cost' => 'required',
            'box_cost' => 'required',
            'bag_cost' => 'required',
            'total_direct_cost' => 'required',
            'gst' => 'required',
            'marketing_cost' => 'required',
            'profit_percentage' => 'required',
            'profit_amount' => 'required',
            'market_retail_price' => 'required',
        ];
    }
}
