<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

    public function messages() 
    {
        return[
            // 'name.min' => 'Il nome deve essere almeno di 3 caratteri',
            // 'name.required' => 'Il campo nome è obbligatorio'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name' => ['required', 'min:3'],
             'description' => ['required', 'max:255'],
             'image' => ['required'],
             'price' => ['required', 'numeric'],
             'quantity' => ['required', 'numeric']
        ];
    }
}
