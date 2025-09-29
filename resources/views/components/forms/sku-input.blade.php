<div x-cloak x-data="{ focused: false, touched: false}">
    <x-forms.label label=" Sku Number" required  />
    <div class="mt-1 flex">
        <input type="text"
        name="reference"
        maxlength="15"
        @focus="focused = true" 
        @blur="focused = false; touched = true"
        id="reference"
        x-model="reference"
        class="h-10 w-full rounded-l-md border border-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
        placeholder="Auto generate reference"
        required>
 
    <!-- Generate Button -->
    <button type="button"
            @click="generateReference"
            class="h-10 w-24 bg-amber-500 rounded-r-md flex items-center justify-center 
                   text-white text-sm font-normal font-['Inter'] leading-none hover:bg-amber-600">
        Generate
    </button>
    </div>  

<p><span x-cloak x-show="focused" class="text-xs text-gray-400"> <span x-text="reference.length"></span> /30 characters</span></p>
                  <!-- Validation error -->
<p  x-cloak x-show="errors.reference && !reference || (touched && !reference && !errors.reference)" class="text-xs text-red-500 mt-1" >Product Reference is required.</p>

</div>