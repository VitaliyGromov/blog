@props(['value' => null,'options' => []])

<select {{$attributes->class(['form-control'])}}>
    <option value="0">
        {{__('Не выбрано')}}
    </option>
    @foreach($options as $key => $text)
        <option value="{{ $key }}" {{ ($key == $value) ? 'selected' : null }}>
            {{ $text }}
        </option>
    @endforeach
</select>