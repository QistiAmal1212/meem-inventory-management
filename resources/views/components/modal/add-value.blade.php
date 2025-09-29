<!-- Add New Modal -->
<div x-show="modalOpen" x-transition.opacity class="fixed inset-0 bg-black/30 flex items-center justify-center z-51" style="display: none;">
    <div @click.away="closeModal()" class="bg-white rounded-lg p-6 w-96 border shadow-lg">

        <!-- Header  -->
        <div class="flex items-center gap-3 mb-4">
          <x-icons.yellow-info-icon />
            <h3 class="text-xl font-semibold">Add New <span x-text="modalType"></span></h3>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            Please enter the new <span x-text="modalType"></span> value below. Make sure it is unique and relevant.
        </p>

        <div x-data="{ focused: false, required: false}" class="mb-4">
            <input type="text" x-model="newValue" x-ref="newValueInput"
                   @focus="focused = true;"
                   @blur="focused = false;"
                   @input="required = newValue.trim() === ''"
                   class="w-full border rounded-md px-3 py-3 outline outline-1 outline-gray-200 focus:ring-1 focus:ring-yellow-400 text-sm"
                   placeholder="Enter new value">  
                    <!-- Required message -->
           <p x-show="required" class="text-xs text-red-500 mt-1" >
                This field is required.
            </p>
            <!-- Word counter (optional) -->
            <p x-show="focused" class="text-xs text-gray-500 mt-1">
                Characters: <span x-text="newValue.length"></span>/50
            </p>
        
         
         
        </div>
        
        <!-- Buttons -->
        <div class="mt-5 flex justify-end gap-3">
            <button type="button" @click="closeModal()" class="bg-gray-100 hover:bg-gray-400 px-5 py-2 rounded-md text-sm font-medium">Cancel</button>
            <button type="button" @click="saveOption()" 
             wire:loading.attr="disabled"
             wire:loading.class="bg-amber-100 cursor-not-allowed"
            :class="{'bg-amber-100 cursor-not-allowed': !newValue.trim(), 'bg-amber-500 hover:bg-yellow-500 text-white': newValue.trim()}"
            class="bg-amber-500 hover:bg-yellow-500 text-white px-5 py-2 rounded-md text-sm font-medium" :disabled="!newValue.trim()">OK</button>
        </div>
    </div>
</div>
