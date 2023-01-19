@extends('layouts.main')

@section('main.content')
<x-title>
    {{ $post->title}}

    <x-slot name="link">
        <a href="{{ route('user.posts') }}">
            {{__('Назад')}}
        </a>
    </x-slot>
    <x-slot name="right">
        <x-button-link href="{{ route('user.posts.edit', $post) }}">
            {{__('Редактировать')}}
        </x-button-link>
        <x-form action="{{route('user.posts.destroy', $post)}}" method="DELETE">
            <x-button type="submit" color="danger">
                {{__('Удалить')}}
            </x-button>
        </x-form>
    </x-slot>
</x-title>
<div>
    {!!$post->body!!}
</div>
@endsection