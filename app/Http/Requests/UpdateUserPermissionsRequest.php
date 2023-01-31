<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPermissionsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'delete_posts' => $this->has('delete_posts')?true:false,
            'edit_posts' => $this->has('edit_posts')?true:false,
        ]);
    }

    public function rules()
    {
        return [
            'delete_posts' => 'boolean',
            'edit_posts' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'У пользователя должно быть хотя бы одно разрешение',
        ];
    }
}
