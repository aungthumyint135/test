@props([
    'text' => 'success',
])

<span
    {!! $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md bg-green-50 px-2 py-1 text-xs text-xs font-medium capitalize text-green-700 ring-1 ring-inset ring-green-700/10 sm:w-20']) !!}>
    {{ $text ?: $slot }}
</span>
