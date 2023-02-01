@extends('layouts.main')

@section('main.content')
@if (sizeof($users) == 0)
    <div class="d-flex justify-content-center">
      <h2>{{__('Нет пользователей')}}</h2>
    </div>
    @else
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
                  <x-button-link href="{{ route('admin.users.edit', $user) }}">
                      {{__('Настройки')}}
                  </x-button-link>
              </div>
          </td>
          <td>
              <div>
                <x-form action="{{route('admin.users.destroy', $user)}}" method="DELETE">
                  <x-button type="submit" color="danger">
                    {{__('Удалить')}}
                </x-button>
                </x-form>
              </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

@endif
@endsection