<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'categorie_id' => 'required|integer',
            'weight' => 'required|integer',
            'weight_package' => 'required|integer',
            'visible' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom du produit est requis',
            'categorie_id.required' => 'une categorie est requise',
            'categorie_id.integer' => 'une categorie est requise',
            'visible.boolean' => 'choix invalide',
        ];
    }
}
