<div 
    x-data="{ open: @entangle('showModal') }" 
    x-cloak
>
    <!-- Overlay -->
    <div 
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
        style="display: none;"
    >
        <!-- Modal -->
        <div 
            @click.away="open = false"
            class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl transform transition-all duration-300 scale-95 flex flex-col"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
        >
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50 rounded-t-2xl">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-full bg-yellow-100 text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke-width="1.5" 
                             stroke="currentColor" 
                             class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M12 6v6l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight font-poppins">
                        Timeline
                    </h2>
                </div>
                <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="2" 
                         stroke="currentColor" 
                         class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

<!-- Scrollable Body -->
<div class="p-6 space-y-6 overflow-y-auto max-h-[70vh] snap-y snap-mandatory"    
     x-on:scroll="
        if ($el.scrollTop + $el.clientHeight >= $el.scrollHeight - 50 && @this.timelines.length < @this.total) {
            @this.call('loadMore')
        }
     ">
    <ol class="relative border-s border-gray-200">
        @foreach($timelines as $item)                  
            <li class="mb-8 ms-6 group transition snap-start">
                <!-- Dot -->
                <span class="absolute flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full -start-3 ring-8 ring-white">
                    <svg class="w-3 h-3 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                </span>

                <!-- Card -->
                <div class="p-4 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->user->name) }}&background=fdb73e&color=fff" 
                             alt="{{ $item->user->name }}" 
                             class="w-10 h-10 rounded-full shadow-sm">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-800">
                                {{ $item->user->name }}
                            </h3>
                            <time class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y | h:i A') }}
                            </time>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Restocked <span class="font-semibold text-yellow-600">{{ $item->product->name }}</span> 
                        ( {{ $item->quantity }} Qty )
                    </p>
                    @if($item->remark)
                        <p class="mt-2 text-sm text-gray-500 italic">“{{ $item?->remark }}”</p>
                    @endif
                </div>
            </li>
        @endforeach

        <!-- Loader -->
        <div wire:loading.flex class="justify-center py-4 text-gray-500 text-sm snap-start">
            <svg class="animate-spin h-5 w-5 mr-2 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            Loading more...
        </div>
        
        <!-- End states -->
        @if(count($timelines) >= $total && $total > 0)
            <div class="text-center py-4 text-gray-400 text-sm snap-start">
                💡 No more data found
            </div>
        @elseif ($total == 0)
            <div class="flex items-center justify-center gap-3 py-4 px-6 mx-auto mt-6 text-gray-700 text-base bg-gray-100 rounded-xl border border-gray-200 w-max mb-8 snap-start">
                <span class="text-gray-500 text-2xl">📭</span>
                <span>No data found</span>
            </div>
        @endif
    </ol>
</div>

        </div>
    </div>
</div>
