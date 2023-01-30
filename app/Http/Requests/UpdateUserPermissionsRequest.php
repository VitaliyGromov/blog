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
            'delete posts' => $this->has('delete posts')?true:false,
            'edit posts' => $this->has('edit posts')?true:false,
        ]);
    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            'required' => 'У пользователя должно быть хотя бы одно разрешение',
        ];
    }
}
