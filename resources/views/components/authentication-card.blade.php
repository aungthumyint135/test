<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
    <div>
        {{ $logo }}
    </div>

    <div>
        {{ $title }}
    </div>

    <div class="w-full sm:max-w-lg mt-6 px-6 py-4 sm:px-10 sm:pb-7 bg-white shadow-md overflow-hidden sm:rounded-xl">
        {{ $slot }}
    </div>

    {{ $extra ?? null }}
</div>
