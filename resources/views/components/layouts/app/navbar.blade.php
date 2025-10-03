<!-- Main content area -->
<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Top navbar -->
    <div 
        class="fixed right-0 top-0 bg-white border-b border-gray-200 px-4 sm:px-6 py-4 flex items-center justify-between z-50 h-16 transition-all duration-300"
        :class="open ? 'left-60' : '!left-20'">
        
        <!-- Left side -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <!-- Sidebar toggle button (visible on small screens) -->
            {{-- <flux:sidebar.toggle class="block lg:hidden" icon="x-mark" /> --}}
            
            <!-- Breadcrumbs placeholder -->
            <div class="hidden sm:flex items-center space-x-2">
                <!-- Add breadcrumbs here if needed -->
            </div>

            <!-- Search -->
            <div class="hidden lg:flex flex-1 max-w-md h-9 border-2 rounded-[10px] px-3 items-center">
                <input
                    type="text"
                    placeholder="Carian"
                    class="w-full text-gray-700 placeholder-gray-400 focus:outline-none"
                />
            </div>
        </div>

        <!-- Right side actions -->
        <div class="flex items-center space-x-2 sm:space-x-4">

            <!-- Branch selector -->
            <livewire:navbar.selectbranch />

            <!-- Language dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center gap-2 rounded-full border border-gray-200 bg-white px-3 py-1 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                    <span class="flex items-center gap-2">
                        <template x-if="app()->getLocale() === 'en'">
                            <span class="text-lg">🇬🇧</span> English
                        </template>
                        <template x-if="app()->getLocale() === 'ms'">
                            <span class="text-lg">🇲🇾</span> BM
                        </template>
                        <template x-if="app()->getLocale() === 'zh'">
                            <span class="text-lg">🇨🇳</span> 中文
                        </template>
                    </span>
                    <svg class="h-4 w-4 text-gray-500 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" @click.outside="open = false" x-transition
                     class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-lg ring-1 ring-black/10 z-50"
                     x-cloak>
                    <ul class="py-2 text-sm text-gray-700">
                        <li>
                            <a href="#" @click="open = false" class="flex items-center justify-between gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-lg {{ app()->getLocale() === 'en' ? 'font-semibold bg-gray-50' : '' }}">
                                <span class="flex items-center gap-2"><span class="text-lg">🇬🇧</span> English</span>
                                @if(app()->getLocale() === 'en') <span class="text-green-500">✔</span> @endif
                            </a>
                        </li>
                        <li>
                            <a href="#" @click="open = false" class="flex items-center justify-between gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-lg {{ app()->getLocale() === 'ms' ? 'font-semibold bg-gray-50' : '' }}">
                                <span class="flex items-center gap-2"><span class="text-lg">🇲🇾</span> BM</span>
                                @if(app()->getLocale() === 'ms') <span class="text-green-500">✔</span> @endif
                            </a>
                        </li>
                        <li>
                            <a href="#" @click="open = false" class="flex items-center justify-between gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-lg {{ app()->getLocale() === 'zh' ? 'font-semibold bg-gray-50' : '' }}">
                                <span class="flex items-center gap-2"><span class="text-lg">🇨🇳</span> 中文</span>
                                @if(app()->getLocale() === 'zh') <span class="text-green-500">✔</span> @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Notifications -->
            @livewire('database-notifications')

            <!-- User dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center space-x-2 md:space-x-3 text-sm focus:outline-none">
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name ?? 'User Name' }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->role ?? 'Branch Manager' }}</p>
                    </div>
                    <img class="h-8 w-8 rounded-full object-cover"
                         src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&color=7C3AED&background=EDE9FE"
                         alt="User avatar">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-cloak x-show="open" @click.away="open = false" x-transition
                     class="absolute right-0 mt-2 w-72 bg-white shadow-sm border border-gray-200 rounded-xl z-50 text-sm overflow-hidden">
                    <!-- User info and actions here (same as before) -->
                </div>
            </div>
        </div>
    </div>
</div>
