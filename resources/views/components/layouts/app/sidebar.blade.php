<!-- Sidebar -->
<div 
    class="hidden h-screen lg:flex flex-col border-r border-gray-100 transition-all duration-300 z-50 w-60"
    :class="open ? '!w-60' : '!w-20'"
>
    <!-- Logo + Collapse Button -->
    <div @click="open = !open" class="flex items-center justify-between py-6 px-4 ml-4">
        <img   src="{{ asset('images/meemgoldlogo.png') }}" alt="MeemGold"  
        class="h-10"
        :class="open ? '!h-10' : '!h-4'">
        {{-- <button 
        x-show="!open" x-transition
        @click="open = !open" 
        class="p-2 rounded hover:bg-gray-100 transition"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 transition-transform duration-300"
             :class="open ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button> --}}

    </div>
    <!-- Navigation -->
    <nav class="flex-1  space-y-1 ml-2">
        
        <!-- Dashboard -->
        @php $isActive = request()->routeIs('dashboard'); @endphp
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 transition group relative">
            @if ($isActive)
                <div class="absolute left-0 inset-0 bg-gradient-to-r from-amber-200 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
            @endif
            <svg x-show="open" x-transitionwidth="25" height="25" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                fill="{{ request()->routeIs('dashboard') ? '#FBAE2C' : '#9CA3AF' }}"
                 d="M11.2669 17.1753C13.2005 17.1755 14.7502 18.617 14.7503 20.4106V24.7173C14.7503 26.4984 13.2006 27.9514 11.2669 27.9517H6.63019C4.71017 27.9515 3.14679 26.4984 3.14679 24.7173V20.4106C3.14688 18.617 4.71023 17.1755 6.63019 17.1753H11.2669ZM27.0941 17.1753C29.0142 17.1753 30.5783 18.6169 30.5784 20.4106V24.7173C30.5784 26.4985 29.0142 27.9517 27.0941 27.9517H22.4583C20.5245 27.9516 18.9749 26.4985 18.9749 24.7173V20.4106C18.975 18.6169 20.5246 17.1754 22.4583 17.1753H27.0941ZM11.2669 2.68604C13.2006 2.68628 14.7503 4.13904 14.7503 5.92139V10.228C14.7502 12.0217 13.2005 13.4612 11.2669 13.4614H6.63019C4.71024 13.4612 3.1469 12.0217 3.14679 10.228V5.92139C3.14679 4.139 4.71017 2.68622 6.63019 2.68604H11.2669ZM27.0941 2.68604C29.0142 2.68604 30.5784 4.13889 30.5784 5.92139V10.228C30.5783 12.0218 29.0142 13.4614 27.0941 13.4614H22.4583C20.5246 13.4613 18.975 12.0218 18.9749 10.228V5.92139C18.9749 4.13895 20.5245 2.68612 22.4583 2.68604H27.0941Z" fill="#FBAE2C"/>
                </svg>
                
            <span x-show="open" x-transition class="{{ $isActive ? 'text-amber-400 font-semibold' : 'text-slate-500' }} font-['Nunito'] ml-8">
                Dashboard
            </span>
        </a>

        {{-- <div x-show="open" x-transition 
        class="px-4 text-[12px] font-semibold text-gray-400  tracking-wider mt-5 mb-2">
       Main Menu
   </div> --}}
        <!-- Product -->
        @php $isActive = request()->routeIs('product'); @endphp
        <a href="{{ route('product') }}" class="flex items-center px-4 py-3 transition group relative">
            @if ($isActive)
                <div class="absolute left-0 inset-0 bg-gradient-to-r from-amber-200 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
            @endif
            <svg width="25" height="25" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
           
                
                <path 
                fill="{{ request()->routeIs('product') ? '#FBAE2C' : '#9CA3AF' }}"
                fill-rule="evenodd" clip-rule="evenodd" d="M10.4579 2.9043H23.2669C27.9316 2.9043 30.565 5.34117 30.5787 9.6376V21.4367C30.5787 25.7318 27.9316 28.17 23.2669 28.17H10.4579C5.79321 28.17 3.14748 25.7318 3.14748 21.4367V9.6376C3.14748 5.34117 5.79321 2.9043 10.4579 2.9043ZM16.9303 22.94C17.5214 22.94 18.0138 22.5357 18.0687 21.9925V9.11966C18.1235 8.72804 17.9192 8.33516 17.5489 8.12166C17.1634 7.9069 16.6971 7.9069 16.3282 8.12166C15.9565 8.33516 15.7521 8.72804 15.7919 9.11966V21.9925C15.8618 22.5357 16.3542 22.94 16.9303 22.94ZM23.2408 22.94C23.8169 22.94 24.3093 22.5357 24.3792 21.9925V17.849C24.419 17.4434 24.2146 17.0657 23.8429 16.851C23.474 16.6362 23.0077 16.6362 22.6236 16.851C22.2519 17.0657 22.0476 17.4434 22.1024 17.849V21.9925C22.1573 22.5357 22.6497 22.94 23.2408 22.94ZM11.6772 21.9925C11.6223 22.5357 11.13 22.94 10.5388 22.94C9.94904 22.94 9.45528 22.5357 9.40179 21.9925V13.2632C9.36064 12.8703 9.565 12.48 9.9367 12.2652C10.3056 12.0505 10.7733 12.0505 11.1437 12.2652C11.5126 12.48 11.7197 12.8703 11.6772 13.2632V21.9925Z" fill="#030229"/>
                
                
                </svg>
                
            <span x-show="open" x-transition class="{{ $isActive ? 'text-amber-400 font-semibold' : 'text-slate-500' }} font-['Nunito'] ml-8">
                Product
            </span>
        </a>

        <!-- Stock -->
        @php $isActive = request()->routeIs('stock'); @endphp
        <a href="{{ route('stock') }}" class="flex items-center px-4 py-3 transition group relative">
            @if ($isActive)
                <div class="absolute left-0 inset-0 bg-gradient-to-r from-amber-200 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
            @endif
            <svg width="25" height="25" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
           
                
                <path 
                fill="{{ request()->routeIs('stock') ? '#FBAE2C' : '#9CA3AF' }}"
                fill-rule="evenodd" clip-rule="evenodd" d="M30.2863 13.9081C30.1006 14.0743 29.8486 14.1693 29.5833 14.1693C28.6017 14.1693 27.8058 14.8814 27.8058 15.7478C27.8058 16.6202 28.5924 17.3287 29.5647 17.3382C30.1125 17.343 30.5781 17.6848 30.5781 18.175V21.2193C30.5781 23.7818 28.2568 25.86 25.3917 25.86H21.0674C20.6204 25.86 20.2583 25.536 20.2583 25.136V22.5724C20.2583 22.0739 19.8205 21.6822 19.2634 21.6822C18.7196 21.6822 18.2686 22.0739 18.2686 22.5724V25.136C18.2686 25.536 17.9064 25.86 17.4608 25.86H8.33339C5.4815 25.86 3.14693 23.783 3.14693 21.2193V18.175C3.14693 17.6848 3.61251 17.343 4.16034 17.3382C5.13396 17.3287 5.91923 16.6202 5.91923 15.7478C5.91923 14.9051 5.14988 14.2642 4.14177 14.2642C3.87648 14.2642 3.62445 14.1693 3.43875 14.0031C3.25304 13.8369 3.14693 13.6114 3.14693 13.374V10.3C3.14693 7.74112 5.4868 5.64746 8.34665 5.64746H17.4608C17.9064 5.64746 18.2686 5.97148 18.2686 6.37146V9.40987C18.2686 9.89649 18.7196 10.3 19.2634 10.3C19.8205 10.3 20.2583 9.89649 20.2583 9.40987V6.37146C20.2583 5.97148 20.6204 5.64746 21.0674 5.64746H25.3917C28.2568 5.64746 30.5781 7.7245 30.5781 10.2882V13.2791C30.5781 13.5165 30.472 13.742 30.2863 13.9081ZM19.2634 19.3797C19.8205 19.3797 20.2583 18.9761 20.2583 18.4895V13.742C20.2583 13.2554 19.8205 12.8518 19.2634 12.8518C18.7196 12.8518 18.2686 13.2554 18.2686 13.742V18.4895C18.2686 18.9761 18.7196 19.3797 19.2634 19.3797Z" fill="#030229"/>
                
                
                </svg>
                
            <span x-show="open" x-transition class="{{ $isActive ? 'text-amber-400 font-semibold' : 'text-slate-500' }} font-['Nunito'] ml-8">
                Stock
            </span>
        </a>

        <!-- Repository -->
        @php $isActive = request()->routeIs('repository'); @endphp
        <a href="{{ route('repository') }}" class="flex items-center px-4 py-3 transition group relative">
            @if ($isActive)
                <div class="absolute left-0 inset-0 bg-gradient-to-r from-amber-200 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
            @endif
            <svg width="25" height="25" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
           
                
                <path 
                fill="{{ request()->routeIs('repository') ? '#FBAE2C' : '#9CA3AF' }}"
                fill-rule="evenodd" clip-rule="evenodd" d="M22.5085 3.49759L22.5099 4.44458C26.288 4.71732 28.7838 7.08858 28.7878 10.725L28.8027 21.3692C28.8081 25.3339 26.1039 27.7733 21.7691 27.7797L11.1808 27.7923C6.87316 27.7973 4.13501 25.2998 4.12959 21.3237L4.11469 10.8046C4.10928 7.14413 6.51701 4.77919 10.2952 4.45973L10.2938 3.51275C10.2925 2.95718 10.7393 2.53924 11.3352 2.53924C11.931 2.53798 12.3779 2.95465 12.3792 3.51022L12.3806 4.39408L20.4244 4.38398L20.4231 3.50012C20.4217 2.94455 20.8686 2.52788 21.4644 2.52661C22.0467 2.52535 22.5072 2.94203 22.5085 3.49759ZM6.20149 11.1947L26.7038 11.1695V10.7275C26.6455 8.01284 25.1668 6.58857 22.5126 6.37644L22.5139 7.34868C22.5139 7.89162 22.0549 8.32219 21.4726 8.32219C20.8767 8.32345 20.4285 7.89415 20.4285 7.35121L20.4271 6.32846L12.3833 6.33856L12.3847 7.36005C12.3847 7.90425 11.9391 8.33355 11.3433 8.33355C10.7475 8.33481 10.2992 7.90677 10.2992 7.36257L10.2979 6.39033C7.65723 6.63402 6.19607 8.06334 6.20013 10.802L6.20149 11.1947ZM20.9025 16.9335V16.9474C20.916 17.5282 21.4306 17.9689 22.0549 17.9562C22.6642 17.9423 23.1504 17.4613 23.1369 16.8804C23.1084 16.3249 22.6196 15.8716 22.0115 15.8728C21.3886 15.8855 20.9011 16.3527 20.9025 16.9335ZM22.021 22.6028C21.3981 22.5902 20.8957 22.1116 20.8943 21.5308C20.8808 20.95 21.3805 20.4689 22.0034 20.455H22.0169C22.6534 20.455 23.1693 20.9336 23.1693 21.527C23.1707 22.1204 22.6561 22.6015 22.021 22.6028ZM15.3232 16.9537C15.3503 17.5345 15.8663 17.9878 16.4892 17.9625C17.0986 17.936 17.5847 17.4562 17.5576 16.8754C17.5427 16.3072 17.0417 15.8653 16.4323 15.8665C15.8094 15.8918 15.3219 16.3729 15.3232 16.9537ZM16.4946 22.546C15.8717 22.5712 15.3571 22.1179 15.3287 21.5371C15.3287 20.9563 15.8148 20.4765 16.4377 20.45C17.0471 20.4487 17.5495 20.8906 17.5631 21.4576C17.5915 22.0396 17.104 22.5194 16.4946 22.546ZM9.74402 16.9979C9.7711 17.5787 10.287 18.0332 10.91 18.0067C11.5193 17.9815 12.0055 17.5004 11.9771 16.9196C11.9635 16.3514 11.4625 15.9095 10.8517 15.9107C10.2288 15.936 9.74266 16.4171 9.74402 16.9979ZM10.9154 22.5523C10.2925 22.5788 9.77787 22.1242 9.74944 21.5434C9.74808 20.9626 10.2356 20.4815 10.8585 20.4563C11.4679 20.455 11.9703 20.8969 11.9838 21.4651C12.0123 22.046 11.5261 22.527 10.9154 22.5523Z" fill="#030229"/>
                
                
                </svg>
                
            <span x-show="open" x-transition class="{{ $isActive ? 'text-amber-400 font-semibold' : 'text-slate-500' }} font-['Nunito'] ml-8">
                Repository
            </span>
        </a>

        <!-- Audit Log -->
        @php $isActive = request()->routeIs('audit-log'); @endphp
        <a href="{{ route('audit-log') }}" class="flex items-center px-4 py-3 transition group relative">
            @if ($isActive)
                <div class="absolute left-0 inset-0 bg-gradient-to-r from-amber-200 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
            @endif
            <svg width="25" height="25" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
           
                
                <path
                fill="{{ request()->routeIs('audit-log') ? '#FBAE2C' : '#9CA3AF' }}"
                 d="M21.19 4.99292C21.1351 5.30866 21.108 5.62444 21.1079 5.94019C21.1079 8.78254 23.6041 11.0807 26.6763 11.0808C27.019 11.0808 27.3482 11.0444 27.6909 10.9939V21.1873C27.6908 25.4709 24.9479 28.0095 20.2847 28.0095H10.1509C5.48634 28.0095 2.74283 25.4709 2.74271 21.1873V11.8396C2.74284 7.54463 5.48635 4.99292 10.1509 4.99292H21.19ZM21.4663 12.6736C21.0947 12.6357 20.7253 12.7873 20.5044 13.0652L17.187 17.0193L13.3863 14.2654C13.1531 14.1012 12.8783 14.0367 12.604 14.0632C12.3312 14.1012 12.0844 14.2391 11.9185 14.4412L7.85989 19.3064L7.77591 19.4197C7.54295 19.8226 7.65276 20.3407 8.064 20.6199C8.2559 20.7335 8.46186 20.8092 8.69485 20.8093C9.01163 20.822 9.3124 20.6691 9.50443 20.4304L12.9468 16.3484L16.856 19.0535L16.979 19.1277C17.4179 19.3424 17.9673 19.2423 18.2827 18.8621L22.2466 14.1521L22.1909 14.1765C22.4104 13.8986 22.4522 13.545 22.3013 13.2292C22.1518 12.9137 21.8213 12.699 21.4663 12.6736ZM26.8687 2.7439C28.6928 2.74395 30.1743 4.10868 30.1743 5.78882C30.1741 7.46877 28.6927 8.83271 26.8687 8.83276C25.0447 8.83276 23.5633 7.4688 23.563 5.78882C23.563 4.10865 25.0445 2.7439 26.8687 2.7439Z" fill="#030229"/>
                
                 
                </svg>
                
            <span x-show="open"  x-transition class="{{ $isActive ? 'text-amber-400 font-semibold' : 'text-slate-500' }} font-['Nunito'] ml-8">
                Audit Log
            </span>
        </a>

        <!-- Settings -->
        @php $isActive = request()->routeIs('settings'); @endphp
        <a href="{{ route('settings') }}" class="flex items-center px-4 py-3 transition group relative">
            @if ($isActive)
                <div class="absolute left-0 inset-0 bg-gradient-to-r from-amber-200 to-indigo-300/0 opacity-20 rounded-tr-[5px] rounded-br-[5px]"></div>
            @endif
            <svg width="25" height="25" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
           
                
                <path 
                fill="{{ request()->routeIs('settings') ? '#FBAE2C' : '#9CA3AF' }}"
                d="M17.4425 2.52661C18.4796 2.52666 19.419 3.05695 19.9376 3.84009C20.1899 4.21907 20.3576 4.68725 20.3155 5.17993C20.2876 5.55873 20.4136 5.93771 20.6378 6.29126C21.3525 7.36491 22.9366 7.76937 24.17 7.16333C25.5577 6.43063 27.3105 6.87264 28.1094 8.12329L29.0479 9.61353C29.8609 10.8642 29.4125 12.4686 28.0108 13.1887C26.8195 13.833 26.3995 15.2605 27.1143 16.3469C27.3385 16.6878 27.5903 16.9787 27.9825 17.1555C28.4731 17.3955 28.8519 17.7746 29.1182 18.1536C29.6368 18.9368 29.5945 19.897 29.0899 20.7434L28.1094 22.259C27.5908 23.0675 26.6232 23.5725 25.628 23.5725C25.1375 23.5725 24.5911 23.4462 24.1427 23.1936C23.7783 22.9789 23.3576 22.9036 22.9093 22.9036C21.5217 22.9036 20.3577 23.9518 20.3155 25.2024C20.3155 26.6552 19.0261 27.7922 17.4141 27.7922H15.5079C13.882 27.7922 12.5928 26.6551 12.5928 25.2024C12.5647 23.9519 11.4012 22.9037 10.0137 22.9036C9.55138 22.9036 9.13068 22.979 8.78035 23.1936C8.33181 23.4463 7.77059 23.5725 7.29402 23.5725C6.28487 23.5725 5.31749 23.0675 4.7989 22.259L3.8321 20.7434C3.31353 19.9223 3.2853 18.9368 3.80378 18.1536C4.02799 17.7747 4.44848 17.3956 4.92488 17.1555C5.31735 16.9787 5.57038 16.688 5.80867 16.3469C6.50936 15.2606 6.08879 13.833 4.89753 13.1887C3.50988 12.4686 3.06147 10.8642 3.86043 9.61353L4.7989 8.12329C5.61187 6.87264 7.35035 6.43063 8.75203 7.16333C9.97145 7.76952 11.5558 7.36497 12.2706 6.29126C12.4947 5.93772 12.6207 5.55871 12.5928 5.17993C12.5648 4.68725 12.7191 4.21907 12.9854 3.84009C13.5041 3.05712 14.4429 2.55189 15.4659 2.52661H17.4425ZM16.4747 11.5969C14.2743 11.5972 12.4942 13.1889 12.4942 15.1721C12.4942 17.1553 14.2743 18.7344 16.4747 18.7346C18.6753 18.7346 20.4141 17.1555 20.4141 15.1721C20.4141 13.1888 18.6753 11.5969 16.4747 11.5969Z" fill="#030229"/>
                
                
                </svg>
                
            <span x-show="open" x-transition class="{{ $isActive ? 'text-amber-400 font-semibold' : 'text-slate-500' }} font-['Nunito'] ml-8">
                Settings
            </span>
        </a>
    </nav>
</div>

<div x-data="{ open: true, mobileOpen: false }"  class="lg:hidden">
<!-- Mobile overlay toggle button -->
<div class="lg:hidden p-4">
    <button @click="mobileOpen = true" class="text-gray-700">
        <!-- Hamburger icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</div>


  <!-- Mobile Sidebar Overlay -->
  <div 
  class="fixed inset-0 z-50 lg:hidden"
  x-show="mobileOpen"
  x-transition.opacity
  style="display: none;"
>
  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/50" @click="mobileOpen = false"></div>

  <!-- Sidebar panel -->
  <div class="absolute left-0 top-0 h-full w-64 bg-white shadow-lg p-4 overflow-y-auto"
       x-show="mobileOpen"
       x-transition:enter="transition transform duration-300"
       x-transition:enter-start="-translate-x-full"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transition transform duration-300"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="-translate-x-full"
  >
      <div class="flex items-center justify-between mb-6">
          <img src="{{ asset('images/meemgoldlogo.png') }}" alt="MeemGold" class="h-10">
          <button @click="mobileOpen = false">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
          </button>
      </div>
      
      <!-- Navigation -->
      <nav class="space-y-1">
          <!-- Repeat your sidebar links -->
          <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded">
              Dashboard
          </a>
          <a href="{{ route('product') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded">
              Product
          </a>
          <!-- ...rest of links -->
      </nav>
  </div>
</div>
</div>