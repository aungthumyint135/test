<div class="col-span-full">
    <div class="rounded-lg border border-slate-100">
        <div
            class="grid h-96 w-full select-none grid-cols-3 grid-rows-4 gap-1 rounded-lg bg-white p-1 font-bold text-white shadow ring-2 ring-white/20">
            <button type="button" @click="handleAmount('7')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">7</span>
            </button>
            <button type="button" @click="handleAmount('8')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">8</span>
            </button>
            <button type="button" @click="handleAmount('9')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">9</span>
            </button>
            <button type="button" @click="handleAmount('4')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">4</span>
            </button>
            <button type="button" @click="handleAmount('5')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">5</span>
            </button>
            <button type="button" @click="handleAmount('6')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">6</span>
            </button>
            <button type="button" @click="handleAmount('1')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">1</span>
            </button>
            <button type="button" @click="handleAmount('2')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">2</span>
            </button>
            <button type="button" @click="handleAmount('3')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">3</span>
            </button>
            <button type="button" @click="handleAmount('.')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">.</span>
            </button>
            <button type="button" @click="handleAmount('0')"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span class="font-mono">0</span>
            </button>
            <button type="button" @click="handleDelete()"
                class="relative flex items-center justify-center rounded border border-slate-200 bg-slate-50 text-3xl text-slate-500 transition-all duration-500 focus:border-slate-300 focus-visible:outline-slate-300 active:scale-95 active:bg-red-200 active:duration-[0s]">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</div>
