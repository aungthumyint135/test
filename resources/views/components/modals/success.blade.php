@php
    $message = 'Notice';

    if (isset($attributes['message'])) {
        $message = $attributes['message'];
    }

    $type = 'success';

    if (isset($attributes['type'])) {
        $type = $attributes['type'];
    }
@endphp
<div x-data="{ show: true, type: '{{ $type }}' }" x-init="setTimeout(() => show = false, 5000)">
    <div x-cloak x-show="show" class="fixed z-20 sm:right-5 bottom-3" aria-labelledby="success-toast" role="alert" aria-modal="true">
        <div class="flex w-full items-end justify-center p-4 text-center sm:p-0 max-w-sm min-w-[20rem]">
            <div
                x-cloak x-show="show"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <template x-if="type === 'success'">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                        <span class="sr-only">Check icon</span>
                        <x-icons.check class="size-5" />
                    </div>
                </template>

                <template x-if="type === 'failed'">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg">
                        <span class="sr-only">Exclamation icon</span>
                        <x-icons.exclamation />
                    </div>
                </template>

                <div class="ms-3 text-sm font-normal"
                     x-text="typeof toastMsg !== 'undefined' ? toastMsg : '{{ $message }}'"
                ></div>
                <button x-on:click="show = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <x-icons.x-mark class="w-4 h-4"/>
                </button>
            </div>
        </div>
    </div>
</div>
