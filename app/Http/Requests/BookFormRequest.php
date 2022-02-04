<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title' => 'required',
            'page' => 'required',
            'author_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please insert book\'s title',
            'page.required' => 'Please enter number of pages of the book',
            'author_id.required' => 'Please choose an author author'
        ];
    }
}
