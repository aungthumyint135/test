<header
    class="sticky top-0 z-10 flex h-16 w-full flex-shrink-0 items-center justify-end gap-x-4 border-b border-slate-200 bg-white px-6 shadow-sm sm:gap-x-6"
    x-data="{ open: false, openMobileMenu: false }">

    <div class="flex-1 font-sans">
        <h2 class="font-semibold text-lg text-gray-900 leading-tight">
            {{ $title ?? 'Financial System' }}
        </h2>
    </div>

    <div x-cloak x-show="openMobileMenu" class="relative z-50 focus-visible:outline" aria-labelledby="sidebar"
         role="dialog" aria-modal="true">
        <div
            x-show="openMobileMenu"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-slate-900/[0.8] transition-opacity">
        </div>

        <div class="fixed inset-0 flex">
            <div class="relative mr-16 flex w-full max-w-xs flex-1 transform">
                <div x-cloak x-show="openMobileMenu"
                     class="relative transform transition-all w-full bg-slate-900 ring-1 ring-white/10"
                     x-transition:enter="transition ease-in-out duration-300 transform"
                     x-transition:enter-start="-translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transition ease-in-out duration-300 transform"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="-translate-x-full">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5 opacity-100">
                        <button
                            type="button"
                            class="-m-2.5 p-2.5 text-white"
                            x-on:click="openMobileMenu = false">
                            <span class="sr-only">Close sidebar</span>
                            <x-icons.x-mark />
                        </button>
                    </div>
                    <div class="flex flex-grow flex-col gap-y-5 overflow-y-auto">
                        <div class="flex h-16 shrink-0 items-center px-6">
                            <img class="h-11 w-auto" src="{{ asset('images/logo.png') }}" alt="MCT Va Biz">
                        </div>
                        <div class="px-6 pb-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative inline-block text-left">
        <button x-cloak x-on:click="open = true" type="button" class="-m-1.5 flex items-center p-1.5" id="menu-button"
            aria-expanded="true" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <span class="hidden lg:flex lg:items-center">
                <span class="px-1.5 text-sm font-semibold leading-6 text-slate-900">

                        {{ request()->user()?->name }}

                </span>
                <x-icons.chevron-down class="ml-2 text-slate-500" />
            </span>
        </button>
        <div x-cloak x-show="open" x-on:click.away="open = false" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-2" role="none">
{{--                <a href="#" class="block w-full px-4 py-2 text-start text-sm text-slate-700 hover:bg-slate-50"--}}
{{--                    role="menuitem" type="submit" tabindex="-1" id="menu-item-0">Your profile</a>--}}
                <form
                    action="@auth() {{ route('logout') }} @elseauth('customer') {{ route('customer.logout') }} @else @endauth"
                    method="POST" class="w-full">
                    @csrf
                    <button class="block w-full px-4 py-2 text-start text-sm text-slate-700 hover:bg-slate-50"
                        role="menuitem" type="submit" tabindex="-1" id="menu-item-0">
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
