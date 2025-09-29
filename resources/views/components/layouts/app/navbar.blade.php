   <!-- Main content area -->
   <div class="flex-1 flex flex-col overflow-hidden">
    <!-- Top navbar (only on right side) -->
    <div 
    class="fixed right-0 top-0 bg-white !border-b !border-gray-200 px-6 py-4 flex items-center justify-between z-49 h-16 left-60"
    :class="open ? 'left-60' : 'left-20'">

        <!-- Left side - Breadcrumbs -->
        <div class="flex items-center space-x-4">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
                    {{-- Search --}}
                    {{-- <div class="hidden lg:flex w-[495.74px] h-9 border-2 rounded-[10px] px-4 items-center">
                        <input
                            type="text"
                            placeholder="Carian"
                            class=" focus:outline-none text-gray-700 w-full placeholder-gray-400"
                        />
                    </div> --}}
<!-- resources/views/components/locale-switcher.blade.php -->

        
                    
        
        </div>

        <!-- Right side actions -->
        <div class="flex items-center space-x-4">
 <livewire:navbar.selectbranch />

      
 <div x-data="{ open: false }" class="relative">
    <!-- Dropdown button -->
    <button @click="open = !open"
        class="flex items-center gap-2 rounded-full border border-gray-200 bg-white px-4 py-1 text-sm font-medium text-gray-700  hover:bg-gray-50 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
        <span class="flex items-center gap-2">
            @if(app()->getLocale() === 'en')
                <span class="text-lg">🇬🇧</span> English
            @elseif(app()->getLocale() === 'ms')
                <span class="text-lg">🇲🇾</span> BM
            @elseif(app()->getLocale() === 'zh')
                <span class="text-lg">🇨🇳</span> 中文
            @endif
        </span>
        <svg class="h-4 w-4 text-gray-500 transition-transform duration-200"
             :class="{ 'rotate-180': open }"
             xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div x-show="open" @click.outside="open = false" x-transition
         class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-lg ring-1 ring-black/10 z-50"
         x-cloak>
        <ul class="py-2 text-sm text-gray-700">
            <li>
                <a href="#" @click="open = false"
                   class="flex items-center justify-between gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-lg
                          {{ app()->getLocale() === 'en' ? 'font-semibold bg-gray-50' : '' }}">
                    <span class="flex items-center gap-2"><span class="text-lg">🇬🇧</span> English</span>
                    @if(app()->getLocale() === 'en') <span class="text-green-500">✔</span> @endif
                </a>
            </li>
            <li>
                <a href="#" @click="open = false"
                   class="flex items-center justify-between gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-lg
                          {{ app()->getLocale() === 'ms' ? 'font-semibold bg-gray-50' : '' }}">
                    <span class="flex items-center gap-2"><span class="text-lg">🇲🇾</span> BM</span>
                    @if(app()->getLocale() === 'ms') <span class="text-green-500">✔</span> @endif
                </a>
            </li>
            <li>
                <a href="#" @click="open = false"
                   class="flex items-center justify-between gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-lg
                          {{ app()->getLocale() === 'zh' ? 'font-semibold bg-gray-50' : '' }}">
                    <span class="flex items-center gap-2"><span class="text-lg">🇨🇳</span> 中文</span>
                    @if(app()->getLocale() === 'zh') <span class="text-green-500">✔</span> @endif
                </a>
            </li>
        </ul>
    </div>
</div>
               

            {{-- Notification --}}
          
            @livewire('database-notifications')

            
            {{-- User --}}
            <div class="" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-3 text-sm focus:outline-none">
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
            
                <div     x-cloak
                x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-72 bg-white shadow-sm border border-gray-200 rounded-xl z-50 text-sm overflow-hidden">
           
               <!-- User Info -->
               <div class="flex items-center gap-3 py-3">
                   <div class="bg-gray-100 w-10 h-10 rounded-md flex items-center justify-center font-medium text-gray-900">
                       {{ auth()->user()->initials() }}
                   </div>
                   <div class="leading-tight">
                       <div class="font-bold text-black">{{ auth()->user()->name }}</div>
                       <div class="text-gray-700 text-sm">{{ auth()->user()->email }}</div>
                   </div>
               </div>
           
               <!-- Divider -->
               <div class="border-t border-gray-200"></div>
           
               <!-- Settings -->
               <a href="{{ route('settings.profile') }}"
                  class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 text-gray-800 font-semibold">
                   <!-- Settings Icon -->
                   <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round"
                             d="M11.983 13.983a2 2 0 1 0 0-3.999 2 2 0 0 0 0 3.999ZM19.435 12.145c.042-.3.065-.607.065-.926s-.023-.626-.066-.928l2.036-1.597a.468.468 0 0 0 .112-.591l-1.928-3.338a.468.468 0 0 0-.568-.207l-2.4.965a7.13 7.13 0 0 0-1.604-.928l-.363-2.522a.468.468 0 0 0-.463-.398h-3.856a.468.468 0 0 0-.463.398l-.363 2.522a7.09 7.09 0 0 0-1.604.928l-2.4-.965a.468.468 0 0 0-.568.207L2.352 8.103a.468.468 0 0 0 .112.591l2.036 1.597a7.38 7.38 0 0 0 0 1.854l-2.036 1.597a.468.468 0 0 0-.112.591l1.928 3.338c.135.235.42.331.568.207l2.4-.965a7.13 7.13 0 0 0 1.604.928l.363 2.522a.468.468 0 0 0 .463.398h3.856a.468.468 0 0 0 .463-.398l.363-2.522a7.09 7.09 0 0 0 1.604-.928l2.4.965c.148.124.433.028.568-.207l1.928-3.338a.468.468 0 0 0-.112-.591l-2.036-1.597Z" />
                   </svg>
                   {{ __('Settings') }}
               </a>
           
               <!-- Divider -->
               <div class="border-t border-gray-200"></div>
           
               <!-- Logout -->
               <form method="POST" action="{{ route('logout') }}">
                   @csrf
                   <button type="submit"
                           class="flex items-center gap-3 w-full px-4 py-3 hover:bg-gray-50 text-gray-800 font-semibold">
                       <!-- Logout Icon -->
                       <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M17 16l4-4m0 0l-4-4m4 4H9m4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1" />
                       </svg>
                       {{ __('Log Out') }}
                   </button>
               </form>
           </div>
           
            </div>
            
        </div>
    </div>


</div>