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
        <x-button-link href="{{ route('user.posts.edit', $post->id) }}">
            {{__('Редактировать')}}
        </x-button-link>
        <x-button-link color="danger">
            {{__('Удалить')}}
        </x-button-link>
    </x-slot>
</x-title>
<div>
    {{$post->body}}
</div>
@endsection