@extends('layouts.main')

@section('main.content')
     <x-title>
          {{__('Создать пост')}}
        <x-slot name="link">
            <a href="{{ route('user.posts') }}">
                {{__('Назад')}}
            </a>
        </x-slot>
     </x-title>
     <x-form action="{{ route('user.posts.store') }}" method="POST">
        <x-form-item>
            <x-label>
                {{ __('Заголовок') }}
            </x-label>
            <x-input name="title"/>
        </x-form-item>
        <x-form-item>
            <x-label>
                {{ __('Текст поста') }}
            </x-label>
            <x-trix name="content"></x-trix>
        </x-form-item>
        <x-button type="submit">
            {{__('Создать')}}
        </x-button>
     </x-form>
@endsection 
