<nav id="nav" x-data="{ isMobileMenuOpen: false }"
     class="fixed top-0 z-10 w-full text-white transition-colors hover:bg-white hover:text-black h-[80px] flex items-center">
    <div class="container flex justify-center xs:justify-end md:justify-center items-center px-4 sm:px-6 lg:px-8">
        {{--        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">--}}
        {{--            <img src="{{asset('images/portal/nav-logo.png')}}" class="h-8" alt="MCT Logo" />--}}
        {{--            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">MCTPAY</span>--}}
        {{--        </a>--}}

        <div class="hidden lg:flex items-center justify-center p-[20px]">
            <ul class="flex gap-2 flex-col p-4 md:p-0 border rounded-lg md:space-x-10 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li class="flex items-center p-2 px-3 rounded">
                    <a href="{{ route('portal') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="{{asset('images/portal/nav-logo.png')}}" class="h-8" alt="MCT Logo" />
                        <span class="self-center text-2xl font-bold whitespace-nowrap">MCTPAY</span>
                    </a>
                </li>

                <li class="flex items-center p-2 px-3 rounded">
                    <a href="{{ route('portal') }}">
                        {{ __("message.home") }}
                    </a>
                </li>

                <li class="flex items-center p-2 px-3 rounded">
                    <div x-data="{ isSolutionOpen: false, openedWithKeyboard: false, leaveTimeout: null }"
                         @mouseleave.prevent="leaveTimeout = setTimeout(() => { isSolutionOpen = false }, 150)"
                         @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true"
                         @keydown.esc.prevent="isSolutionOpen = false, openedWithKeyboard = false"
                         @click.outside="isSolutionOpen = false, openedWithKeyboard = false" class="relative"
                    >

                        <span class="block py-2 px-1 rounded"
                              @mouseover="isSolutionOpen = true"
                              @keydown.space.prevent="openedWithKeyboard = true"
                              @keydown.enter.prevent="openedWithKeyboard = true"
                              @keydown.down.prevent="openedWithKeyboard = true"
                              class="text-white inline-flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 tracking-wide transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-800 nav-items"
                              {{--                              :class="isSolutionOpen || openedWithKeyboard ? 'text-neutral-900' : 'text-neutral-600 '"--}}
                              :aria-expanded="isSolutionOpen || openedWithKeyboard" aria-haspopup="true">

                             Solutions
                        </span>
                        <div x-cloak
                             x-show="isSolutionOpen || openedWithKeyboard"
                             x-transition x-trap="openedWithKeyboard"
                             @click.outside="isSolutionOpen = false, openedWithKeyboard = false"
                             @keydown.down.prevent="$focus.wrap().next()"
                             @keydown.up.prevent="$focus.wrap().previous()"
                             class="absolute top-150 left-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300"
                             role="menu">

                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                                hover:bg-gray-100 hover:text-gray-600
                                focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                Solution 1
                            </a>
                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                Solution 2
                            </a>

                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                Solution 3
                            </a>

                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                Solution 4
                            </a>

                        </div>
                    </div>


                    <x-icons.chevron-down class="size-4 stroke-2" />
                </li>


                <li class="flex items-center p-2 px-3 rounded">

                    <div x-data="{ isSolutionOpen: false, openedWithKeyboard: false, leaveTimeout: null }"
                         @mouseleave.prevent="leaveTimeout = setTimeout(() => { isSolutionOpen = false }, 150)"
                         @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true"
                         @keydown.esc.prevent="isSolutionOpen = false, openedWithKeyboard = false"
                         @click.outside="isSolutionOpen = false, openedWithKeyboard = false" class="relative">

                        <span class="block py-2 px-1 rounded"
                              @mouseover="isSolutionOpen = true"
                              @keydown.space.prevent="openedWithKeyboard = true"
                              @keydown.enter.prevent="openedWithKeyboard = true"
                              @keydown.down.prevent="openedWithKeyboard = true"
                              class="inline-flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-800"
                              {{--                              :class="isSolutionOpen || openedWithKeyboard ? 'text-neutral-900' : 'text-neutral-600'"--}}
                              :aria-expanded="isSolutionOpen || openedWithKeyboard" aria-haspopup="true">

                            About Us

                        </span>

                        <div x-cloak
                             x-show="isSolutionOpen || openedWithKeyboard"
                             x-transition x-trap="openedWithKeyboard"
                             @click.outside="isSolutionOpen = false, openedWithKeyboard = false"
                             @keydown.down.prevent="$focus.wrap().next()"
                             @keydown.up.prevent="$focus.wrap().previous()"
                             class="absolute top-150 left-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300"
                             role="menu">

                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                About us 1
                            </a>
                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                About us 2
                            </a>
                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                About us 3
                            </a>
                        </div>
                    </div>

                    <x-icons.chevron-down class="size-4 stroke-2" />
                </li>

                <li class="flex items-center p-2 px-1 rounded">

                    <div x-data="{ isSolutionOpen: false, openedWithKeyboard: false, leaveTimeout: null }"
                         @mouseleave.prevent="leaveTimeout = setTimeout(() => { isSolutionOpen = false }, 150)"
                         @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true"
                         @keydown.esc.prevent="isSolutionOpen = false, openedWithKeyboard = false"
                         @click.outside="isSolutionOpen = false, openedWithKeyboard = false" class="relative">

                        <span class="block py-2 px-1 rounded"
                              @mouseover="isSolutionOpen = true"
                              @keydown.space.prevent="openedWithKeyboard = true"
                              @keydown.enter.prevent="openedWithKeyboard = true"
                              @keydown.down.prevent="openedWithKeyboard = true"
                              class="inline-flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-800"
                              {{--                              :class="isSolutionOpen || openedWithKeyboard ? 'text-neutral-900' : 'text-neutral-600'"--}}
                              :aria-expanded="isSolutionOpen || openedWithKeyboard" aria-haspopup="true">

                             Support

                        </span>

                        <div x-cloak
                             x-show="isSolutionOpen || openedWithKeyboard"
                             x-transition x-trap="openedWithKeyboard"
                             @click.outside="isSolutionOpen = false, openedWithKeyboard = false"
                             @keydown.down.prevent="$focus.wrap().next()"
                             @keydown.up.prevent="$focus.wrap().previous()"
                             class="absolute top-150 left-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300"
                             role="menu">

                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                Support 1
                            </a>
                            <a href="#" class="bg-white px-4 py-2 text-sm text-neutral-600
                            hover:bg-gray-100 hover:text-gray-600
                            focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                Support 2
                            </a>

                        </div>
                    </div>

                    <x-icons.chevron-down class="size-4 stroke-2" />
                </li>


                <li class="flex items-center p-2 px-3 rounded">
                    <x-icons.language class="size-4 stroke-2" />

                    <div x-data="{ isSolutionOpen: false, openedWithKeyboard: false, leaveTimeout: null }"
                         @mouseleave.prevent="leaveTimeout = setTimeout(() => { isSolutionOpen = false }, 150)"
                         @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true"
                         @keydown.esc.prevent="isSolutionOpen = false, openedWithKeyboard = false"
                         @click.outside="isSolutionOpen = false, openedWithKeyboard = false" class="relative">

                        <span class="block py-2 px-1 rounded"
                              @mouseover="isSolutionOpen = true"
                              @keydown.space.prevent="openedWithKeyboard = true"
                              @keydown.enter.prevent="openedWithKeyboard = true"
                              @keydown.down.prevent="openedWithKeyboard = true"
                              class="inline-flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-800"
                              {{--                              :class="isSolutionOpen || openedWithKeyboard ? 'text-neutral-900' : 'text-neutral-600'"--}}
                              :aria-expanded="isSolutionOpen || openedWithKeyboard" aria-haspopup="true">
                             Language
                        </span>


                        <div x-cloak
                             x-show="isSolutionOpen || openedWithKeyboard"
                             x-transition x-trap="openedWithKeyboard"
                             @click.outside="isSolutionOpen = false, openedWithKeyboard = false"
                             @keydown.down.prevent="$focus.wrap().next()"
                             @keydown.up.prevent="$focus.wrap().previous()"
                             class="absolute top-150 left-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300"
                             role="menu">

                            <a href="{{ route('change.lang', ['lang' => 'en']) }}"
                               class="bg-white px-4 py-2 text-sm text-neutral-600
                                hover:bg-gray-100 hover:text-gray-600
                                focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                ENGLISH
                            </a>
                            <a href="{{ route('change.lang', ['lang' => 'ch']) }}"
                               class="bg-white px-4 py-2 text-sm text-neutral-600
                                hover:bg-gray-100 hover:text-gray-600
                                focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none"
                               role="menuitem">
                                CHINESE
                            </a>
                        </div>
                    </div>
                    <x-icons.chevron-down class="size-4 stroke-2" />

                </li>

                <li class="flex items-center rounded">
                    <button class="bg-btn-primary px-[32px] py-[16px] rounded-[16px]"> Contact Us</button>
                </li>
            </ul>

        </div>
    </div>

    <!-- Mobile Menu Button -->
    <div x-data="{ scrolled: false }"
         x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 0;
        })
     "
         class="lg:hidden flex items-center justify-center p-2 w-12 h-12 rounded-l-lg cursor-pointer"
         :class="scrolled ? 'text-black bg-white' : 'text-white'"
         @click="isMobileMenuOpen = !isMobileMenuOpen">

        <svg id="hamburgerButton" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </div>


    <!-- Mobile Drawer Menu -->
    <div x-show="isMobileMenuOpen" x-transition:enter="transition-transform ease-in-out duration-300"
         x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0"
         x-transition:leave="transition-transform ease-in-out duration-300" x-transition:leave-start="transform translate-x-0"
         x-transition:leave-end="transform translate-x-full" class="fixed inset-0 z-50 bg-gray-800 bg-opacity-50 lg:hidden">
        <div class="absolute top-0 right-0 w-3/4 h-full bg-white p-4">
            <!-- Close Button -->
            <button @click="isMobileMenuOpen = false" class="absolute top-4 right-4 text-gray-700">
                &times;
            </button>
            <ul class="space-y-4">
                <li><a href="{{ route('portal') }}" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">Home</a></li>
                <li x-data="{ open: false }">
                    <a href="#" @click.prevent="open = !open" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white">
                        Solutions
                    </a>

                    <!-- Collapsed submenu for Solutions -->
                    <ul x-show="open" x-transition class="pl-6 space-y-2">
                        <li><a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">Solution 1</a></li>
                        <li><a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">Solution 2</a></li>
                    </ul>
                </li>
                <li><a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">About Us</a></li>
                <li><a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">Support</a></li>
                <li><a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">Language</a></li>
                <li><a href="#" class="block p-2 text-gray-700 hover:bg-gray-200 hover:text-white z-200">Contact Us</a></li>
            </ul>
        </div>
    </div>


    {{--        <div class="w-1/12 p-4">--}}
    {{--            last--}}
    {{--        </div>--}}
</nav>
