<div class="p-6 pt-0 bg-gray-50 min-h-screen font-sans" x-cloak x-data="{ showModalQuantity: false, errors: {}, }" >

 

  <!-- Header -->
 
      <div class="text-xl font-bold text-gray-800 mb-4">Stocks</div>
  
     

  <!-- Table card -->
  <div class="bg-white rounded-lg  border border-gray-200 px-4 w-full max-w-screen-xl mx-auto">

   {{-- table action --}}
   <div class="flex flex-wrap items-center gap-3 pt-4 mb-6">
       
       {{-- right side --}}
       <div class="relative w-72">
           <input type="text" placeholder="Search" wire:model.live="search" class="w-full h-10 pl-10 pr-4 text-sm text-gray-600 border border-gray-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400"/>
       </div>
   
       {{-- left side --}}
       <div class="flex items-center gap-2 ml-auto">
           <x-select-searchable-qisti :options="$CategoryList" placeholder="All Category" value="{{$selectedCategory}}" name="category" model="selectedCategory" width="w-[180px]"/>
   
           <x-select-searchable-qisti :options="$MetalList" value="{{$selectedMetal}}" placeholder="All Metal" name="metal" model="selectedMetal" width="w-[120px]" />
   
           <!-- Buttons -->
           <a href="{{ route('product-stock.export.pdf') }}" target="blank" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/pdf.svg') }}" />
           </a>
           <a href="{{ route('product-stock.export') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/excel-export.svg') }}" alt="Excel"/>
           </a>
         
       </div>
   </div>
   {{-- end of table action --}}
 
   <!-- Table -->
      <div x-data="selectAll()" x-on:bulk-deleted.window="resetSelection()"  class="min-h-[600px]">
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
             <tbody class="divide-y divide-gray-200 text-sm text-gray-600"> 
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
                           @click="$dispatch('open-update-min-qty', { productId: {{ $product->productStock?->id }}, currentMinQty: {{ $product->productStock?->min_quantity ?? 0 }} })"  
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
                  @click="$dispatch('open-stock-log', { productId: {{ $product->id }} })"
                  class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-100"
                  title="View Stock Log"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z" />
                  </svg>
                  </button>

                  <!-- Stock In button -->
                  <button 
                      @click="$dispatch('open-stock-in', { productId: {{ $product->id }} })"
                      class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-100" 
                      title="Stock In"
                  >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9 9 9-9M12 3v18" />
                      </svg>
                  </button>

                  <!-- Stock Out button -->
                  <button 
                      @click="$dispatch('open-stock-out', { productId: {{ $product->id }} })"
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

 <x-modal.quantity-modal  
 :show="'showModalQuantity'"  
 title="Minimum Quantity" 
 buttonText="Save"
>

     

</x-modal.quantity-modal>


</div>


</div>