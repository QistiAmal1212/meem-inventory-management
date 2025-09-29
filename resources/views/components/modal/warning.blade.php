@props([
    'show',        // Alpine boolean for modal visibility
    'title' => '', // Modal title
    'buttonText' => 'OK' // Footer button text
])

<div x-show="{{ $show }}" x-transition.opacity
     class="fixed inset-0 bg-black/30 flex items-center justify-center z-50"
     style="display: none;">

    <div @click.away="{{ $show }} = false"
         class="bg-white rounded-xl shadow-xl w-96 max-w-full p-6 transform transition-all duration-300 scale-95"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">

        <!-- Header -->
        <div class="flex items-center gap-2 mb-4">
            <x-icons.warning-icon />
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
        </div>

        <!-- Body -->
        <div>
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-6 flex justify-end">
            <button @click="{{ $show }} = false"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-md font-medium transition">
                {{ $buttonText }}
            </button>
        </div>

    </div>
</div>
