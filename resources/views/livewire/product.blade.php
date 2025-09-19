<div class="p-6 bg-gray-50 min-h-screen font-sans">
   <!-- Header -->
   <div class="flex items-center justify-between mb-4">
       <div class="text-xl font-bold text-gray-800"></div>
       <a href="{{ route('create.product') }}" 
       class="h-10 px-5 bg-amber-400 rounded-[10px] inline-flex justify-center items-center gap-2.5 hover:bg-amber-500 transition-colors">
        
        <!-- Icon container -->
        <div class="w-6 h-6 relative overflow-hidden">
        
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 7V15M15 11H7M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
        </div>
    
        <!-- Text -->
        <div class="text-white text-base font-light font-['Lexend'] leading-normal">
            Add Item
        </div>
    </a>
    
       
   </div>

   <!-- Main Card -->
   <div class="bg-white rounded-lg shadow-md border border-gray-200 px-4 w-full max-w-screen-xl mx-auto">
       <!-- Top Controls -->
       <div class="flex flex-wrap justify-between items-center gap-4 pt-4 mb-6">
           <!-- Search Input -->
      
          
          
           <div class="relative w-72">
               <input
                   type="text"
                   placeholder="Search"
                   class="w-full h-10 pl-10 pr-4 text-sm text-gray-600 border border-gray-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400"
               />
               <div class="absolute left-3 top-2.5 text-gray-400">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                   </svg>
               </div>
           </div>

           <!-- Right-side Buttons & Dropdown -->
           <div class="flex items-center gap-2">
          
               <!-- Buttons -->
               <a href="{{ route('product.export.pdf') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                <image src="{{ asset("images/pdf.svg") }}"/>
               </a>
               <a href="{{ route('product.export') }}"
               class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                <img src="{{ asset('images/excel-export.svg') }}" alt="Excel"/>
            </a>
            <button
                class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                <img src="{{ asset('images/import-data.svg') }}" alt="Import"/>
            </button>
           </div>

  
       </div>
         
       <!-- Content Area -->
       <div class="min-h-[600px]">
           {{-- <p class="text-gray-500 text-center py-10">Product list goes here...</p> --}}
       </div>
   </div>
</div>


