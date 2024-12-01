@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg shadow-sm text-sm']) !!}>
    {{ $slot }}
</select>
