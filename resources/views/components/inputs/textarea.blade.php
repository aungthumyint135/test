@props([
    'disabled' => false,
    'value' => null,
    'placeholder' => null
])

<textarea {{ $disabled ? 'disabled' : '' }}
          placeholder="{{ $placeholder }}" {!! $attributes->merge(['class' => 'text-sm border-slate-300 text-slate-900 focus:border-red-500 focus:ring-red-500 rounded-lg shadow-sm']) !!} >{{ $value }}</textarea>
