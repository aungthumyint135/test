<div id="logo-sidebar" aria-label="menu"
     class="fixed inset-y-0 z-50 flex h-screen w-72 -translate-x-full flex-col transition-transform lg:translate-x-0">
    <div class="bg-dots-lighter flex h-full grow flex-col gap-y-4 overflow-y-auto bg-slate-900 px-6"
         x-data="menuData">
        <div class="flex h-16 shrink-0 items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-x-4 text-white">
                <span class="sr-only">MCTPay</span>
                <img class="mx-auto h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="MCT Pay">
            </a>
            <span class="ms-3 text-base font-black text-white sm:text-lg">Merchant Portal</span>
        </div>

        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-2">
                        <li>
                            <x-menu-item href="{{ route('customer.dashboard') }}"
                                         :active="request()->routeIs('customer.dashboard')">
                                <x-icons.home class="h-6 w-6 flex-shrink-0" />
                                Dashboard
                            </x-menu-item>
                        </li>

                        @canany(['CashierListing'])
                            <li>
                                <button @click="handleCashierOpen()" type="button"
                                        class="flex w-full items-center gap-x-3 rounded-md bg-transparent px-4 py-2.5 text-sm font-semibold leading-6 text-slate-400 transition duration-75 hover:bg-slate-800 hover:text-white"
                                        aria-controls="setting" data-collapse-toggle="setting">
                                    <x-icons.calculator class="h-6 w-6 flex-shrink-0" />

                                    <span class="flex-1 whitespace-nowrap text-left">
                                        Cashier
                                    </span>

                                    <template x-if="isCashierOpen">
                                        <x-icons.chevron-up />
                                    </template>

                                    <template x-if="!isCashierOpen">
                                        <x-icons.chevron-down />
                                    </template>
                                </button>
                                <ul :class="{ 'hidden': !isCashierOpen }" class="hidden space-y-2 py-2">
                                    @if(canOffline() || canBoth())
                                        <li>
                                            <x-menu-item href="{{ route('customer.cashier-offline.index') }}"
                                                         :active="request()->routeIs('customer.cashier-offline.*')"
                                                         class="pl-[3.2rem]"
                                                         label="Offline" />
                                        </li>
                                    @endif

                                    @if(canOnline() || canBoth())
                                        <li>
                                            <x-menu-item href="{{ route('customer.cashier-online.index') }}"
                                                         :active="request()->routeIs('customer.cashier-online.*')"
                                                         class="pl-[3.2rem]"
                                                         label="Online" />
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endcanany

                        {{-- @can('CashierListing')
                            <li>
                                <x-menu-item href="{{ route('customer.invoices.index') }}"
                                             :active="request()->routeIs('customer.invoices.*')">
                                    <x-icons.receipt class="h-6 w-6 flex-shrink-0" />
                                    Invoice Management
                                </x-menu-item>
                            </li>
                        @endcan --}}

                        @canany(['TransactionListing', 'SettlementListing'])
                            <li>
                                <button @click="handleReportOpen()" type="button"
                                        class="flex w-full items-center gap-x-3 rounded-md bg-transparent px-4 py-2.5 text-sm font-semibold leading-6 text-slate-400 transition duration-75 hover:bg-slate-800 hover:text-white"
                                        aria-controls="setting" data-collapse-toggle="setting">
                                    <x-icons.history class="h-6 w-6 flex-shrink-0" />

                                    <span class="flex-1 whitespace-nowrap text-left">
                                    Reports
                                </span>

                                    <template x-if="isReportOpen">
                                        <x-icons.chevron-up />
                                    </template>

                                    <template x-if="!isReportOpen">
                                        <x-icons.chevron-down />
                                    </template>
                                </button>
                                <ul :class="{ 'hidden': !isReportOpen }" class="hidden space-y-2 py-2">
                                    @can('TransactionListing')
                                        <li>
                                            <x-menu-item href="{{ route('customer.transactions.index') }}"
                                                         :active="request()->routeIs('customer.transactions.*')"
                                                         class="pl-[3.2rem]" label="Transactions" />
                                        </li>
                                    @endcan

                                    @can('SettlementListing')
                                        <li>
                                            {{-- <x-menu-item href="{{ route('customer.settlement.index') }}" :active="request()->routeIs('customer.transactions.*')" class="pl-[3.2rem]"
                                                         label="Settlements" /> --}}
                                            <x-menu-item
                                            class="pl-[3.2rem]"
                                            label="Settlements"
                                            :href="route('customer.settlements.index')"
                                            :active="request()->routeIs('customer.settlements.*')"
                                            />
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany

                        @can('UserListing')
                            <li>
                                <x-menu-item href="{{ route('customer.staffs.index') }}"
                                             :active="request()->routeIs('customer.staffs.*')">
                                    <x-icons.users class="h-6 w-6 flex-shrink-0" />
                                    User Management
                                </x-menu-item>
                            </li>
                        @endcan

                        <li>
                            <x-menu-item href="{{ route('customer.company.index') }}"
                                         :active="request()->routeIs('customer.company.*')">
                                <x-icons.users class="h-6 w-6 flex-shrink-0" />
                                Company Management
                            </x-menu-item>
                        </li>
                        <li>
                            <x-menu-item href="{{ route('customer.store.index') }}"
                                         :active="request()->routeIs('customer.store.*')">
                                <x-icons.users class="h-6 w-6 flex-shrink-0" />
                                Store Management
                            </x-menu-item>
                        </li>

                        @canany(['ProfileListing', 'PasswordListing', '2FAListing'])
                            <li>
                                <button @click="handleSettingOpen()" type="button"
                                        class="flex w-full items-center gap-x-3 rounded-md bg-transparent px-4 py-2.5 text-sm font-semibold leading-6 text-slate-400 transition duration-75 hover:bg-slate-800 hover:text-white"
                                        aria-controls="setting" data-collapse-toggle="setting">
                                    <x-icons.gear class="h-6 w-6 flex-shrink-0" />

                                    <span class="flex-1 whitespace-nowrap text-left">
                                    Setting
                                </span>

                                    <template x-if="isSettingOpen">
                                        <x-icons.chevron-up />
                                    </template>

                                    <template x-if="!isSettingOpen">
                                        <x-icons.chevron-down />
                                    </template>
                                </button>
                                <ul :class="{ 'hidden': !isSettingOpen }" class="hidden space-y-2 py-2">
                                    <li>
                                        <x-menu-item href="{{ route('customer.merchant-qr') }}" label="Merchant QR"
                                                     class="pl-[3.2rem]"
                                                     :active="request()->routeIs('customer.merchant-qr')" />
                                    </li>
                                    @can('ProfileListing')
                                        <li>
                                            <x-menu-item href="{{ route('customer.profile.edit') }}"
                                                         label="Your Profile"
                                                         :active="request()->routeIs('customer.profile.edit')"
                                                         class="pl-[3.2rem]" />
                                        </li>
                                    @endcan
{{--
                                    @can('PasswordListing')
                                        <li>
                                            <x-menu-item href="#" label="Change Password" :active="false"
                                                         class="pl-[3.2rem]" />
                                        </li>
                                    @endcan

                                    @can('2FAListing')
                                        <li>
                                            <x-menu-item href="{{ route('customer.additional-security') }}"
                                                         label="Two-factor Authentication"
                                                         :active="request()->routeIs('customer.additional-security')"
                                                         class="pl-[3.2rem]" />
                                        </li>
                                    @endcan --}}
                                </ul>
                            </li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    @php
        $isCashier = request()->routeIs(['customer.cashier-offline.*', 'customer.cashier-online.*']);
        $isReport = request()->routeIs(['customer.transactions.*', 'customer.settlements.*']);
        $isSetting = request()->routeIs([
            'customer.merchant-qr', 'customer.profile.*',
             'customer.password.*', 'customer.additional-security'
        ]);
    @endphp

    <script>
        function menuData() {
            return {
                isSettingOpen: false,
                isReportOpen: false,
                isCashierOpen: false,
                handleSettingOpen() {
                    this.isSettingOpen = !this.isSettingOpen;
                },
                handleReportOpen() {
                    this.isReportOpen = !this.isReportOpen;
                },
                handleCashierOpen() {
                    this.isCashierOpen = !this.isCashierOpen;
                },
                init() {
                    this.isSettingOpen = {{ $isSetting ? 'true' : 'false' }};
                    this.isReportOpen = {{ $isReport ? 'true' : 'false' }};
                    this.isCashierOpen = {{ $isCashier ? 'true' : 'false' }};
                }
            }
        }
    </script>
</div>
