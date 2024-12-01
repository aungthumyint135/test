<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Event Mgmt System | MCTPay</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            @include('layouts.ad-menu')

            <div class="lg:pl-72">
                @include('layouts.auth-header')

                <!-- Page Content -->
                <main class="px-6 py-5">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @if(session('success'))
            <x-modals.success :message="session('success')" />
        @endif

        @if(session('failed'))
            <x-modals.success :message="session('failed')" />
        @endif

        @if(session('error'))
            <x-modals.success :message="session('error')" />
        @endif
    </body>

    @php
        $isDirRoutes = request()->routeIs(['holidays.*', 'taxes.*']);
        $isAdRoutes = request()->routeIs(['roles.*', 'users.*', 'configs.*']);
        $isPtrRouters = request()->routeIs(['merchants.*', 'agents.*', 'merchants.commissions.*']);
        $isReportRoutes = request()->routeIs([
            'quarantine-txn.*', 'unsettlement-txn', 'settlement-reports.*', 'financial-reports.*'
        ]);
        $isSettRoutes = request()->routeIs([
            'portal.heading-banners.*',
        ]);
    @endphp

    @yield('scripts')
    <script>
        function menuData() {
            return {
                isAdOpen: false,
                isSettOpen: false,
                isPtrOpen: false,
                isDirOpen: false,
                isReportOpen: false,
                handleAdminOpen() {
                    this.isAdOpen = !this.isAdOpen;
                },
                handleSettOpen() {
                    this.isSettOpen = !this.isSettOpen;
                },
                handlePtrOpen() {
                    this.isPtrOpen = !this.isPtrOpen;
                },
                handleDirOpen() {
                    this.isDirOpen = !this.isDirOpen;
                },
                handleReportOpen() {
                    this.isReportOpen = !this.isReportOpen;
                },
                init() {
                    this.isAdOpen = {{ $isAdRoutes ? 'true' : 'false' }};
                    this.isSettOpen = {{ $isSettRoutes ? 'true' : 'false' }};
                    this.isPtrOpen = {{ $isPtrRouters ? 'true' : 'false' }};
                    this.isDirOpen = {{ $isDirRoutes ? 'true' : 'false' }};
                    this.isReportOpen = {{ $isReportRoutes ? 'true' : 'false' }};
                }
            }
        }
    </script>
</html>
