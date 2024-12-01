<x-app-layout>
    <x-slot name="title">Staff Management</x-slot>
    <div class="w-full" x-data="data">
        <div class="grid w-full grid-cols-1 space-y-5 rounded-lg border border-gray-200 bg-white py-6">
            <div class="flex flex-row justify-end px-4">
                <x-inputs.text x-model="searchInput" type="search" id="searchInput" placeholder="Search..."
                    class="mr-3 w-[256px] py-1.5 text-sm" />
                <x-buttons.primary-link href="{{ route('users.create') }}">
                    Create
                </x-buttons.primary-link>
            </div>

            <div class="w-full border-t border-gray-200">
                <div class="relative overflow-x-auto rounded-md">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 text-sm capitalize text-gray-700">
                            <tr class="border-b border-gray-100">
                                <th scope="col" class="px-6 py-5">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Role
                                </th>
                                <th></th>
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
                                <template x-for="item in data" :key="item.uuid">
                                    <tr class="border-b bg-white">

                                        <td class="px-6 py-4" x-text="item?.name"></td>
                                        <td class="px-6 py-4" x-text="item?.email"></td>
                                        <td class="px-6 py-4" x-text="item?.role ? item?.role?.name : '---'"></td>

                                        <td class="px-6 py-4">
                                            <div class="flex gap-x-4">
                                                <a :href=`/users/${item.uuid}/edit`
                                                    class="text-sm font-medium text-indigo-600 decoration-0">Edit</a>
                                                <a href="#" @click="handleDelete(item?.uuid, item?.name)"
                                                    class="text-sm font-medium text-red-600 decoration-0">Delete</a>
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
        @include('dialogs.success')
        @include('components.modals.confirm')

    </div>

    @section('scripts')
        <script>
            const token = document.head.querySelector("meta[name=\"csrf-token\"]").content;

            function data() {
                return {
                    id: null,
                    data: [],
                    total: 0,
                    view: 20,
                    offset: 0,
                    pages: [],
                    searchInput: "",
                    staffInfo: "",
                    roleId: '',
                    isLoading: true,
                    pagination: {
                        lastPage: Math.ceil(this.total / 2)
                    },
                    nameSort: false,
                    currentPage: 1,
                    isConfirmOpen: false,
                    confirmTxt: "",
                    errorMsg: "",
                    confirmBtnTxt: "",
                    paginateOffset: 10,
                    async fetchData() {
                        this.isLoading = true;
                        await axios.get("/users", {
                            params: {
                                limit: this.view,
                                offset: this.offset,
                                name_sort: this.nameSort,
                                search: this.staffInfo,
                                role_id: this.roleId ?? null
                            }
                        }).then(response => {
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
                    handleDelete(id, merchant_id) {
                        this.id = id;
                        this.isConfirmOpen = true;
                        this.confirmTxt = 'Are you sure to disable ' + merchant_id + ' ?';
                        this.confirmBtnTxt = 'Disable';
                        this.errorMsg = '';
                    },
                    cancelAction() {
                        this.acceptError = null;
                        this.isConfirmOpen = false;
                    },
                    async handleConfirmAction() {
                        this.isSubmitting = true;
                        if (this.id) {
                            await fetch(`/users/${this.id}`, {
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
                    isOpenImport: false,
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
