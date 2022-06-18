<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistracijaRequest extends FormRequest
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
    protected $stopOnFirstFailure = true;
    



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required | min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required | min:7',
        ];
    }
    public function messages()
    {
      


        return [
            'name.required' => 'Morate unijeti ime!',
            'email.required' => 'Morate unijeti email!',
            'password.required' => 'Morate unijeti lozinku!',
        ];
    }
    
}
