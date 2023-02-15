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
        <div class="d-flex justify-content-end">
            <div class="me-1">
                 <x-form action="{{route('blog.destroy', $post)}}" method="DELETE">
                      <x-button type="submit" color="danger">
                           {{__('Удалить')}}
                      </x-button>
                 </x-form>
            </div>
            <x-button-link href="{{ route('blog.edit', $post) }}">
                {{__('Редактировать')}}
            </x-button-link>
       </div>
    </x-slot>
</x-title>
<div>
    {!!$post->body!!}
</div>
@endsection