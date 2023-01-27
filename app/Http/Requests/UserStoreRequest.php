<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        return $this->merge([
            'data-confirm' => $this->has('data-confirm')?true:false,
        ]);
    }

    public function rules()
    {
        return [
            'first-name' => ['required', 'string', 'max:50'],
            'last-name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'max:50'],
            'data-confirm' => ['accepted'],
        ];
    }

    public function messages()
    {
        return [
            'first-name.required' => 'Пожалуйста, укажите свое имя',
            'first-name.max:50' => 'Поле имя не может состоять более чем из 50 символов',
            'first-name.string' => 'Поле должно быть строкой',

            'first-name.required' => 'Пожалуйста, укажите свою фамилию',
            'first-name.max:50' => 'Поле фамилия не может состоять более чем из 50 символов',
            'first-name.string' => 'Поле должно быть строкой',

            'email.requred' => 'Это поле обязательно для заполнения',
            'email.email' => 'Вы ввели что-то странное, проверьте, пожалуйста',
            'email.unique:users' => 'Такой email уже существует',
            'email.string' => 'Это поле должно быть строкой',

            'data-confirm.accepted' => 'Без вашего согласия мы не имеем права брать ваши данные',
        ];
    }
}
