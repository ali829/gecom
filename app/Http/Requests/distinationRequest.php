<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class destinationRequest extends FormRequest
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
            'name'=>'required |max:20'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'name.max' => 'Le nom doit etre moin de 20 caractere',
        ];
    }
}
