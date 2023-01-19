@extends('layouts.main')

@section('main.content')
    <x-title>
        {{__('Мои посты')}}
        <x-slot name="right">
            <x-button-link href="{{ route('user.posts.create') }}">
                {{__('Создать')}}
            </x-button-link>
        </x-slot>
    </x-title>
    @if(sizeof($posts) == 0)
        <h3>
            {{__('Нет ни одного поста...')}}
        </h3>
    @else
        @foreach($posts as $post)
            <div class="mb-5">
                <h5>
                    <a href="{{ route('user.posts.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </h5>
                <div class="small text-muted">
                    @if($post->published_at != null)
                        {{ $post->published_at->format('d M Y')}}
                        @else
                            {{__('Дата не указана')}}
                    @endif
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @endif
@endsection 