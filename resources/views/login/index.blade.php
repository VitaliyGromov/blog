@extends('layouts.aauth')

@section('aauth.content')
<x-card>
    <x-card-header>
        <div class="card-body">
            <h4 class="m-0 text-center">
                {{__('Вход')}}
            </h4>
        </div>
    </x-card-header>
    <div>
        <div class="card-body">
            <x-form action="{{route('login.store')}}" method="POST">
                <x-form-item>
                    <x-label>{{__('Email')}}</x-label>
                    <x-input type="email" name="email"/>
                </x-form-item>
                <x-form-item>
                        <x-label>{{__('Пароль')}}</x-label>
                        <x-input type="password" name="password"/>
                    </x-form-item>
                <x-form-item>
                <x-checkbox value="1" name="remember" id="remeber" for="remeber">
                         {{__('Запомнить меня')}}
                </x-checkbox>
                </x-form-item>
                <x-button type="submit">
                    {{__('Войти')}}
                </x-button>
                <x-button-link color="secondary" href="{{route('register')}}">
                    {{__('Новый аккаунт')}}
                </x-button-link>
            </x-form>
        </div>
    </div>
</x-card>
@endsection