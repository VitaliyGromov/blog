@props(['method' => 'GET'])

@php($method = strtoupper($method))
@php($_method = in_array($method, ['GET', 'POST']))


<form {{$attributes}} method="{{ $_method ? $method : 'POST' }}">
    @if($method !== 'GET')
        @csrf
    @endif

    @unless($_method)
        @method($method)
    @endunless

    {{ $slot }}
</form> 