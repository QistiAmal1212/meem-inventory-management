<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-[#1b1b18] font-['Poppins'] min-h-screen flex flex-col">

    <!-- Wrapper -->
    <div class="flex flex-col bg-white min-h-screen w-full overflow-hidden relative">

        <!-- Top Bar -->
        <div class="w-full px-6 md:px-[5%] py-5 flex items-center justify-between">
            <!-- Logo -->
            <img class="w-24 h-9 md:w-28 md:h-11" src="{{ asset('images/meemgoldlogo.png') }}" alt="Meem Gold Logo" />

            @if (Route::has('login'))
                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="w-[100px] md:w-[120px] h-9 md:h-10 inline-flex items-center justify-center rounded-full bg-amber-400 hover:bg-amber-500 transition duration-200 text-white text-sm font-medium z-10"  
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="w-[100px] md:w-[120px] h-9 md:h-10 inline-flex items-center justify-center rounded-full bg-amber-400 hover:bg-amber-500 transition duration-200 text-white text-sm font-medium z-10"  
                    >
                        Log In
                    </a>
                @endauth
            @endif
        </div>

        <!-- Main Content -->
        <div class="flex-1 px-6 md:px-[5%] py-10 md:py-16 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10 relative">

            <!-- Text Content -->
            <div class="max-w-2xl z-10">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold text-blue-950 leading-tight">
                    Real-Time Inventory Control to Manage
                    <span class="text-amber-400"> Gold Stock</span>
                </h1>
                <p class="mt-6 text-blue-950/70 text-sm md:text-base font-normal text-justify">
                    A secure gold inventory system for staff to track, manage, and monitor gold assets in real-time—anytime, anywhere.
                </p>
            </div>

            <!-- Landing Image (hidden on mobile, only visible lg+) -->
            <div class="max-w-3xl hidden lg:block z-10">
                <img src="{{ asset('images/landingimage.png') }}" alt="gold" class="w-full h-auto">
            </div>

            <!-- Yellow Background SVG (always visible) -->
            <img src="{{ asset('images/yellowsvg.svg') }}" alt="gold" 
                 class="absolute right-[-20%] md:right-[-10%] top-0 h-[70%] md:h-[85%] lg:h-[95%] object-cover z-0">
        </div>

        @if (Route::has('login'))
            <div class="hidden lg:block h-14.5"></div>
        @endif
    </div>
</body>
</html>
