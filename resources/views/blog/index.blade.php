@extends('layouts.main')

@section('main.content')
     <x-title>
          {{__('Посты')}}
     </x-title>
     <x-form action="{{ route('blog.search') }}" method="GET">
          <div class="col-12">
               <x-form-item>
                    <x-input name="title" placeholder="{{__('Поиск по заголовку')}}" value="{{ request('title') }}"/>
                    <x-error name="title"/>
               </x-form-item>
          </div>
          <div class="col-12">
               <x-form-item>
                    <x-button type="submit">{{__('Поиск')}}</x-button>
               </x-form-item>
          </div>
     </x-form>
     @if(sizeof($posts) === 0)
          {{__('Нет ни одного поста')}}
     @else
          <div class="row">
               @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                         <x-post.card :post="$post"/>
                    </div>
               @endforeach
          </div>
          {{$posts->links()}}
     @endif
@endsection