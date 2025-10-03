<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen !bg-white antialiased">
    <div class="relative flex min-h-screen">

        {{-- Left column (hidden on mobile) --}}
        <div class="hidden lg:flex w-1/2 relative items-center justify-center">
            <img src="{{ asset('images/logingold.svg') }}" 
                 alt="gold" 
                 class="w-[550px] h-[550px] absolute left-[15%] top-20">

            <img src="{{ asset('images/yellowsvg.svg') }}" 
                 alt="gold" 
                 class="w-full h-[90%] absolute top-0  left-[-15%] rotate-180">

            <img src="{{ asset('images/bluesvg.svg') }}" 
                 alt="blue" 
                 class="w-full h-[40%] absolute top-40  left-[0%] rotate-180">
        </div>

        {{-- Right column (slot content, full width on mobile) --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-2">
            {{ $slot }}
        </div>
    </div>

    @fluxScripts
</body>
</html>
