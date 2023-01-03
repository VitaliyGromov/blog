@extends('layouts.main')

@section('main.content')
<x-title>
    {{ $post->title}}

    <x-slot name="link">
        <a href="{{ route('user.posts') }}">
            {{__('Назад')}}
        </a>
    </x-slot>
</x-title>
<div>
    {{$post->body}}
</div>
@endsection