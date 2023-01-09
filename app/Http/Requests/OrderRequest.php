<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'shipping_name'=>'required',
            'shipping_address'=>'required',
            'shipping_phone'=>'required|numeric',
            'client_id'=>'required|integer',
            'shipper_id'=>'required|integer',
            'destination_id'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'shipping_name.required'=>'le nom est obligatoire',
            'shipping_address.required'=>'l adresse est obligatoire',
            'shipping_phone.required'=>'le numero de telephone est obligatoire',
            'shipping_phone.numeric'=>'le numero de telephone n est pas valide',
            'client_id.required'=>'selectioner un client',
            'client_id.integer'=>'le client n est pas valide',
            'shipper_id.required'=>'selectioner un livreur',
            'shipper_id.integer'=>'le livreur n est pas valide',
            'destination_id.integer'=>'la destination n est pas valide',

        ];
    }
}
