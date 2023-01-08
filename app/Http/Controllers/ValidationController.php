<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ValidationController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $validated =$request->validate([
            /* 
            1)Сначала проверям обязательность поля
            2) Проверяем тип данных поля
            3)потов формат
            3) Потом проверяем min and max
            4) min и max для строки проверяет длинну, для int значение
            */
            'first_name' => ['required', 'string', 'max:256'],
            'last_name' => ['nullable', 'string', 'max:256'],
            'age' => ['nullable', 'integer', 'min:18', 'max: 100'],
            'amount' => ['required', 'numeric', 'min:1', 'max:180000'], // numeric contains integer and float, uses for money 123.123
            'gender' => ['nullable', 'string', 'in:male,femail,none'],  // в значении in указываем какие-то данные через запятую
            'zip' => ['required', 'digits:6', ], // количество цифр должно быть 6, например. Число должно быть положительным
            'subscription' => ['nullable', 'boolean'], // true/false/1/0/'1'/'0'
            'agreement' => ['accepted'], // true/1/yes принимает значение относительно согдасия, required тут по умолнанию
            'password' => ['required', 'string', 'min:8', 'confirmed'], // пароль должен содержать себя же в поле подтверждения пароля
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()], // very strong password
            'current_password' => ['required', 'string', 'current_password'], // проверяет текущий пароль пользователя
            'email' => ['required', 'string', 'email', 'exists:user,email'], // проверка на формат и на то, что в таблице users существует поле email
            'country_id' => ['required', 'integer', Rule::exists('country_id', 'id')->where('active', true)],
            'phone' => ['required', 'string', 'unique:users,phone'],
            'phone' =>['required', 'string', Rule::unique('users')->ignore($user)], // подходит для ситуаций редактирования, когда надо записать уникальгый телефон, но исключить пользоватуля из проверки
            'website' => ['reqired', 'string', 'url'], // https://example.com
            'uuid' => ['required', 'string', 'uuid'], // fb882e54-8f6b-11ed-a1eb-0242ac120002
            'ip' => ['nullable', 'string', 'ip'], // 127.0.0.1
            'avatar' => ['nullable', 'file', 'image', 'max:1024'], // файл, картинка, размер
            'birth_date' => ['nullable', 'string','date'],
            'start_date' => ['required', 'string', 'after_or_equal:today'],
            'finish_date' => ['required', 'string', 'after:start_date'],

            /// Валидация массивов

            'services' => ['nullable', 'array', 'min:1', 'max:12'],
            'services.*' => ['required', 'integer'],
            'delivery' => ['required', 'array', 'size:2'],
            'delivery.date' => ['required', 'string', 'date_format:Y.m.d'], //2023-01-08
            'delivery.time' => ['required', 'string', 'date_format:H:i:s'], //12:23:35
        ]);

        dd($validated);
    }
}
