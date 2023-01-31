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
                <input class="form-check-input" name="{{$permission->name}}" 
                type="checkbox" value="1" 
                @if ($user->hasPermissionTo($permission->name)) 
                checked 
                @endif>
                <label for="{{$permission->name}}">
                    {{$permission->name}}
                </label>
                <x-error name="{{$permission->name}}"/>
            </x-form-item>
        @endforeach
        </div>
        <x-button type="submit">
            {{__('Сохранить')}}
        </x-button>
        <x-button-link href="{{ route('admin.dashboard') }}" color="secondary">
            {{__('Отмена')}}
        </x-button-link>
     </x-form>
@endsection 