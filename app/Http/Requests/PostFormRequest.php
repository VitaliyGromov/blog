<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:300'],
            'body' => ['required', 'string'],
            'published' => ['nullable'],
            'published_at' => ['nullable','string', 'date'],
            'category_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :atribute не должно быть пустым',
            'date' => 'Поле :atribute должно содержать дату'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок',
            'body' => 'содержание',
            'published_at' => 'Дата публикации',
        ];
    }
}
