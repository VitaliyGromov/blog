@extends('layouts.main')

@section('main.content')
     <x-title>
          {{__('Список постов')}}
     </x-title>
     <x-form method="GET">
          <div class="col-12">
               <x-form-item>
                    <x-input name="search" placeholder="{{__('Поиск')}}" value="{{ request('search') }}"/>
               </x-form-item>
          </div>
          <div class="col-12">
               <x-form-item>
                    <x-select name="category_id" value="{{ request('category_id') }}" :options="[null => __('Все категории'), '1' => 'Первая категроия', '2'=> 'Вторая категория']"/>
               </x-form-item>
          </div>
          <div class="col-12">
               <x-form-item>
                    <x-button type="submit">{{__('Поиск')}}</x-button>
               </x-form-item>
          </div>
     </x-form>
     @if(empty($posts))
          {{__('Нет ни одного поста')}}
     @else
          <div class="row">
               @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                         <x-post.card :post="$post"/>
                    </div>
               @endforeach
          </div>
     @endif
@endsection