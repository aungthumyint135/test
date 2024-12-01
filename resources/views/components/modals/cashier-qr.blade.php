<div x-cloak x-show="showQrDialog" class="relative z-20" aria-labelledby="success-dialog" role="dialog" aria-modal="true">
    <div x-show="showQrDialog" class="fixed inset-0 transform transition-all" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-slate-500 opacity-75"></div>
    </div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-cloak x-show="showQrDialog"
                class="relative transform overflow-hidden rounded-2xl bg-red-500 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="relative">
                    <button
                        type="button"
                        class="absolute text-white border-2 border-white rounded-full p-1 right-0 m-2"
                        x-on:click="showQrDialog = false">
                        <span class="sr-only">Close sidebar</span>
                        <x-icons.x-mark class="stroke-2"/>
                    </button>
                </div>
                <div class="bg-red-500 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="w-full sm:flex sm:items-start">
                        <div class="w-full space-y-5 text-center">
                            <h3 class="text-3xl font-black leading-6 tracking-wider text-white" id="modal-title">
                                Welcome</h3>

                            <p class="text-lg font-semibold tracking-widest text-white">
                                欢迎光临 | ようこそ | 환영받는
                            </p>

                            <p class="text-lg font-black uppercase text-white">
                                Scan To Pay
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 w-full">
                        <div
                            class="mx-auto flex min-h-80 max-w-sm items-center justify-center rounded-xl bg-white p-5 text-center">
                            <template x-if="qrCodeUrl">
                                <img :src="qrCodeUrl" alt="payment qr code"/>
                            </template>
                        </div>
                    </div>

                    <div class="mt-4 w-full">
                        <p class="text-center text-sm font-semibold capitalize text-white">
                            QR Code will be expired in <span x-text="qrExpTime"></span>
                        </p>
                        <p class="text-center mt-3 text-lg font-semibold uppercase text-white">
                            Powered By <span class="font-black">MCTPay</span>
                        </p>
                    </div>
                </div>

                <div
                    class="space-y-2 bg-slate-50 px-4 py-3 sm:flex justify-center sm:gap-x-3 sm:space-y-0 sm:px-6">
                    <x-buttons.primary x-on:click="handleConfirmAction" x-bind:disabled="isSubmitting" type="button"
                        class="w-full justify-center sm:w-3/4 py-3 rounded-xl text-base">
                        Finish Payment
                    </x-buttons.primary>
                </div>

            </div>
        </div>
    </div>
</div>
