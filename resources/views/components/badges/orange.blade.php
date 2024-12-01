@props([
    'text' => 'Orange',
])

<span
    {!! $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md bg-orange-50 px-2 py-1 text-xs text-xs font-medium capitalize text-orange-700 ring-1 ring-inset ring-orange-700/10 sm:w-20']) !!}>
    {{ $text ?: $slot }}
</span>
