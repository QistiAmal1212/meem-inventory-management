<div class="p-6 bg-gray-50 min-h-screen font-sans">
   <!-- Header -->
   <div class="flex items-center justify-between mb-4">
       <h1 class="text-xl font-bold text-gray-800">Product</h1>
       <button class="flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-4 py-2 rounded-md">
           <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
           </svg>
           Add Item
       </button>
   </div>

   <!-- Main Card -->
   <div class="bg-white rounded-lg shadow-md border border-gray-200 p-4 w-full max-w-screen-xl mx-auto">
       <!-- Top Controls -->
       <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
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
               <!-- Dropdown Next to SVGs -->
               <div class="relative w-32">
                   <select class="w-full h-10 px-3 text-sm text-gray-600 border border-gray-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400">
                       <option value="">Category</option>
                       <!-- Add categories dynamically -->
                   </select>
               </div>

               <!-- Buttons -->
               <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                   </svg>
               </button>
               <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                   </svg>
               </button>
               <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                   </svg>
               </button>
           </div>
       </div>

       <!-- Content Area -->
       <div class="min-h-[600px]">
           <p class="text-gray-500 text-center py-10">Product list goes here...</p>
       </div>
   </div>
</div>
