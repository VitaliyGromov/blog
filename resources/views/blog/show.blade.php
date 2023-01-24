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
              {{__('Категория:')}}
          </p>
          <p>
               {{ $category }}
          </p>
      </div>
@endsection