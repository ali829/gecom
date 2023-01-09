<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientRequest extends FormRequest
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
            'titre'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'tel'=>'required|max:12',
            'email'=>'required|email:rfc',
            'adresse'=>'required',
            'code_postal'=>'required|numeric|max:99999',
            'ville'=>'required',
            'pays'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prenom est requis',
            'tel.numeric' => 'Le numero de telephone est requis',
            'email.required' => 'L \'email est requis',
            'email.email' => 'L\'email est invalid',
            'adresse.required' => 'L\'adress est requis',
            'code_postal.numeric' => 'Le code postal est invalid',
            'code_postal.required' => 'le code postale est requis',
            'code_postal.max' => 'Le code postal est invalid',
            'ville.required'=>'la ville est requis',
            'pays.required'=>'la pays est requis'    
        ];
    }
}
