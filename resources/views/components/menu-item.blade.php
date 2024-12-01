@props(['href' => '#', 'active' => false, 'label'])

@php
  $actCls =  $active ? 'text-white bg-gray-800' : 'text-gray-400 bg-transparent';
@endphp

<a href="{{ $href }}" {!! $attributes->merge(['class' => "$actCls flex gap-x-3 rounded-lg p-2 text-sm font-bold leading-6 hover:bg-gray-800 hover:text-white"]) !!}>
    {{ $label ?? $slot }}
</a>
