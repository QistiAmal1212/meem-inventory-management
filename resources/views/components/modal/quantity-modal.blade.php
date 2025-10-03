@props([
    'show',        // Alpine boolean for modal visibility
    'title' => '', // Modal title
    'buttonText' => 'OK' // Footer button text
])

<div x-show="{{ $show }}" x-transition.opacity
     class="fixed inset-0 bg-black/30 flex items-center justify-center z-50"
     style="display: none;"
     x-data="{ productId: null, minQty: null }"
     x-on:open-update-min-qty.window="productId = $event.detail.productId; minQty = $event.detail.currentMinQty; showModalQuantity = true;">
     >

    <div @click.away="{{ $show }} = false"
         class="bg-white rounded-2xl shadow-2xl w-2/3 max-w-xl p-8 transform transition-all duration-300 scale-95"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">

   <!-- Header -->
         <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18M3 7l3-3h12l3 3M3 12l3-3h12l3 3M3 17l3-3h12l3 3"/>
            </svg>
              <h3 class="text-xl font-semibold">Minimum Quantity <span x-text="modalType"></span></h3>
          </div>
  
          <p class="text-sm text-gray-600 mb-4">
              Please enter the new min quantity value below.
          </p>
     

        <!-- Body -->
        <div class="text-lg">
            <x-forms.input-number label="Minimum Quantity" name="minQty" placeholder="Enter minimum quantity"  />

            <!-- Optional: validation message -->
            <p x-text="minQty < 0 ? 'Minimum quantity cannot be negative' : ''" class="text-red-500 text-sm"></p>

            <!-- Modal footer button overrides the default button text -->
            <div class="flex justify-end mt-2">
                <button type="button"  @click="
                $wire.setMinimumQuantity(productId, minQty).then(() => { {{ $show }} = false; })
            " 
                :disabled="minQty === null || minQty === '' || minQty < 0" class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-md font-medium transition disabled:bg-gray-100 disabled:text-gray-500 disabled:cursor-not-allowed">
                    Save
                </button>
            </div>
        </div>

    </div>
</div>
