<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:300'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Если ты хочешь что-то найти тут, то напиши',
        ];
    }
}
