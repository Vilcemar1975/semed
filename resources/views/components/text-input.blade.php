@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-ring-azul-100 focus:ring-ring-azul-100 rounded-md shadow-sm']) !!}>
