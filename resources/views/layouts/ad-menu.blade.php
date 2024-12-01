<div id="logo-sidebar" aria-label="menu" x-data="menuData"
    class="fixed inset-y-0 z-50 flex h-screen w-72 -translate-x-full flex-col transition-transform lg:translate-x-0">
    <div class="bg-dots-lighter flex h-full grow flex-col gap-y-4 overflow-y-auto bg-gray-900 px-6">
        <div class="flex h-16 shrink-0 items-center">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-x-4 text-white">
                <span class="sr-only">MCTPay</span>
                <img class="mx-auto h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="MCT Pay">
            </a>
            <span class="ms-3 text-base font-black text-white sm:text-lg">Financial Portal</span>
        </div>

        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-3">
                        <li>
                            <x-menu-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                <x-icons.home class="size-6 flex-shrink-0" />
                                Home
                            </x-menu-item>
                        </li>

                        <li>
                            <button @click="handleSettOpen()" type="button"
                                class="flex w-full items-center gap-x-3 rounded-md bg-transparent p-2 text-sm font-semibold leading-6 text-gray-400 transition duration-75 hover:bg-gray-800 hover:text-white"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <x-icons.build-library class="size-6 flex-shrink-0" />
                                <span class="flex-1 whitespace-nowrap text-left">Portal Mgmt</span>
                                <template x-if="isSettOpen">
                                    <x-icons.chevron-up class="size-4 stroke-2" />
                                </template>
                                <template x-if="!isSettOpen">
                                    <x-icons.chevron-down class="size-4 stroke-2" />
                                </template>
                            </button>

                            <ul x-cloak :class="{ 'hidden': !isSettOpen }" class="hidden space-y-2 py-2">
                                <li>
                                    <x-menu-item href="{{ route('portal.heading-banners.index') }}" class="pl-11"
                                        :active="request()->routeIs('portal.heading-banners.*')">
                                        Heading Banner
                                    </x-menu-item>
                                </li>
                                <li>
                                    <x-menu-item href="{{ route('portal.clients.index') }}" class="pl-11"
                                        :active="request()->routeIs('portal.clients.*')">
                                        Clients
                                    </x-menu-item>
                                </li>
                                <li>
                                    <x-menu-item href="{{ route('portal.latest-news.index') }}" class="pl-11"
                                        :active="request()->routeIs('portal.latest-news.*')">
                                        News and Update
                                    </x-menu-item>
                                </li>

                            </ul>
                        </li>


                        <li>
                            <button @click="handleAdminOpen()" type="button"
                                class="flex w-full items-center gap-x-3 rounded-md bg-transparent p-2 text-sm font-semibold leading-6 text-gray-400 transition duration-75 hover:bg-gray-800 hover:text-white"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <x-icons.gear class="size-6 flex-shrink-0" />
                                <span class="flex-1 whitespace-nowrap text-left">Administration</span>
                                <template x-if="isAdOpen">
                                    <x-icons.chevron-up class="size-4 stroke-2" />
                                </template>
                                <template x-if="!isAdOpen">
                                    <x-icons.chevron-down class="size-4 stroke-2" />
                                </template>
                            </button>

                            <ul x-cloak :class="{ 'hidden': !isAdOpen }" class="hidden space-y-2 py-2">
                                <li>
                                    <x-menu-item href="{{ route('roles.index') }}" class="pl-11" :active="request()->routeIs('roles.*')">
                                        Role Mgmt
                                    </x-menu-item>
                                </li>
                                <li>
                                    <x-menu-item href="{{ route('users.index') }}" class="pl-11" :active="request()->routeIs('users.*')">
                                        Staff Mgmt
                                    </x-menu-item>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
