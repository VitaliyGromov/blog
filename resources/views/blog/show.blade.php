@extends('layouts.main')

@section('main.content')
     <x-title>
          {{ $post->title}}

          <x-slot name="link">
               <a href="{{ route('blog') }}">
                    {{__('Назад')}}
               </a>
          </x-slot>
     </x-title>
     <article>
          {!! $post->body !!}
     </article>
     <div class="d-flex align-self-start mt-5">
          <p>
              {{__('Категория:')}}&nbsp
          </p>
          <p>
               {{ $category }}
          </p>
     </div>
     <div class="d-flex align-self-start mt-3">
          <p>
              {{__('Автор:')}}&nbsp
          </p>
          <p>
               {{ $userFirstName }}&nbsp
          </p>
          <p>
               {{$userLastName}}
          </p>
     </div>
@endsection