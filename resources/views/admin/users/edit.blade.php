@extends('layouts.main')

@section('main.content')
     <x-form action="{{ route('admin.users.update', $user) }}" method="PUT">
        <x-title>
            {{__('Редактирование пользователя')}}
            &thinsp;
            {{$user->first_name}}
            &thinsp;
            {{$user->last_name}}
        </x-title>
        <div>
            <h2>{{__('Настройки разрешений')}}</h2>
            @foreach($permissions as $permission)
            <x-form-item>
                <x-checkbox name="{{$permission->name}}">
                    {{$permission->name}}
                </x-checkbox>
            </x-form-item>
        @endforeach
        </div>
        <div class="mb-3 border-top pt-1">
            <x-checkbox name="is_active">
                {{__('Активен')}}
            </x-checkbox>
        </div>
        <x-button type="submit">
            {{__('Сохранить')}}
        </x-button>
        <x-button-link href="{{ route('admin.dashboard') }}" color="secondary">
            {{__('Отмена')}}
        </x-button-link>
     </x-form>
@endsection 