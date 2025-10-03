<div class="p-6 pt-0 bg-gray-50 min-h-screen font-sans" x-cloak x-data="{ showModalQuantity: false, errors: {}, }" >

 

  <!-- Header -->
 
      <div class="text-xl font-bold text-gray-800 mb-4">Stocks</div>
  
     

  <!-- Table card -->
  <div class="bg-white rounded-lg  border border-gray-200 px-4 w-full  mx-auto">

   {{-- table action --}}
   <div class="flex flex-wrap items-center gap-3 pt-4 mb-6">
       
       {{-- right side --}}
       <div class="relative w-72">
           <input type="text" placeholder="Search" wire:model.live="search" class="w-full h-10 pl-10 pr-4 text-sm text-gray-600 border border-gray-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400"/>
       </div>
   
       {{-- left side --}}
       <div class="flex items-center gap-2 ml-auto">
        <div x-data="{ loading: false, suggestion: '', showPopup: false }" class="">
            <!-- Button -->
            <button 
                @click="loading = true; 
                        $wire.call('getAiSuggestion').then(result => { 
                            suggestion = result; 
                            loading = false; 
                            showPopup = true;
                        })"
                class="px-3 py-2 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 
                       text-white text-sm font-medium rounded-lg shadow-md flex items-center justify-center gap-1.5 
                       transition disabled:opacity-70 disabled:cursor-not-allowed"
                :disabled="loading"
            >
                <template x-if="!loading">
                    <span class="flex items-center gap-1.5 group">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-4 h-4 transition-transform duration-500 group-hover:rotate-180" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 3v2m6.364 1.636l-1.414 1.414M21 12h-2M4.636 4.636l1.414 1.414M3 12h2m1.636 6.364l1.414-1.414M12 21v-2m6.364-1.636l-1.414-1.414"/>
                        </svg>
                        AI Suggestion
                    </span>
                </template>
                <template x-if="loading">
                    <span class="flex items-center gap-1.5 animate-pulse">
                        <svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        Generating...
                    </span>
                </template>
            </button>
            <!-- Popup Modal -->
            <div x-show="showPopup" x-transition class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 p-4">
                <div class="bg-white rounded-xl shadow-lg max-w-lg w-full max-h-[80vh] overflow-hidden flex flex-col">
                    <!-- Header -->
                    <div class="flex justify-between items-center p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">AI Suggestion</h3>
                        <button @click="showPopup = false" class="text-gray-500 hover:text-gray-700 text-xl font-bold">
                            ✕
                        </button>
                    </div>

                    <!-- Scrollable Content -->
                    <div class="p-4 overflow-y-auto flex-1">
                        <p class="text-gray-600 whitespace-pre-line" x-text="suggestion"></p>
                    </div>

                    <!-- Footer (optional) -->
                    <div class="p-4 border-t border-gray-200 flex justify-end">
                        <button @click="showPopup = false" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                            Close
                        </button>
                    </div>
                </div>
</div>

        </div>
        
           {{-- <x-select-searchable-qisti :options="$CategoryList" placeholder="All Category" value="{{$selectedCategory}}" name="category" model="selectedCategory" width="w-[180px]"/>
   
           <x-select-searchable-qisti :options="$MetalList" value="{{$selectedMetal}}" placeholder="All Metal" name="metal" model="selectedMetal" width="w-[120px]" /> --}}
              <button @click="$dispatch('stock-log-all')" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
           <x-icon.log />
              </button>
           <!-- Buttons -->
           <a href="{{ route('product-stock.export.pdf') }}" target="blank" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/pdf.svg') }}" />
           </a>
           <a href="{{ route('product-stock.export') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/excel-export.svg') }}" alt="Excel"/>
           </a>
           <a href="{{ route('product-stock.export') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
            <img src="{{ asset('images/stock.svg') }}" alt="Excel"  class="w-6 h-6"/>
        </a>
        <a href="{{ route('product-stock.export') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9 9 9-9M12 3v18" />
            </svg>
        </a>

        <a href="{{ route('product-stock.export') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12l-9-9-9 9m9 9V3" />
        </svg>
    </a>

         
       </div>
   </div>
   {{-- end of table action --}}
 
   <!-- Table -->
      <div x-data="" x-on:bulk-deleted.window="resetSelection()"  class="min-h-[600px]">
          <div class="overflow-x-auto w-full">
           
           <table class="w-full border border-gray-200 rounded-lg ">
             <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase">
               <tr>
                 <th class="px-4 py-4 text-left">Product Name</th>
                 <th class="px-4 py-4 text-left">Reference</th>
                 {{-- <th class="px-4 py-4 text-left">Category</th>
                 <th class="px-4 py-4 text-left">Metal</th> --}}
                 {{-- <th class="px-4 py-4 text-left">Weight (g)</th> --}}
                 {{-- <th class="px-4 py-4 text-left">Status</th> --}}
                 <th class="px-4 py-4 text-center">Quantity</th>
                 <th class="px-4 py-4 text-center">Min Quantity</th>
              
                 <th class="px-4 py-4 text-center">Actions</th>
               </tr>
             </thead>
             <tbody class="divide-y divide-gray-200 text-sm text-gray-600" wire:poll.visible> 
               @foreach($products as $product)
               <tr class="hover:bg-gray-50  {{ $product->productStock?->quantity === 0 ? 'bg-[#FEF2F2] hover:!bg-blue-50' : ($product->productStock?->quantity < $product->productStock?->min_quantity ? 'bg-[#FFF7ED] hover:!bg-blue-50' : '') }}"
               >
                 <td class="px-4 py-4 flex items-center gap-2"> {!! $product->thumbnail_html !!}</td>
                 <td class="px-4 py-4">{{$product->sku}}</td>
                 {{-- <td class="px-4 py-4">{{$product->category->name}}</td>
                 <td class="px-4 py-4">{{$product->metal->name}}</td> --}}
                 {{-- <td class="px-4 py-4">{{ $product->weight}}</td>
                 <td class="px-4 py-4">{!! $product->status_badge !!}</td> --}}
                  <td class="px-4 py-4 text-center">{{ $product->productStock?->quantity ?? 0}}</td>
                  <td class="px-4 py-4 text-center">
                    <div class="flex items-center justify-center gap-2">
                        <span>{{ $product->productStock?->min_quantity ?? 0 }}</span>
                        <button 
                        @click="$dispatch('open-update-min-qty', { 
                            productId: {{ $product->productStock?->id ?? 'null' }}, 
                            currentMinQty: {{ $product->productStock?->min_quantity ?? 0 }} 
                        })"
                        
                            class="w-6 h-6 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-100"
                            title="Update Min Quantity"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 3.5l4 4L7 21H3v-4L16.5 3.5z" />
                            </svg>
                        </button>
                    </div>
                </td>
                
                 <td class="px-4 py-4 flex gap-2 justify-center">
                   <a href="{{ route('view.product', $product->id) }}" class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white">
                       <x-icons.view-icon />
                   </a>
                  
                   
                  <button 
                  @click="$dispatch('stock-log', { productId: {{ $product->id }} })"
                  {{-- @click="$dispatch('open-stock-log', { productId: {{ $product->id }} })" --}}
                  class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-100"
                  title="View Stock Log"
                  >
                 <x-icon.log />
                  </button>

                  <!-- Stock In button -->
                  <button 
                  @click="$dispatch('stock-in-form', { productId: {{ $product->id }}, category: 1 })"
                      class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-100" 
                      title="Stock In"
                  >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9 9 9-9M12 3v18" />
                      </svg>
                  </button>

                  <!-- Stock Out button -->
                  <button 
                      @click="$dispatch('stock-in-form', { productId: {{ $product->id }}, category: 2 })"
                      class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-100" 
                      title="Stock Out"
                  >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12l-9-9-9 9m9 9V3" />
                      </svg>
                  </button>
                  <!-- View Stock Log button -->
          
                <!-- Update Min Quantity button -->
                </td>

               </tr>
              @endforeach
             </tbody>
           </table>

           {{-- pagination --}}
           <div class="mt-4 mb-4" >
               {{ $products->links() }}
           </div>

         </div>
       </div>


  </div>
  {{-- end of table card --}}
 <x-product.upload-modal />
 <x-modal.quantity-modal :show="'showModalQuantity'" title="Minimum Quantity" buttonText="Save" />
<livewire:product-stock.stock-log />
<livewire:product-stock.stock-log-all />
<livewire:product-stock.stock-in />
<livewire:product-stock.stock-out />
</div>


</div>