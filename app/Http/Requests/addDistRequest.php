<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addDistRequest extends FormRequest
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
            'destination_id'=>'required',
            'price'=>'required|numeric',
            'max_weight'=>'required|numeric|gt:min_weight',
            'min_weight'=>'required|numeric'
        ];
    }
}
