<div class="p-6 pt-0 bg-gray-50 min-h-screen font-sans" >

 

  <!-- Header -->
  <div class="flex items-center justify-between mb-4">
      <div class="text-xl font-bold text-gray-800">Product</div>
     <x-add-button href="{{ route('create.product') }}" text="Add Product" />
  </div>

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
           <a href="{{ route('product.export.pdf') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/pdf.svg') }}" />
           </a>
           <a href="{{ route('product.export') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/excel-export.svg') }}" alt="Excel"/>
           </a>
           <button  @click="$dispatch('open-upload')"  class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
               <img src="{{ asset('images/import-data.svg') }}" alt="Import"/>
           </button>
       </div>
   </div>
   {{-- end of table action --}}
 
   <!-- Table -->
      <div x-data="selectAll()" x-on:bulk-deleted.window="resetSelection()"  class="min-h-[600px]">
          <div class="overflow-x-auto w-full">
           <div class="mb-4" x-show="selected.length > 0" x-transition>
             <button x-cloak
                 @click="$dispatch('open-delete-bulk', { ids: selected, functionName: 'bulkDelete', title: 'Padam Produk', message: 'Adakah anda pasti mahu padam produk yang dipilih?' });"
                 class="px-4 py-2 rounded-md bg-red-500 hover:bg-red-600 text-white text-sm font-medium shadow-sm"
             >
                 Delete Selected
             </button>
         </div>
           <table class="w-full border border-gray-200 rounded-lg ">
             <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase">
               <tr>
                 <th class="px-4 py-4 text-left">
                   <input type="checkbox" @click="toggleAll($event)" class="w-4 h-4 border-gray-600 rounded-sm">
               </th>
                 <th class="px-4 py-4 text-left">Reference</th>
                 <th class="px-4 py-4 text-left">Product Name</th>
                 <th class="px-4 py-4 text-left">Category</th>
                 <th class="px-4 py-4 text-left">Metal</th>
                 <th class="px-4 py-4 text-left">Weight (g)</th>
                 <th class="px-4 py-4 text-left">Status</th>
                 <th class="px-4 py-4 text-left">Actions</th>
               </tr>
             </thead>
             <tbody class="divide-y divide-gray-200 text-sm text-gray-600"> 
               @foreach($products as $product)
               <tr class="hover:bg-gray-50">
                 <td class="px-4 py-4"><input type="checkbox"  value="{{ $product->id }}" @click="updateSelected($event)" class="row-checkbox w-4 h-4 border-gray-600 rounded-sm"></td>
                 <td class="px-4 py-4">{{$product->sku}}</td>
                 <td class="px-4 py-4 flex items-center gap-2"> {!! $product->thumbnail_html !!}</td>
                 <td class="px-4 py-4">{{$product->category->name}}</td>
                 <td class="px-4 py-4">{{$product->metal->name}}</td>
                 <td class="px-4 py-4">{{ $product->weight}}</td>
                 <td class="px-4 py-4">{!! $product->status_badge !!}</td>
                 <td class="px-4 py-4 flex gap-2">
                   <a href="{{ route('view.product', $product->id) }}" class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white">
                       <x-icons.view-icon />
                   </a>
                   <a href="{{ route('edit.product', $product->id) }}" class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white" >
                      <x-icons.edit-icon />
                   </a>
                   <a @click="$dispatch('open-delete', { id: {{ $product->id }}, functionName: 'delete',  title: 'Padam Produk', message: 'Adakah anda pasti mahu padam produk ini?' })"class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white" >
                     <x-icons.delete-icon />
                   </a>
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
 <x-confirm-delete />
 <x-confirm-delete-bulk />
</div>

<script>
 function selectAll() {
     return {
         selected: [],
 
         toggleAll(event) {
             const checked = event.target.checked;
             this.selected = []; // clear first
 
             document.querySelectorAll('.row-checkbox').forEach(cb => {
                 cb.checked = checked;
                 if (checked) this.selected.push(cb.value); 
             });
         },
 
         updateSelected(event) {
             const value = event.target.value;
             if (event.target.checked) {
                 if (!this.selected.includes(value)) this.selected.push(value);
             } else {
                 this.selected = this.selected.filter(id => id !== value);
                 // uncheck "select all" if any row unchecked
                 document.querySelector('thead input[type="checkbox"]').checked = false;
             }
         },
         resetSelection() {
            this.selected = [];
            document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = false);
            const selectAllCheckbox = document.querySelector('thead input[type="checkbox"]');
            if (selectAllCheckbox) selectAllCheckbox.checked = false;
        }
     }
 }
 </script>
 
</div>