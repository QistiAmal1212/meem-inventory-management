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
    <div class="flex flex-col bg-white min-h-screen w-full overflow-hidden">

        <!-- Top Bar -->
        <div class="w-[90%] px-[5%] py-5 ml-[10%] flex items-center">
            <!-- Logo -->
            <img class="w-28 h-11" src="{{ asset('images/meemgoldlogo.png') }}" alt="Meem Gold Logo" />

            <!-- Navigation -->
            <div class="flex ml-[30%] items-center space-x-8 text-blue-950 text-sm font-medium">
                <a href="#" class="text-right justify-start text-blue-950 text-sm font-medium font-['Poppins']">Home</a>
                <a href="#" class="text-right justify-start text-blue-950 text-sm font-medium font-['Poppins']">About us</a>
                <a href="#" class="text-right justify-start text-blue-950 text-sm font-medium font-['Poppins']">How it works</a>
                <a href="#" class="text-right justify-start text-blue-950 text-sm font-medium font-['Poppins']">Services</a>
                <a href="#" class="text-right justify-start text-blue-950 text-sm font-medium font-['Poppins']">Contact</a>
            </div>

            @if (Route::has('login'))
            @auth
            <a
            href="{{ route('dashboard') }}"
            class="w-[120px] h-10 ml-[40px] inline-flex items-center justify-center rounded-full bg-amber-400 hover:bg-amber-500 transition duration-200 text-white text-sm font-medium z-10"  
        >
            Dashboard
        </a>
            @else
                <!-- Log In Button -->
                <a
                href="{{ route('login') }}"
                class="w-[120px] h-10 ml-[40px] inline-flex items-center justify-center rounded-full bg-amber-400 hover:bg-amber-500 transition duration-200 text-white text-sm font-medium z-10"  
            >
                Log In
            </a>
            
            @endauth
        @endif
            </div>


        <!-- Main Content -->
        <div class="flex-1 px-[5%] ml-[10%] py-16 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10">

            <!-- Text Content -->
            <div class="max-w-2xl">
                <h1 class="text-4xl lg:text-6xl font-bold text-blue-950 leading-tight">
                    Real-Time Inventory Control to Manage
                    <span class="text-amber-400"> Gold Stock</span>
                </h1>
                <p class="mt-6 text-blue-950/70 text-base font-normal text-justify">
                    A secure gold inventory system for staff to track, manage, and monitor gold assets in real-time—anytime, anywhere.
                </p>
            </div>

       
            <div class="max-w-3xl">
                <img src="{{ asset('images/landingimage.png') }}" alt="gold" class="w-full h-auto ">
            </div>

            {{-- <div class="position absolute right-0 h-[60%] top-0">
                <img src="{{ asset('images/yellowsvg.svg') }}" alt="gold" class="w-full">
            </div> --}}

            {{-- nnti main  --}}
            {{-- <img src="{{ asset('images/bluesvg.svg') }}" alt="gold" class="w-[60%] position absolute right-[-3%] h-[55%] top-[20%]"> --}}
            <img src="{{ asset('images/yellowsvg.svg') }}" alt="gold" class="w-full position absolute right-[-25%] h-[95%] top-0">
            
        </div>

        @if (Route::has('login'))
            <div class="hidden lg:block h-14.5"></div>
        @endif
    </div>
</body>
</html>
