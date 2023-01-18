@extends('layouts.aauth')

@section('aauth.content')
<x-card>
    <x-card-header>
        <div class="card-body">
            <h4 class="m-0 text-center">
                {{__('Регистрация')}}
            </h4>
        </div>
    </x-card-header>
    <div>
        <div class="card-body">
            <x-form action="{{route('register.store')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <x-form-item>
                    <x-label>{{__('Имя')}}</x-label>
                    <x-input name="first-name"/>
                    <x-error name="first-name"/>
                </x-form-item>
                <x-form-item>
                    <x-label>{{__('Фамилия')}}</x-label>
                    <x-input name="last-name"/>
                    <x-error name="last-name"/>
                </x-form-item>
                <x-form-item>
                    <x-label>{{__('Email')}}</x-label>
                    <x-input type="email" name="email"/>
                    <x-error name="email"/>
                </x-form-item>
                <x-form-item>
                        <x-label>{{__('Пароль')}}</x-label>
                        <x-input type="password" name="password"/>
                        <x-error name="password"/>
                    </x-form-item>
                <x-form-item>
                <x-checkbox value="1" name="data-confirm" id="data-confirm" for="data-confirm">
                         {{__('Соглашаюсь на обработку данных')}}
                </x-checkbox>
                <x-error name="data-confirm"/>
                </x-form-item>
                <x-button type="submit">
                    {{__('Зарегистрироваться')}}
                </x-button>
                <x-button-link color="secondary" href="{{route('login')}}">
                    {{__('У меня есть аккаунт')}}
                </x-button-link>
            </x-form>
        </div>
    </div>
</x-card>
@endsection