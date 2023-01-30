@extends('layouts.main')

@section('main.content')
     <x-title>
          {{$post->title}}

          <x-slot name="link">
               <a href="{{ route('blog') }}">
                    {{__('Назад')}}
               </a>
          </x-slot>
          <x-slot name="right">
               <div class="d-flex justify-content-end">
                    @can('delete posts')
                    <div class="me-1">
                         <x-form action="{{route('blog.destroy', $post)}}" method="DELETE">
                              <x-button type="submit" color="danger">
                                   {{__('Удалить')}}
                              </x-button>
                         </x-form>
                    </div>
                    @endcan
                    @can('edit posts')
                         <x-button-link href="{{ route('blog.edit', $post) }}">
                              {{__('Редактировать')}}
                         </x-button-link>
                    @endcan
               </div>
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
               {{ $category->category_name }}
          </p>
     </div>
     <div class="d-flex align-self-start mt-3">
          <p>
              {{__('Автор:')}}&nbsp
          </p>
          <p>
               {{ $user->first_name}}&nbsp
          </p>
          <p>
               {{$user->last_name}}
          </p>
     </div>
@endsection