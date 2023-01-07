<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{ 
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:300'],
            'body' => ['required', 'string'],
        ];
    }
}
