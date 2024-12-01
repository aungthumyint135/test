<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-red-500 rounded-lg font-semibold text-xs text-red-500 uppercase tracking-widest hover:bg-red-500 focus:bg-red-500 active:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:text-white focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
