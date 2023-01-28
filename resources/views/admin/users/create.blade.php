@extends('layouts.main')

@section('main.content')
     <x-title>
          {{__('Создать нового пользователя')}}
        <x-slot name="link">
            <a href="{{ route('admin.dashboard') }}">
                {{__('Назад')}}
            </a>
        </x-slot>
     </x-title>
     <x-form action="{{ route('admin.users.store') }}" method="POST">
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

        <div class="mt-3 mb-3 p-3 border border-2 rounded">
            <h2>{{__('Настройки разрешений')}}</h2>
            <x-checkbox>
                {{__('Редактировать посты')}}
            </x-checkbox>
            <x-checkbox>
                {{__('Удалять посты')}}
            </x-checkbox>
        </div>
        <x-form-item>
            <x-checkbox name="is_active">
                {{__('Активен')}}
            </x-checkbox>
        </x-form-item>
        <x-button type="submit">
            {{__('Создать')}}
        </x-button>
        <x-button-link color="secondary" href="{{route('admin.dashboard')}}">
            {{__('Отмена')}}
        </x-button-link>
     </x-form>
@endsection 