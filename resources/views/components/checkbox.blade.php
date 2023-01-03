@props(['value' => ''])

<div class="form-check">
    <input class="form-check-input" {{$attributes->merge([
        'name' => 'value'
        ])}} type="checkbox">
    <label class="form-check-label" {{$attributes->merge([

        'for' => 'value'
    ]) }}>
        {{ $slot }}
    </label>
</div>