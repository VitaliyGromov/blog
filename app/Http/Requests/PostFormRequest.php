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
    protected function prepareForValidation()
    {
        $this->merge([
            'published' => $this->has('published')?true:false,
        ]);
    }
    
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
            'title.required' => 'Ну чел, как без названия-то...',
            'body.required' => 'Надо бы написать что-то, братан...',
            'date' => 'Странная дата, бро',
        ];
    }
}
