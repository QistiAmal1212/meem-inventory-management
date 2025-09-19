

<div class="flex h-screen">
    <!-- Sidebar (fixed width) -->
    <div class="w-0 lg:w-64 bg-white transition-all duration-300 overflow-hidden">
        <x-layouts.app.sidebar :title="$title ?? null" />
    </div>
    
    <!-- Main content (scrollable) -->
    <div class="pt-16 px-2 lg:px-2 overflow-y-auto flex-1 bg-neutral-50 h-[100vh]" data-flux-main>
        <br>
        {{ $slot }}
        
    </div>
    <x-layouts.app.navbar />
  
</div>
