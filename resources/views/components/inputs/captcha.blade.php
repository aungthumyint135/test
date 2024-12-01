<div class="flex w-full items-center mt-1" x-data="{
    captcha: '{{ captcha_src('flat') }}',
    async handleRefresh() {
        await fetch('{{ route('captcha-reload') }}')
            .then(response => response.json())
            .then(data => this.captcha = data.captcha);
     }
    }"
>
    <div class="w-full border border-gray-300 rounded-lg flex items-center py-1.5 px-2 justify-between">
        <div class="w-full mr-2">
            <img x-cloak x-show="captcha" x-bind:src="captcha" alt="captcha" title="captcha" class="w-full h-[39px] rounded-sm"/>
        </div>

        <button type="button" class="border rounded-md p-1.5 border-gray-300 h-full" @click="handleRefresh">
            <x-icons.refresh class="h-6 w-6 flex-shrink-0 text-slate-500" />
        </button>
    </div>
</div>
