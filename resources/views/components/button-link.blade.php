@props(['link' => '#'])
<a class="btn btn-primary" {{$attributes->merge(['href'=>'link'])}} role="button">{{ $slot }}</a>