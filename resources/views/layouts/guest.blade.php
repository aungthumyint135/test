<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MCTPay</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <head>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
    </head>


    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>
<body class="bg-primary-100 antialiased">


@php
    $isLogin = request()->routeIs('login');
@endphp
@if(!$isLogin)
    @include('layouts.public.nav')
@endif
<main class="flex flex-col items-center justify-center">
    <div class="w-full">
        <!-- Page Content -->
        {{ $slot }}
    </div>
</main>
@if(!$isLogin)
    @include('layouts.public.footer')
@endif


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

@yield('scripts')
<script>
    function navData() {
        return {
            isSolutionOpen: false,
            isAboutUsOpen: false,
            isSupportOpen: false,
            handleSolutionOpen() {
                this.isSolutionOpen = !this.isSolutionOpen;
            },
            handleAboutUsOpen() {
                this.isAboutUsOpen = !this.isAboutUsOpen;
            },
            handleSupportOpen() {
                this.isSupportOpen = !this.isSupportOpen;
            },

            init() {
                this.isSolutionOpen = false;
                this.isAboutUsOpen = false;
                this.isSupportOpen = false;
            }
        }
    }
</script>
</html>
