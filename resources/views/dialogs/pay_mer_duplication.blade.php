<div x-cloak x-show="isPayMerDuplicateOpen" class="relative z-20" aria-labelledby="success-dialog" role="dialog"
     aria-modal="true">
    <div x-show="isPayMerDuplicateOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-cloak x-show="isPayMerDuplicateOpen"
                 class="relative transform overflow-hidden rounded-md bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div class="bg-white pb-4 px-4 sm:px-6 sm:py-4 shadow">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900"
                                id="modal-title">Notice</h3>

                            <p class="text-sm leading-5 mt-0.5 text-gray-500">
                                Please note that some records are incomplete.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full px-4 pb-4 mt-6 sm:px-6">
                    <p class="text-sm text-gray-500 mb-4">
                        There were exceptions where data was skipped due to&nbsp;
                        <span x-text="payMerDuplicateFile ? 'duplicate' : null"></span>
                        <span x-text="payMerDuplicateFile && payMerMissedFile ? '&nbsp;and&nbsp;' : null"></span>
                        <span x-text="payMerMissedFile ? 'missed' : null"></span>.
                        Please download the below files and review it.
                    </p>

                    <div class="w-full">
                        <p class="text-sm text-gray-500 mb-4">
                            <span x-text="importedCnt"></span> records are imported. Data -
                            <a class="text-indigo-600 font-semibold"
                               :href="`/imported/${payMerImportedFile}/download`"
                               x-text="payMerImportedFile"
                               target="_blank"></a>
                        </p>
                    </div>

                    <template x-if="payMerDuplicateFile">
                        <div class="w-full mb-3">
                            <p class="text-sm text-gray-500 mb-4">
                                <span x-text="duplicatedCnt"></span> records are duplicated. Data -
                                <a class="text-red-500 font-semibold"
                                   :href="`/imported/${payMerDuplicateFile}/download`"
                                   x-text="payMerDuplicateFile"
                                   target="_blank"></a>
                            </p>
                        </div>
                    </template>

                    <template x-if="payMerMissedFile">
                        <div class="w-full mb-3">
                            <p class="text-sm text-gray-500 mb-4">
                                <span x-text="missedCnt"></span> records are missed the merchant. Data -
                                <a class="text-red-500 font-semibold"
                                   :href="`/imported/${payMerMissedFile}/download`"
                                   x-text="payMerMissedFile"
                                   target="_blank"></a>
                            </p>
                        </div>
                    </template>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button @click="isPayMerDuplicateOpen = false; payMerDuplicateFile = null; payMerImportedFile = null; payMerMissedFile = null; missedCnt = 0; importedCnt = 0; duplicatedCnt = 0;" type="button"
                            class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
