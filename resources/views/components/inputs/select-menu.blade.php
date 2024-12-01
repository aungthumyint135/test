<div class="w-full">
    <label id="paymentType" class="block text-base font-semibold leading-6 text-slate-700"
        @click="$refs.button.focus()">Payment Type<span class="ml-1 text-red-500">*</span></label>
    <div class="relative mt-2">
        <button type="button"
            class="relative min-h-[48px] w-full cursor-pointer rounded-lg bg-white py-3 pl-3 pr-10 text-left text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 focus:outline-none focus:ring-2 focus:ring-red-500 sm:text-sm sm:leading-6"
            aria-haspopup="listbox" aria-labelledby="listbox-label" x-ref="button"
            @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()"
            @click="onButtonClick()" :aria-expanded="isOpenPaymentType">
            <template x-if="Object.keys(selectedItem)?.length > 0">
                <span class="flex items-center">
                    <img :src="`/icons/${selectedItem?.image}`" alt="icons"
                        class="h-5 w-5 flex-shrink-0 rounded-full">
                    <span class="ml-3 block truncate" x-text="selectedItem?.name"></span>
                </span>
            </template>
            <span x-cloak x-show="Object.keys(selectedItem)?.length < 1" class="flex items-center">
                <span class="block truncate text-slate-500">Please choose the payment type</span>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <ul x-cloak x-show="isOpenPaymentType" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            @click.away="isOpenPaymentType = false" @keydown.enter.stop.prevent="onOptionSelect()"
            @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()"
            @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
            tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0"
            style="display: none;">

            <template x-for="(item, idx) in items" :key="item?.uuid">
                <li class="relative cursor-default select-none py-2 pl-3 pr-9 text-slate-700 hover:bg-red-50"
                    id="listbox-option-0" role="option" @click="choose(idx)"
                    :class="{ 'bg-red-50 text-slate-900': activeIndex === idx, 'text-slate-900': !(activeIndex === idx) }">
                    <div class="flex items-center">
                        <img :src="`/icons/${item?.image}`" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                        <span class="ml-3 block truncate font-semibold capitalize"
                            :class="{ 'font-semibold': selectedIndex === idx, 'font-normal': !(selectedIndex === idx) }"
                            x-text="item?.name"></span>
                    </div>

                    <span class="absolute inset-y-0 right-0 flex items-center pr-4"
                        :class="activeIndex === idx ? 'text-red-500' : 'text-white'" x-show="selectedIndex === idx">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </li>
            </template>
        </ul>
    </div>
</div>
