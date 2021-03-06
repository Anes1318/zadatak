<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required | max:120',
            'short_description' => 'required | max:255',
            'content' => 'required',
            'picture' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Morate unijeti naslov',
            'content.required' => 'Morate unijeti opis',
            'short_description.required' => 'Morate unijeti kratki opis',
            'picture.required' => 'Morate unijeti sliku',

        ];
    }
}
