@props([
    'href' => '#',   // default link
    'text' => 'Add Item', // default text
])

<a href="{{ $href }}" 
   class="h-10 px-5 bg-amber-400 rounded-[10px] inline-flex justify-center items-center gap-2.5 hover:bg-amber-500 transition-colors">

    <!-- Icon -->
    <div class="w-6 h-6 relative overflow-hidden">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 7V15M15 11H7M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" 
                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <!-- Text -->
    <div class="text-gray-50 text-base font-light font-['Lexend'] leading-normal">
        {{ $text }}
    </div>
</a>
