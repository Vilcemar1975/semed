@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-azul-100']) }}>
    {{ $value ?? $slot }}
</label>
