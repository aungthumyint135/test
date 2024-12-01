<div x-cloak x-show="isOpenImport" class="relative z-20" aria-labelledby="import-dialog" role="dialog"
     aria-modal="true">
    <div x-show="isOpenImport"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-cloak x-show="isOpenImport"
                 class="relative w-full transform overflow-hidden rounded-md bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
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
                                id="modal-title">Import Data</h3>

                            <template x-if="isPayMer">
                                <div class="mt-0.5">
                                    <p class="text-sm text-gray-500">
                                        Please upload the merchant list in Excel (under 5MB) and
                                        <a href="{{ asset('docs/merchant-template.xlsx') }}"
                                           class="font-semibold text-red-600 hover:underline"
                                           target="_blank">download</a>
                                        an example format file.
                                    </p>
                                </div>
                            </template>

                            <template x-if="!isPayMer">
                                <div class="mt-0.5">
                                    <p class="text-sm text-gray-500">
                                        Please upload the transaction list in Excel (under 5MB).
                                    </p>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <form method="post" x-on:submit="handleImportSubmit">
                    <div class="w-full px-4 pb-4 mt-6 sm:px-6">
                        <div class="flex w-full flex-row items-center gap-x-3">
                            <label class="block w-full">
                                <span class="sr-only">Choose a file</span>
                                <input type="file"
                                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 focus:outline-red-50 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 hover:file:cursor-pointer"
                                       id="import_file" name="import_file" required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                            </label>
                        </div>

                        <p class="w-full text-xs text-red-800 mt-1" role="alert">
                            <span x-text="validationError" class="text-red-500"></span>
                        </p>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-x-4">
                        <x-buttons.primary x-bind:disabled="isSubmitting" type="submit">
                            <svg :class="{ 'hidden': !isSubmitting }"
                                 class="mr-3 -ml-1 hidden h-5 w-5 animate-spin text-white"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Import
                        </x-buttons.primary>
                        <x-buttons.secondary autofocus @click="isOpenImport = false; validationError = null" type="reset" x-bind:disabled="isSubmitting">
                            Cancel
                        </x-buttons.secondary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
