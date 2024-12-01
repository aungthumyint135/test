<x-app-layout>
    <x-slot name="title">Role Management</x-slot>
    <div class="w-full" x-data="data">
        <div class="relative">
            <div class="grid w-full grid-cols-1 space-y-5 rounded-lg border border-gray-200 bg-white py-6">
                <div class="flex flex-row justify-end px-4">
                    <div class="flex gap-3">
                        <x-inputs.text x-model="searchInput" type="search" id="searchInput"
                                       placeholder="Search..." class="py-1.5 text-sm w-[256px]"/>
                        <x-buttons.primary-link href="{{ route('roles.create') }}">
                            Create
                        </x-buttons.primary-link>
                    </div>
                </div>

                <div class="w-full border-t border-gray-200">
                    <div class="relative overflow-x-auto rounded-md">
                        <table class="w-full text-left text-sm text-gray-500">
                            <thead class="bg-gray-50 uppercase text-gray-700">
                            <tr class="border-b border-gray-100">
                                <th scope="col" class="px-6 py-5">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Remark
                                </th>
                                <th scope="col" class="px-6 py-5">
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <template x-if="isLoading">
                                <tr class="border-b">
                                    <td colspan="4" class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        Loading...
                                    </td>
                                </tr>
                            </template>

                            <template x-if="!isLoading && total > 0">
                                <template x-for="(item, index) in data" :key="item?.uuid">
                                    <tr class="border-b bg-white">
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                            <span x-text="index + 1" class="text-sm"></span>
                                        </th>
                                        <td class="px-6 py-4" x-text="item?.name"></td>
                                        <td class="px-6 py-4" x-text="item?.remark ? item?.remark : '---' "></td>


                                        <td class="px-6 py-4">
                                            <div class="flex gap-x-4">
                                                <a :href=`/roles/${item.uuid}/edit`
                                                   class="decoration-0 text-indigo-600 text-sm">Edit</a>
                                                <a href="#" @click="handleDelete(item?.uuid, item?.name)"
                                                   class="decoration-0 text-red-600 text-sm">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </template>
                            <template x-if="!isLoading && data?.length === 0">
                                <tr class="border-b">
                                    <td colspan="6" class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        No data available.
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full px-4">
                    @include('components.pagination')
                </div>
            </div>
        </div>
        @include('dialogs.success')
        @include('components.modals.confirm')
    </div>

    @section('scripts')
        <script>
            const token = document.head.querySelector("meta[name=\"csrf-token\"]").content;

            function data() {
                return {
                    data: [],
                    total: 0,
                    view: 20,
                    offset: 0,
                    pages: [],
                    searchInput: "",
                    isLoading: true,
                    pagination: {
                        lastPage: Math.ceil(this.total / 2)
                    },
                    currentPage: 1,
                    paginateOffset: 10,
                    isConfirmOpen: false,
                    confirmTxt: "",
                    confirmBtnTxt: "",
                    id: null,
                    errorMsg: "",
                    async fetchData(search) {
                        await axios.get("/roles", {
                            params: {
                                limit: this.view,
                                offset: this.offset,
                                search: search ?? this.searchInput,
                            }
                        })
                            .then(response => {
                                const data = response.data;
                                this.data = data?.data;
                                this.total = data?.count;
                                this.isLoading = false;
                                this.showPages();
                            }).catch(error => {
                                console.error("Error fetching data:", error);
                                this.isLoading = false;
                            });
                    },
                    async init() {
                        await this.fetchData();

                        this.$watch('searchInput', async () => {
                            await this.search(this.searchInput);
                        })
                    },
                    changePage(page) {
                        this.currentPage = page;
                        if (page >= 1 && page <= this.pagination.lastPage) {
                            this.currentPage = page;
                            this.offset = (page - 1) * this.view;
                            this.fetchData();
                        }
                    },
                    showPages() {
                        const pages = [];
                        let from = this.currentPage - Math.ceil(this.paginateOffset / 2);

                        if (from < 1) {
                            from = 1;
                        }

                        let to = from + this.paginateOffset - 1;
                        const lastPage = Math.ceil(this.total / this.view);
                        this.pagination.lastPage = lastPage;

                        if (to > lastPage) {
                            to = lastPage;
                        }

                        while (from <= to) {
                            pages.push(from);
                            from++;
                        }

                        this.pages = pages;
                    },
                    changeView() {
                        this.currentPage = 1;
                        this.offset = 0;
                        this.fetchData();
                    },
                    search(value) {
                        this.offset = 0;
                        this.currentPage = 1;
                        this.fetchData(value, this.status);
                    },
                    handleDelete(id, name) {
                        this.id = id;
                        this.isConfirmOpen = true;
                        this.confirmTxt = 'Are you sure to delete ' + name + ' ?';
                        this.confirmBtnTxt = 'Delete';
                        this.errorMsg = '';
                    },
                    cancelAction() {
                        this.acceptError = null;
                        this.isConfirmOpen = false;
                    },
                    async handleConfirmAction() {
                        this.isSubmitting = true;
                        if (this.id) {

                            await fetch(`/roles/${this.id}`, {
                                method: "DELETE",
                                headers: {
                                    Accept: "application/json",
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": token
                                }
                            }).then(response => response.json())
                                .then(data => {
                                    if (data.status) {
                                        this.isSubmitting = false;
                                        this.isConfirmOpen = false;

                                    } else {
                                        this.isSubmitting = false;
                                        this.acceptError = data.message;
                                        this.isResultOpen = false;
                                        this.isConfirmOpen = true;
                                    }
                                })
                                .catch(error => {
                                    console.error("Error fetching data:", error);
                                    this.isConfirmOpen = false;
                                    this.acceptError = error;
                                    this.isResultOpen = false;
                                });
                            await this.fetchData();
                        }
                    },
                    isSubmitting: false,
                    validationError: null,
                    isShowError: false,
                    isResultOpen: false,
                    resultMsg: null,
                    handleSearch() {
                        this.isResultOpen = false;
                        this.fetchData(this.searchInput);
                    },
                }
            }
        </script>
    @endsection
</x-app-layout>
