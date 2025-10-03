<div 
    x-data="{ open: @entangle('showModal') }" 
    x-cloak
>

    <!-- Overlay -->
    <div 
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/30 flex items-center justify-center z-50"
        style="display: none;"
    >
        <!-- Modal -->
        <div 
            @click.away="open = false"
            class="bg-white rounded-2xl shadow-2xl w-2/3 max-w-xl p-8 transform transition-all duration-300 scale-95"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95">
                <!-- Header -->
            <div class="relative mb-4 text-center">
                <!-- Icon -->
                <div class="flex justify-center mb-2">
                    <x-icon.animation-stock class="w-10 h-10 text-yellow-500" />
                </div>
                <!-- Title -->
                <h2 class="text-xl font-bold">Modal Title</h2>
                
                <!-- Close Button (top-right absolute) -->
                <button 
                    @click="open = false" 
                    class="absolute top-0 right-0 text-gray-500 hover:text-gray-700 text-2xl"
                >
                    &times;
                </button>
                </div>


         <!-- Body -->
<div class="space-y-4">
  

</div>

        </div>
    </div>
</div>
