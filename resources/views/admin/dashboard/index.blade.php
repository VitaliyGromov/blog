@extends('layouts.main')

@section('main.content')
<div class="m-1">
  <x-button-link color="success" href="{{ route('admin.users.create') }}">
    {{__('Создать пользователя')}}
  </x-button-link>
</div>
<table class="table">
    <thead>
      <th scope="col">{{__('id')}}</th>
      <th scope="col">{{__('Имя')}}</th>
      <th scope="col">{{__('Фамилия')}}</th>
      <th scope="col">{{__('Активен')}}</th>
      <th scope="col">{{__('email')}}</th>
      <th scope="col">{{__('Настройки')}}</th>
      <th scope="col">{{__('Удалить')}}</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->active}}</td>
        <td>{{$user->email}}</td>
        <td>
            <div>
                <x-button-link>
                    {{__('Настройки')}}
                </x-button-link>
            </div>
        </td>
        <td>
            <div>
                <x-button-link color="danger">
                    {{__('Удалить')}}
                </x-button-link>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection