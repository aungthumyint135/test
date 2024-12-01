@props([
    'text' => 'Gray',
])

<span
    {!! $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md bg-gray-50 px-2 py-1 text-xs text-xs font-medium capitalize text-gray-700 ring-1 ring-inset ring-gray-700/10 sm:w-20']) !!}>
    {{ $text ?: $slot }}
</span>
