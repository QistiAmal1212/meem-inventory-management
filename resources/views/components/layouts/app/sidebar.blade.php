<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        @include('partials.head')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        @filamentStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="fz-40 bg-white dark:border-zinc-700 dark:bg-zinc-900 border-0
        {{--border-e border-zinc-200 --}}
        ">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex justify-center items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <img  src="{{ asset('images/meemgoldlogo.png') }}" alt="Meem Gold Logo" />

            </a>
        
            <flux:navlist variant="outline" class="mt-4">
                {{-- <flux:navlist.group :heading="__('Platform')" class="grid"> --}}
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group mt-2">
                        <div class="relative w-16 h-10 rounded-tr-[5px] rounded-br-[5px] flex items-center justify-center">
                            @if (request()->routeIs('dashboard'))
                            <!-- Background layer with opacity (only if active) -->
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
                        @endif
                            <!-- Smaller SVG icon -->
                            <svg class="relative z-10 w-6 h-6" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.267 17.1753C13.2006 17.1755 14.7503 18.617 14.7504 20.4106V24.7173C14.7504 26.4984 13.2006 27.9514 11.267 27.9517H6.63025C4.71023 27.9515 3.14685 26.4984 3.14685 24.7173V20.4106C3.14694 18.617 4.71029 17.1755 6.63025 17.1753H11.267ZM27.0941 17.1753C29.0142 17.1753 30.5784 18.6169 30.5785 20.4106V24.7173C30.5785 26.4985 29.0143 27.9517 27.0941 27.9517H22.4584C20.5246 27.9516 18.975 26.4985 18.975 24.7173V20.4106C18.9751 18.6169 20.5246 17.1754 22.4584 17.1753H27.0941ZM11.267 2.68604C13.2006 2.68628 14.7504 4.13904 14.7504 5.92139V10.228C14.7503 12.0217 13.2006 13.4612 11.267 13.4614H6.63025C4.7103 13.4612 3.14696 12.0217 3.14685 10.228V5.92139C3.14685 4.139 4.71023 2.68622 6.63025 2.68604H11.267ZM27.0941 2.68604C29.0143 2.68604 30.5785 4.13889 30.5785 5.92139V10.228C30.5784 12.0218 29.0142 13.4614 27.0941 13.4614H22.4584C20.5246 13.4613 18.9751 12.0218 18.975 10.228V5.92139C18.975 4.13895 20.5246 2.68612 22.4584 2.68604H27.0941Z" 
                                fill="{{ request()->routeIs('dashboard') ? '#FBAE2C' : '#9CA3AF' }}"/>
                            </svg>
                        </div>
                        <span class="{{ request()->routeIs('dashboard') ? 'text-amber-400 font-semibold ' : 'text-slate-500' }} text-base font-['Nunito']">
                            Dashboard
                        </span>
                        
                    </a>
                    <a href="{{ route('product') }}" class="flex items-center gap-3 group mt-2">
                        <div class="relative w-16 h-10 rounded-tr-[5px] rounded-br-[5px] flex items-center justify-center">
                            @if (request()->routeIs('product'))
                                <!-- Background layer with opacity (only if active) -->
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
                            @endif
                    
                            <!-- SVG icon -->
                            <svg 
                                class="relative z-10 w-6 h-6" 
                                viewBox="0 0 34 31" 
                                fill="none" 
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <g>
                                    <path d="M10.4579 2.9043H23.2669C27.9315 2.9043 30.5649 5.34117 30.5787 9.6376V21.4367C30.5787 25.7318 27.9315 28.17 23.2669 28.17H10.4579C5.7932 28.17 3.14746 25.7318 3.14746 21.4367V9.6376C3.14746 5.34117 5.7932 2.9043 10.4579 2.9043ZM16.9303 22.94C17.5214 22.94 18.0138 22.5357 18.0687 21.9925V9.11966C18.1235 8.72804 17.9192 8.33516 17.5488 8.12166C17.1634 7.9069 16.6971 7.9069 16.3281 8.12166C15.9565 8.33516 15.7521 8.72804 15.7919 9.11966V21.9925C15.8618 22.5357 16.3542 22.94 16.9303 22.94ZM23.2408 22.94C23.8169 22.94 24.3093 22.5357 24.3792 21.9925V17.849C24.419 17.4434 24.2146 17.0657 23.8429 16.851C23.474 16.6362 23.0076 16.6362 22.6236 16.851C22.2519 17.0657 22.0476 17.4434 22.1024 17.849V21.9925C22.1573 22.5357 22.6497 22.94 23.2408 22.94ZM11.6772 21.9925C11.6223 22.5357 11.1299 22.94 10.5388 22.94C9.94902 22.94 9.45526 22.5357 9.40177 21.9925V13.2632C9.36063 12.8703 9.56499 12.48 9.93668 12.2652C10.3056 12.0505 10.7733 12.0505 11.1437 12.2652C11.5126 12.48 11.7197 12.8703 11.6772 13.2632V21.9925Z"
                                    fill="{{ request()->routeIs('product') ? '#FBAE2C' : '#9CA3AF' }}" />
                                </g>
                            </svg>
                        </div>
                        <span class="{{ request()->routeIs('product') ? 'text-amber-400 font-semibold' : 'text-slate-500' }} text-base font-['Nunito']">
                            Product
                        </span>
                    </a>
                    
                    
                    <a href="{{ route('stock') }}" class="flex items-center gap-3 group mt-2">
                        <div class="relative w-16 h-10 rounded-tr-[5px] rounded-br-[5px] flex items-center justify-center">
                            @if (request()->routeIs('stock'))
                                <!-- Background layer if active -->
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
                            @endif
                    
                            <!-- SVG icon -->
                            <svg class="relative z-10 w-6 h-6" width="34" height="31" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M30.2863 13.908C30.1006 14.0742 29.8486 14.1691 29.5833 14.1691C28.6017 14.1691 27.8059 14.8813 27.8059 15.7477C27.8059 16.62 28.5925 17.3286 29.5647 17.3381C30.1126 17.3428 30.5782 17.6847 30.5782 18.1748V21.2192C30.5782 23.7817 28.2569 25.8599 25.3917 25.8599H21.0674C20.6204 25.8599 20.2583 25.5359 20.2583 25.1359V22.5722C20.2583 22.0737 19.8206 21.6821 19.2635 21.6821C18.7196 21.6821 18.2686 22.0737 18.2686 22.5722V25.1359C18.2686 25.5359 17.9065 25.8599 17.4608 25.8599H8.33343C5.48154 25.8599 3.14697 23.7829 3.14697 21.2192V18.1748C3.14697 17.6847 3.61256 17.3428 4.16039 17.3381C5.13401 17.3286 5.91927 16.62 5.91927 15.7477C5.91927 14.905 5.14993 14.2641 4.14182 14.2641C3.87653 14.2641 3.6245 14.1691 3.43879 14.003C3.25309 13.8368 3.14697 13.6113 3.14697 13.3739V10.2999C3.14697 7.74099 5.48685 5.64734 8.3467 5.64734H17.4608C17.9065 5.64734 18.2686 5.97136 18.2686 6.37134V9.40975C18.2686 9.89637 18.7196 10.2999 19.2635 10.2999C19.8206 10.2999 20.2583 9.89637 20.2583 9.40975V6.37134C20.2583 5.97136 20.6204 5.64734 21.0674 5.64734H25.3917C28.2569 5.64734 30.5782 7.72438 30.5782 10.288V13.279C30.5782 13.5163 30.472 13.7419 30.2863 13.908ZM19.2635 19.3795C19.8206 19.3795 20.2583 18.976 20.2583 18.4894V13.7419C20.2583 13.2552 19.8206 12.8517 19.2635 12.8517C18.7196 12.8517 18.2686 13.2552 18.2686 13.7419V18.4894C18.2686 18.976 18.7196 19.3795 19.2635 19.3795Z"
                                    fill="{{ request()->routeIs('stock') ? '#FBAE2C' : '#9CA3AF' }}" />
                            </svg>
                        </div>
                        <span class="{{ request()->routeIs('stock') ? 'text-amber-400 font-semibold' : 'text-slate-500' }} text-base font-['Nunito']">
                            Stock
                        </span>
                    </a>
                    
                    <a href="{{ route('repository') }}" class="flex items-center gap-3 group mt-2">
                        <div class="relative w-16 h-10 rounded-tr-[5px] rounded-br-[5px] flex items-center justify-center">
                            @if (request()->routeIs('repository'))
                                <!-- Active background highlight -->
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
                            @endif
                    
                            <!-- SVG icon -->
                            <svg class="relative z-10 w-6 h-6" width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M22.5084 3.49765L22.5098 4.44464C26.288 4.71738 28.7837 7.08864 28.7878 10.7251L28.8027 21.3692C28.8081 25.334 26.1038 27.7734 21.7691 27.7797L11.1807 27.7923C6.8731 27.7974 4.13495 25.2999 4.12953 21.3238L4.11463 10.8046C4.10922 7.14419 6.51695 4.77925 10.2951 4.4598L10.2938 3.51281C10.2924 2.95724 10.7393 2.5393 11.3351 2.5393C11.931 2.53804 12.3778 2.95471 12.3792 3.51028L12.3805 4.39414L20.4244 4.38404L20.423 3.50018C20.4217 2.94461 20.8685 2.52794 21.4644 2.52668C22.0467 2.52541 22.5071 2.94209 22.5084 3.49765ZM6.20143 11.1948L26.7037 11.1695V10.7276C26.6455 8.0129 25.1667 6.58863 22.5125 6.3765L22.5139 7.34874C22.5139 7.89168 22.0548 8.32225 21.4725 8.32225C20.8767 8.32351 20.4284 7.89421 20.4284 7.35127L20.4271 6.32852L12.3833 6.33862L12.3846 7.36011C12.3846 7.90431 11.9391 8.33361 11.3432 8.33361C10.7474 8.33488 10.2992 7.90684 10.2992 7.36263L10.2978 6.39039C7.65717 6.63408 6.19601 8.06341 6.20007 10.8021L6.20143 11.1948ZM20.9024 16.9335V16.9474C20.9159 17.5282 21.4305 17.9689 22.0548 17.9563C22.6642 17.9424 23.1503 17.4613 23.1368 16.8805C23.1084 16.3249 22.6195 15.8716 22.0115 15.8729C21.3885 15.8855 20.901 16.3527 20.9024 16.9335ZM22.0209 22.6028C21.398 22.5902 20.8956 22.1117 20.8943 21.5309C20.8807 20.95 21.3804 20.469 22.0033 20.4551H22.0169C22.6533 20.4551 23.1693 20.9336 23.1693 21.5271C23.1706 22.1205 22.6561 22.6016 22.0209 22.6028ZM15.3232 16.9537C15.3503 17.5346 15.8662 17.9879 16.4891 17.9626C17.0985 17.9361 17.5847 17.4563 17.5576 16.8755C17.5427 16.3073 17.0416 15.8653 16.4322 15.8666C15.8093 15.8918 15.3218 16.3729 15.3232 16.9537ZM16.4945 22.546C15.8716 22.5713 15.357 22.118 15.3286 21.5372C15.3286 20.9563 15.8147 20.4765 16.4377 20.45C17.047 20.4488 17.5494 20.8907 17.563 21.4576C17.5914 22.0397 17.1039 22.5195 16.4945 22.546ZM9.74396 16.9979C9.77104 17.5788 10.287 18.0333 10.9099 18.0068C11.5193 17.9815 12.0054 17.5005 11.977 16.9196C11.9635 16.3515 11.4624 15.9095 10.8517 15.9108C10.2288 15.936 9.7426 16.4171 9.74396 16.9979ZM10.9153 22.5523C10.2924 22.5789 9.77781 22.1243 9.74937 21.5435C9.74802 20.9627 10.2355 20.4816 10.8584 20.4563C11.4678 20.4551 11.9702 20.897 11.9838 21.4652C12.0122 22.046 11.5261 22.5271 10.9153 22.5523Z"
                                    fill="{{ request()->routeIs('repository') ? '#FBAE2C' : '#9CA3AF' }}" />
                            </svg>
                        </div>
                    
                        <span class="{{ request()->routeIs('repository') ? 'text-amber-400 font-semibold' : 'text-slate-500' }} text-base font-['Nunito']">
                            Repository
                        </span>
                    </a>
                    
                    <a href="{{ route('audit-log') }}" class="flex items-center gap-3 group mt-2">
                        <div class="relative w-16 h-10 rounded-tr-[5px] rounded-br-[5px] flex items-center justify-center">
                            @if (request()->routeIs('audit-log'))
                                <!-- Active background layer -->
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
                            @endif
                    
                            <!-- Icon -->
                            <svg class="relative z-10 w-6 h-6" width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.1899 4.99298C21.1351 5.30872 21.1079 5.6245 21.1079 5.94025C21.1079 8.7826 23.604 11.0808 26.6763 11.0809C27.019 11.0809 27.3482 11.0445 27.6909 10.994V21.1873C27.6908 25.4709 24.9479 28.0096 20.2847 28.0096H10.1509C5.48631 28.0096 2.7428 25.4709 2.74268 21.1873V11.8397C2.74281 7.54469 5.48632 4.99298 10.1509 4.99298H21.1899ZM21.4663 12.6736C21.0947 12.6358 20.7252 12.7874 20.5044 13.0652L17.187 17.0193L13.3862 14.2654C13.1531 14.1012 12.8783 14.0368 12.604 14.0633C12.3311 14.1012 12.0844 14.2391 11.9185 14.4412L7.85986 19.3065L7.77588 19.4197C7.54292 19.8226 7.65273 20.3408 8.06396 20.6199C8.25587 20.7336 8.46183 20.8093 8.69482 20.8094C9.0116 20.822 9.31237 20.6692 9.50439 20.4305L12.9468 16.3484L16.856 19.0535L16.979 19.1277C17.4179 19.3425 17.9673 19.2424 18.2827 18.8621L22.2466 14.1522L22.1909 14.1766C22.4103 13.8987 22.4521 13.5451 22.3013 13.2293C22.1518 12.9137 21.8213 12.6991 21.4663 12.6736ZM26.8687 2.74396C28.6928 2.74401 30.1743 4.10874 30.1743 5.78888C30.1741 7.46883 28.6926 8.83277 26.8687 8.83282C25.0446 8.83282 23.5632 7.46886 23.563 5.78888C23.563 4.10871 25.0445 2.74396 26.8687 2.74396Z"
                                    fill="{{ request()->routeIs('audit-log') ? '#FBAE2C' : '#9CA3AF' }}" />
                            </svg>
                        </div>
                    
                        <span class="{{ request()->routeIs('audit-log') ? 'text-amber-400 font-semibold' : 'text-slate-500' }} text-base font-['Nunito']">
                            Audit Log
                        </span>
                    </a>
                    
                    <a href="{{ route('settings') }}" class="flex items-center gap-3 group mt-2">
                        <div class="relative w-16 h-10 rounded-tr-[5px] rounded-br-[5px] flex items-center justify-center">
                            @if (request()->routeIs('settings'))
                                <!-- Active background -->
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
                            @endif
                    
                            <!-- Icon -->
                            <svg class="relative z-10 w-6 h-6" width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.4424 2.52667C18.4795 2.52672 19.4189 3.05701 19.9375 3.84015C20.1898 4.21913 20.3575 4.68731 20.3155 5.17999C20.2876 5.55879 20.4136 5.93777 20.6377 6.29132C21.3525 7.36497 22.9365 7.76943 24.17 7.16339C25.5576 6.43069 27.3104 6.8727 28.1094 8.12335L29.0479 9.61359C29.8609 10.8642 29.4124 12.4687 28.0108 13.1888C26.8194 13.8331 26.3995 15.2606 27.1143 16.347C27.3385 16.6879 27.5902 16.9787 27.9825 17.1556C28.473 17.3956 28.8519 17.7746 29.1182 18.1536C29.6368 18.9368 29.5945 19.8971 29.0899 20.7435L28.1094 22.2591C27.5908 23.0676 26.6231 23.5726 25.628 23.5726C25.1374 23.5726 24.5911 23.4463 24.1426 23.1937C23.7783 22.979 23.3576 22.9037 22.9092 22.9036C21.5216 22.9036 20.3576 23.9519 20.3155 25.2025C20.3155 26.6552 19.026 27.7923 17.4141 27.7923H15.5078C13.882 27.7922 12.5928 26.6552 12.5928 25.2025C12.5647 23.952 11.4012 22.9038 10.0137 22.9036C9.55134 22.9036 9.13063 22.9791 8.7803 23.1937C8.33177 23.4463 7.77054 23.5726 7.29397 23.5726C6.28483 23.5725 5.31745 23.0676 4.79886 22.2591L3.83206 20.7435C3.31348 19.9224 3.28525 18.9368 3.80374 18.1536C4.02794 17.7747 4.44843 17.3956 4.92483 17.1556C5.3173 16.9787 5.57034 16.6881 5.80862 16.347C6.50931 15.2606 6.08874 13.8331 4.89749 13.1888C3.50983 12.4687 3.06142 10.8642 3.86038 9.61359L4.79886 8.12335C5.61183 6.8727 7.35031 6.43069 8.75198 7.16339C9.9714 7.76958 11.5557 7.36504 12.2705 6.29132C12.4947 5.93778 12.6207 5.55877 12.5928 5.17999C12.5648 4.68731 12.7191 4.21913 12.9854 3.84015C13.504 3.05718 14.4428 2.55195 15.4658 2.52667H17.4424ZM16.4746 11.597C14.2742 11.5972 12.4942 13.189 12.4942 15.1722C12.4942 17.1554 14.2742 18.7345 16.4746 18.7347C18.6753 18.7347 20.4141 17.1555 20.4141 15.1722C20.4141 13.1888 18.6753 11.597 16.4746 11.597Z"
                                    fill="{{ request()->routeIs('settings') ? '#FBAE2C' : '#9CA3AF' }}" />
                            </svg>
                        </div>
                    
                        <span class="{{ request()->routeIs('settings') ? 'text-amber-400 font-semibold' : 'text-slate-500' }} text-base font-['Nunito']">
                            Settings
                        </span>
                    </a>
                    
                {{-- </flux:navlist.group> --}}
            </flux:navlist>
            
            <flux:spacer />

         
            <!-- Desktop User Menu -->
            {{-- <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown> --}}
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}
        @livewire('notifications')

        @filamentScripts

        @fluxScripts
    </body>
</html>
