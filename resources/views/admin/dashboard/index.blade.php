@extends('layouts.main')

@section('main.content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">{{__('id')}}</th>
        <th scope="col">{{__('Имя')}}</th>
        <th scope="col">{{__('Фамилия')}}</th>
        <th scope="col">{{__('Email')}}</th>
        <th scope="col">{{__('Настройки')}}</th>
        <th scope="col">{{__('Удаление')}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
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
    </tbody>
  </table>
@endsection