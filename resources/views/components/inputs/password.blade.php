<div x-data="{ isShowPwd: false }">
    <x-inputs.label for="{{ $name }}" :value="$label" />
    <div class="relative w-full">
        <x-inputs.text id="{{ $name }}" class="mt-1 block w-full" name="{{ $name }}" placeholder="••••••••"
            x-bind:type="isShowPwd ? 'text' : 'password'" :required="$required ?? true"
            {{ $attributes }}
            autocomplete="current-password" />

        <button type="button"
            class="absolute inset-y-0 right-0 flex cursor-pointer items-center rounded-r-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-0"
            @click="isShowPwd = !isShowPwd">
            <template x-if="!isShowPwd">
                <x-icons.eye-slash class="m-3 text-gray-500" />
            </template>

            <template x-if="isShowPwd">
                <x-icons.eye class="m-3 text-gray-500" />
            </template>
        </button>
    </div>
    <x-inputs.error for="{{ $name }}" :messages="$errors->get($name)" class="mt-2" />
</div>
