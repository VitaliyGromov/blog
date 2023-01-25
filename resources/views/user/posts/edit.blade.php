@extends('layouts.main')

@section('main.content')
     <x-form action="{{ route('user.posts.update', $post) }}" method="PUT">
        <x-form-item>
            <x-label>
                {{ __('Заголовок') }}
            </x-label>
            <x-input name="title" value="{{ $post->title }}"/>
            <x-error name="title"/>
        </x-form-item>
        <x-form-item>
            <x-label>
                {{ __('Текст поста') }}
            </x-label>
            <x-trix name="body" value="{!! $post->body !!}"></x-trix>
            <x-error name="body"/>
        </x-form-item>
        <x-form-item>
            <x-label>
                {{__('Дата публикации')}}
            </x-label>
            <x-input name="published_at" type="date" value="{{$post->published_at}}"/>
            <x-error name="published_at"/>
        </x-form-item>
        <x-form-item>
            <x-label>
                {{__('Категория')}}
            </x-label>
            <x-category-select :categories="$categories"/>
       </x-form-item>
        <x-form-item>
            <x-checkbox name="published" checked>
                {{__('Опубликовать пост')}}
            </x-checkbox>
        </x-form-item>
        <x-button type="submit">
            {{__('Сохранить')}}
        </x-button>
        <x-button-link href="{{ route('user.posts.show', $post->id) }}" color="secondary">
            {{__('Отмена')}}
        </x-button-link>
     </x-form>
@endsection 