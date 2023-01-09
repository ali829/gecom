<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shipperRequest extends FormRequest
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
            'company_name'=>'required|max:50',
            'email' => 'required|email:rfc',
            'phone'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Le nom du livreur est requis',
            'company_name.max' => 'Le nom doit etre moins de 50 caractere',
            'email.required' => 'un email est requis',
            'email.email' => 'email invalid',
            'phone.required' => 'Le numero du telephone est requis',
            'phone.numeric' => 'le numero est invalide'
        ];
    }
}
