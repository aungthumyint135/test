<div x-cloak x-show="isConfirmOpen" class="relative z-20" aria-labelledby="success-dialog" role="dialog" aria-modal="true">
    <div
        x-show="isConfirmOpen"
        class="fixed inset-0 transform transition-all"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-cloak x-show="isConfirmOpen"
                class="relative transform overflow-hidden rounded-md bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                            <x-icons.question-mark class="w-6 h-6 text-orange-600"/>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Notice</h3>

                            <div class="mt-2">
                                <p class="text-sm text-gray-500" x-text="confirmTxt"></p>
                            </div>

                            <div x-show="errorMsg" class="mt-2">
                                <p class="text-sm text-red-500" x-text="errorMsg"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gap-y-4 bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:gap-x-3 sm:gap-y-0 sm:px-6">
                    <x-buttons.primary x-on:click="handleConfirmAction" x-bind:disabled="isSubmitting" type="button"
                        class="justify-center sm:w-auto">
                        <template x-if="isSubmitting">
                            <x-icons.spinner />
                        </template>
                        <span x-text="confirmBtnTxt"></span>
                    </x-buttons.primary>
                    <x-buttons.secondary-link x-on:click="isConfirmOpen = false" type="button"
                        x-bind:disabled="isSubmitting" class="justify-center w-auto">
                        Cancel
                    </x-buttons.secondary-link>
                </div>

            </div>
        </div>
    </div>
</div>
