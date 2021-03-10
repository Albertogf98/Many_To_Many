<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUserRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'secondName' => 'required|min:2|max:120',
            'title' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:120',
            'editorial' => 'required|min:2|max:255',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'secondName.required' => 'El campo apellidos es obligatorio',
            'title.required' => 'El campo título es obligatorio',
            'author.required' => 'El campo autor es obligatorio',
            'editorial.required' => 'El campo editorial es obligatorio',
        ];
    }
}
