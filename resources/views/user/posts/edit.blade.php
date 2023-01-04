@extends('layouts.main')

@section('main.content')
     <x-form action="{{ route('user.posts.update', $post->id) }}" method="PUT">
        <x-form-item>
            <x-label>
                {{ __('Заголовок') }}
            </x-label>
            <x-input name="title" value="{{ $post->title }}"/>
        </x-form-item>
        <x-form-item>
            <x-label>
                {{ __('Текст поста') }}
            </x-label>
            <x-trix name="content" value="{{ $post->body }}"></x-trix>
        </x-form-item>
        <x-button type="submit">
            {{__('Сохранить')}}
        </x-button>
        <x-button-link href="{{ route('user.posts.show', $post->id) }}" color="secondary">
            {{__('Отмена')}}
        </x-button-link>
     </x-form>
@endsection 