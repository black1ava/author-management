<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorFormRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Please insert author name',
            'email.required' => 'please insert author email',
            'address.required' => 'Please insert author address'
        ];
    }
}
