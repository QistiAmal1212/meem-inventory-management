
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light"> 
   
     <x-ts-banner wire classes="z-600"/> 
   
    <head>
        @include('partials.head')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        @filamentStyles
    </head>
    <body class="min-h-screen bg-white !light">

<div class="flex h-screen"   x-data="{ open: true }" >
 
   <x-layouts.app.sidebar />
   
     <x-toast-qisti />

   
    <!-- Main content (scrollable) -->
    <div class="pt-16 px-2 lg:px-2 overflow-y-auto flex-1 bg-neutral-50 h-[100vh]" >
          <x-layouts.app.navbar /> <br>
        {{ $slot }}
        
    </div>
    
</div>
 
        @livewire('notifications')
        <tallstackui:script /> 
        @filamentScripts

        @fluxScripts  
       
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                document.documentElement.classList.remove("dark")
            })
   </script>
        
    </body>
</html>