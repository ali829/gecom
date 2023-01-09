<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categorieRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nom' => 'required|max:50',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est requis',
            'nom.max' => 'Le nom doit être moins de 50 caractères',
            'description.required' => 'La description est requise'
        ];
    }
}
