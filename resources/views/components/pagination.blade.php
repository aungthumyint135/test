<div class="flex">
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div class="flex items-center gap-x-4">
            <p class="text-sm text-slate-700">Rows per page:</p>
            <select x-model="view" x-on:change="changeView()" id="limit"
                    class="border-0 pl-0 py-0 pr-6 text-sm text-slate-700 placeholder:text-sm focus:outline-0"
                    aria-label="limit">
                <option selected>20</option>
                <option>50</option>
                <option>100</option>
                <option>200</option>
                <option>500</option>
            </select>
            <p class="text-sm text-slate-700">
                <span class="font-medium" x-text="((currentPage * view) - view) + 1"></span>
                &nbsp;-&nbsp;
                <span class="font-medium" x-text="currentPage * view < total ? currentPage * view : total"></span>
                &nbsp;of&nbsp;
                <span class="font-medium" x-text="total"></span>&nbsp;
            </p>
        </div>
        <div>
            <nav class="isolate inline-flex gap-3 rounded-md" aria-label="Pagination">
                <button @click.prevent="changePage(1)"
                    class="relative inline-flex items-center rounded-md px-2 py-2 text-sm text-slate-400 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0 disabled:bg-slate-100">
                    First
                </button>
                <template x-for="item in pages">
                    <button aria-current="page" @click="changePage(item)"
                        :class="currentPage === item ?
                            'text-sm relative z-10 inline-flex rounded-md items-center bg-red-500 px-4 py-2 font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500' :
                            'text-sm relative inline-flex items-center rounded-md px-4 py-2 text-slate-900 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0'"
                        x-text="item"></button>
                </template>
                <button @click.prevent="changePage(pagination.lastPage)"
                    class="relative inline-flex items-center rounded-md px-2 py-2 text-sm text-slate-400 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0">
                    Last
                </button>
            </nav>
        </div>
    </div>
</div>
