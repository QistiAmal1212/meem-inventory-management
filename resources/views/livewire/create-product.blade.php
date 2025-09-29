<div x-cloak x-data="productForm()" class="text-sm" >

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
    
        <!-- Product Information -->
        <div class="space-y-5 mx-auto p-4 rounded-lg">
            <div class="p-5 border rounded-lg bg-white">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 flex items-center gap-2">
                   <x-icons.info-icon />
                    <span>Product Information</span>
                </h2>
                
                <div class="grid grid-cols-2 gap-4">
    
                    <!-- Product Name -->
                    <div x-cloak x-data="{ focused: false, touched: false}">
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name<span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" x-model="name"
                        maxlength="30"
                        @focus="focused = true" 
                        @blur="focused = false; touched = true"
                            class="mt-1 w-full h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            placeholder="Enter product name" >
                           <p><span x-cloak x-show="focused" class="text-xs text-gray-400"> <span x-text="name.length"></span> /30 characters</span></p>
                            <p x-cloak  x-show="(errors.name && !name) || (touched && !name && !errors.name)"  class="text-xs text-red-500" > Product Name is required.</p>
                    </div>
    
                  <!-- Reference -->
                  <div x-cloak x-data="{ focused: false, touched: false}">
                    <label for="reference" class="block text-sm font-medium text-gray-700">SKU Number<span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex">
                    <input type="text"
                           name="reference"
                            maxlength="15"
                            @focus="focused = true" 
                            @blur="focused = false; touched = true"
                           id="reference"
                           x-model="reference"
                           class="h-10 w-full rounded-l-md border border-gray-200 px-2.5 
                                  focus:outline-none focus:ring-1 focus:ring-yellow-400"
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
                <p  x-cloak x-show="errors.reference && !reference || (touched && !name && !errors.name)" class="text-xs text-red-500 mt-1" >Product Reference is required.</p>

                </div>
                


    
                    <!-- Category -->
                    <div class="flex flex-col"  >
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category<span class="text-red-500">*</span>
                        </label>
                        <div class="flex mt-1 items-center gap-2">
                            <x-select-searchable-qisti 
                            :options="$categories"
                            placeholder="Select Category"
                            value="{{$selectedCategory}}"
                            name="category"
                            model="selectedCategory"
                            width="w-[420px]"
                        />
                            <button type="button" @click="openModal('Category')"
                                class="w-28 h-9 relative bg-white rounded-md outline outline-1 outline-offset-[-1px] outline-amber-500 overflow-hidden flex items-center justify-center gap-2 px-2">
                                <div class="w-4 h-4 relative flex-none">
                                  <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_173_16457)">
                                    <path d="M14.0611 7.99988C14.0611 4.66961 11.3614 1.96988 8.03113 1.96988C4.70086 1.96988 2.00113 4.66961 2.00113 7.99988C2.00113 11.3302 4.70086 14.0299 8.03113 14.0299C11.3614 14.0299 14.0611 11.3302 14.0611 7.99988ZM15.4011 7.99988C15.4011 12.0702 12.1014 15.3699 8.03113 15.3699C3.9608 15.3699 0.661133 12.0702 0.661133 7.99988C0.661133 3.92955 3.9608 0.629883 8.03113 0.629883C12.1014 0.629883 15.4011 3.92955 15.4011 7.99988Z" fill="#FF9900"/>
                                    <path d="M10.7112 7.32983C11.0812 7.32983 11.3812 7.62979 11.3812 7.99983C11.3812 8.36987 11.0812 8.66983 10.7112 8.66983L5.35115 8.66983C4.98112 8.66983 4.68115 8.36987 4.68115 7.99983C4.68115 7.62979 4.98112 7.32983 5.35115 7.32983L10.7112 7.32983Z" fill="#FF9900"/>
                                    <path d="M7.36108 10.6799L7.36108 5.3199C7.36108 4.94987 7.66104 4.6499 8.03108 4.6499C8.40112 4.6499 8.70108 4.94987 8.70108 5.3199L8.70108 10.6799C8.70108 11.0499 8.40112 11.3499 8.03108 11.3499C7.66104 11.3499 7.36108 11.0499 7.36108 10.6799Z" fill="#FF9900"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_173_16457">
                                    <rect width="16" height="16" fill="white" transform="translate(0.03125)"/>
                                    </clipPath>
                                    </defs>
                                </svg>

                                </div>
                                <span class="text-amber-500 text-sm font-normal font-['Inter'] leading-snug">Add New</span>
                            </button> 
                         
    
                        </div> 
                            <p  x-cloak x-show="(errors.category && !selectedCategory)" class="text-xs text-red-500" > Category is required.</p>
                    </div>
    
                    <!-- Weight -->
                    <div x-data="{ touched: false}">
                        <label for="weight" class="block text-sm font-medium text-gray-700">Weight<span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="weight" id="weight" x-model="weight"
                            @blur="touched = true"
                            class="mt-1 w-full h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            placeholder="Enter weight" >
                    
                           
                          
                            <p  x-cloak x-show="(errors.weight && !weight) || (touched && !weight)" class="text-xs text-red-500">Product Weight is required.</p>
                    </div>
    
                    <!-- Metal -->
                    <div class="flex flex-col"  >
                        <label for="metal_id" class="block text-sm font-medium text-gray-700">Metal<span class="text-red-500">*</span>
                        </label>
                        <div class="flex mt-1 items-center gap-2">
                            <x-select-searchable-qisti 
                            :options="$metals"
                            placeholder="Select Metal"
                            value="{{$selectedMetal}}"
                            name="metal"
                            model="selectedMetal"
                            width="w-[420px]"
                        />
                            <button type="button" @click="openModal('Metal')"
                                class="w-28 h-9 relative bg-white rounded-md outline outline-1 outline-offset-[-1px] outline-amber-500 overflow-hidden flex items-center justify-center gap-2 px-2">
                                <div class="w-4 h-4 relative flex-none">
                                  <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_173_16457)">
                                <path d="M14.0611 7.99988C14.0611 4.66961 11.3614 1.96988 8.03113 1.96988C4.70086 1.96988 2.00113 4.66961 2.00113 7.99988C2.00113 11.3302 4.70086 14.0299 8.03113 14.0299C11.3614 14.0299 14.0611 11.3302 14.0611 7.99988ZM15.4011 7.99988C15.4011 12.0702 12.1014 15.3699 8.03113 15.3699C3.9608 15.3699 0.661133 12.0702 0.661133 7.99988C0.661133 3.92955 3.9608 0.629883 8.03113 0.629883C12.1014 0.629883 15.4011 3.92955 15.4011 7.99988Z" fill="#FF9900"/>
                                <path d="M10.7112 7.32983C11.0812 7.32983 11.3812 7.62979 11.3812 7.99983C11.3812 8.36987 11.0812 8.66983 10.7112 8.66983L5.35115 8.66983C4.98112 8.66983 4.68115 8.36987 4.68115 7.99983C4.68115 7.62979 4.98112 7.32983 5.35115 7.32983L10.7112 7.32983Z" fill="#FF9900"/>
                                <path d="M7.36108 10.6799L7.36108 5.3199C7.36108 4.94987 7.66104 4.6499 8.03108 4.6499C8.40112 4.6499 8.70108 4.94987 8.70108 5.3199L8.70108 10.6799C8.70108 11.0499 8.40112 11.3499 8.03108 11.3499C7.66104 11.3499 7.36108 11.0499 7.36108 10.6799Z" fill="#FF9900"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_173_16457">
                                <rect width="16" height="16" fill="white" transform="translate(0.03125)"/>
                                </clipPath>
                                </defs>
                                </svg>

                                </div>
                                <span class="text-amber-500 text-sm font-normal font-['Inter'] leading-snug">Add New</span>
                            </button>
                        </div>
                      
                        <p   x-cloak x-show="errors.metal && !selectedMetal" class="text-xs text-red-500" >Metal is required.</p>
                    </div>
    
                    <!-- Gred -->
                    <div class="flex flex-col" 
                  >
                        <label for="grade_id" class="block text-sm font-medium text-gray-700">Grade<span class="text-red-500">*</span>
                        </label>
                        <div class="flex mt-1 items-center gap-2">
                            <x-select-searchable-qisti 
                            :options="$grades"
                            placeholder="Select Grade"
                            value="{{$selectedGrade}}"
                            name="grade"
                            model="selectedGrade"
                            width="w-[420px]"
                        />
                            <button type="button" @click="openModal('Grade')"
                                class="w-28 h-9 relative bg-white rounded-md outline outline-1 outline-offset-[-1px] outline-amber-500 overflow-hidden flex items-center justify-center gap-2 px-2">
                                <div class="w-4 h-4 relative flex-none">
                                  <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_173_16457)">
<path d="M14.0611 7.99988C14.0611 4.66961 11.3614 1.96988 8.03113 1.96988C4.70086 1.96988 2.00113 4.66961 2.00113 7.99988C2.00113 11.3302 4.70086 14.0299 8.03113 14.0299C11.3614 14.0299 14.0611 11.3302 14.0611 7.99988ZM15.4011 7.99988C15.4011 12.0702 12.1014 15.3699 8.03113 15.3699C3.9608 15.3699 0.661133 12.0702 0.661133 7.99988C0.661133 3.92955 3.9608 0.629883 8.03113 0.629883C12.1014 0.629883 15.4011 3.92955 15.4011 7.99988Z" fill="#FF9900"/>
<path d="M10.7112 7.32983C11.0812 7.32983 11.3812 7.62979 11.3812 7.99983C11.3812 8.36987 11.0812 8.66983 10.7112 8.66983L5.35115 8.66983C4.98112 8.66983 4.68115 8.36987 4.68115 7.99983C4.68115 7.62979 4.98112 7.32983 5.35115 7.32983L10.7112 7.32983Z" fill="#FF9900"/>
<path d="M7.36108 10.6799L7.36108 5.3199C7.36108 4.94987 7.66104 4.6499 8.03108 4.6499C8.40112 4.6499 8.70108 4.94987 8.70108 5.3199L8.70108 10.6799C8.70108 11.0499 8.40112 11.3499 8.03108 11.3499C7.66104 11.3499 7.36108 11.0499 7.36108 10.6799Z" fill="#FF9900"/>
</g>
<defs>
<clipPath id="clip0_173_16457">
<rect width="16" height="16" fill="white" transform="translate(0.03125)"/>
</clipPath>
</defs>
</svg>

                                </div>
                                <span class="text-amber-500 text-sm font-normal font-['Inter'] leading-snug">Add New</span>
                            </button>
                        </div>
                      
                        <p  x-cloak x-show="(errors.grade && !selectedGrade) " class="text-xs text-red-500" >Grade is required.</p>
                    </div>
    
                    <!-- Description -->
                    <div class="col-span-2 mt-3">
                        <label i said for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="2" x-model="description"
                            class="mt-1 w-full bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 py-1.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            maxlength="300" placeholder="Write a brief description..." ></textarea>
                    </div>
    
                </div>
            </div>
        </div>
    
        <!-- Images Section -->
        <div class="p-5">
            <div class="w-full relative bg-white rounded-lg shadow-[0_0_2px_rgba(23,26,31,0.12)] border px-4 py-2 pb-4">
                <h2 class="text-lg mb-4 text-gray-800 flex items-center gap-2">
                    <!-- Your Images SVG -->
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.64 4.19C16.64 3.73 16.27 3.36 15.81 3.36H4.19C3.73 3.36 3.36 3.73 3.36 4.19V15.81C3.36 16.27 3.73 16.64 4.19 16.64H15.81C16.27 16.64 16.64 16.27 16.64 15.81V4.19ZM18.3 15.81C18.3 17.18 17.18 18.3 15.81 18.3H4.19C2.81 18.3 1.7 17.18 1.7 15.81V4.19C1.7 2.81 2.81 1.7 4.19 1.7H15.81C17.18 1.7 18.3 2.81 18.3 4.19V15.81Z" fill="#6B7280"/>
                        <path d="M8.33 7.5C8.33 7.04 7.96 6.67 7.5 6.67C7.04 6.67 6.67 7.04 6.67 7.5C6.67 7.96 7.04 8.33 7.5 8.33C7.96 8.33 8.33 7.96 8.33 7.5ZM9.99 7.5C9.99 8.87 8.87 9.99 7.5 9.99C6.12 9.99 5.01 8.87 5.01 7.5C5.01 6.12 6.12 5.01 7.5 5.01C8.87 5.01 9.99 6.12 9.99 7.5Z" fill="#6B7280"/>
                        <path d="M13.74 8.63C14.4 8.63 15.03 8.89 15.5 9.36L18.06 11.92C18.38 12.31 18.36 12.79 18.06 13.09C17.76 13.4 17.28 13.42 16.95 13.15L14.33 10.53C14.17 10.38 13.96 10.29 13.74 10.29C13.55 10.29 13.36 10.36 13.21 10.48L5.61 18.07C5.29 18.4 4.76 18.4 4.44 18.07C4.11 17.75 4.11 17.22 4.44 16.9L11.98 9.36C12.16 9.19 12.6 8.83 13.74 8.63Z" fill="#6B7280"/>
                    </svg>
                    <span class="font-semibold ">Images</span><span class="text-red-500">*</span>
                </h2>
                
    
                <div class="flex flex-wrap gap-4 mt-4 relative">
                    <!-- Add Image Slot -->
                    <template x-for="(file, index) in selectedFiles" :key="index">
                        <div class="w-28 h-28 relative bg-zinc-300 rounded-md overflow-hidden outline outline-1 outline-gray-200">
                            <img :src="file.url" class="w-full h-full object-cover">
                            <button type="button" @click="removeFile(index)"
                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">&times;</button>
                        </div>
                    </template>
    
                    <div class="w-30 h-30 relative rounded-md outline outline-2 outline-offset-[-2px] outline-gray-300 cursor-pointer flex items-center justify-center"
                         @click="$refs.imagesInput.click()">
                        <div class="flex flex-col items-center justify-center text-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12ZM23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12Z" fill="#9CA3AF"/>
                                <path d="M16 11C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13L8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11L16 11Z" fill="#9CA3AF"/>
                                <path d="M11 16L11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8L13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16Z" fill="#9CA3AF"/>
                                </svg>
                                
                            <span class="text-gray-400 text-sm font-normal font-['Inter']">Add Images</span>
                        </div>
                    </div>
                    <input type="file" x-ref="imagesInput" multiple accept="image/*" class="hidden" @change="addFiles($event)">
                </div>
                <p  x-cloak x-show="errors.images" class="text-xs text-red-500" >At least 1 image is required.</p>
            </div>
            
        </div>
    
        <!-- Buttons -->
        <div class="flex justify-end mt-1 px-5 gap-2 mb-8">
            <button type="button"
                    class="w-24 h-9 bg-gray-500 rounded-md text-white text-sm font-normal font-['Inter'] leading-snug hover:bg-gray-600 transition">
                Cancel
            </button>
            <button type="button"
            @click="submitProduct()"
                    class="w-32 h-9 bg-amber-500 rounded-md text-white text-sm font-normal font-['Inter'] leading-snug hover:bg-amber-600 transition">
                Add Product
            </button>
        </div>
    
    </form>
    
<!-- Add New Modal -->
<div x-show="modalOpen" x-transition.opacity class="fixed inset-0 bg-black/30 flex items-center justify-center z-51" style="display: none;">
    <div @click.away="closeModal()" class="bg-white rounded-lg p-6 w-96 border shadow-lg">
        <!-- Header with bigger SVG -->
        <div class="flex items-center gap-3 mb-4">
            <!-- Bigger SVG (32x32) -->
            <svg class="w-8 h-8 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
            </svg>
            <h3 class="text-xl font-semibold">Add New <span x-text="modalType"></span></h3>
        </div>

        <!-- Description text -->
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

<div x-data="{ showModal: false, modalMessage: '' }" x-cloak>
    <div x-show="showModal" x-transition.opacity
         class="fixed inset-0 bg-black/30 flex items-center justify-center z-50"
         style="display: none;">
        <div @click.away="showModal = false" class="bg-white rounded-lg p-6 w-96 border shadow-lg">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 16h-1v-4h-1m1-4h.01M12 2C6.48 2 2 6.48 
                             2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
                </svg>
                <h3 class="text-xl font-semibold">Validation Error</h3>
            </div>

            <p class="text-sm text-gray-600 mb-4" x-text="modalMessage"></p>

            <div class="mt-5 flex justify-end">
                <button type="button" @click="showModal = false"
                        class="bg-amber-500 hover:bg-yellow-500 text-white px-5 py-2 rounded-md text-sm font-medium">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Professional Modal -->
<div x-show="showModal" x-transition.opacity
     class="fixed inset-0 bg-black/30 flex items-center justify-center z-50"
     style="display: none;">

    <!-- Modal Card -->
    <div @click.away="showModal = false"
         class="bg-white rounded-xl shadow-xl w-96 max-w-full p-6 transform transition-all duration-300 scale-95"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">

        <!-- Header -->
        <div class="flex items-center gap-2 mb-4">
            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M13 16h-1v-4h-1m1-4h.01M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-800">Validation Errors</h3>
        </div>

        <ul class="flex flex-wrap gap-2 max-h-48 overflow-y-auto p-2">
            @foreach($modalMessage as $field => $messages)
                @foreach($messages as $msg)
                    <li class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full shadow-sm flex items-center gap-1">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                        </svg>
                        <span> {{ $msg }}</span>
                    </li>
                @endforeach
            @endforeach
        </ul>
        
        

        <!-- Footer -->
        <div class="mt-6 flex justify-end">
            <button @click="showModal = false"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-md font-medium transition">
                OK
            </button>
        </div>

    </div>
</div>

<script>
    function productForm() {
        return {
            // form state
            name: @entangle('name'),
            reference: @entangle('reference'),
            selectedCategory:@entangle('selectedCategory'),
            weight: @entangle('weight'),
            selectedMetal: @entangle('selectedMetal'),
            selectedGrade: @entangle('selectedGrade'),
            description: @entangle('description'),
            selectedFiles: @entangle('images'),
            newValue: '',
            modalType: '',
            showModal: @entangle('showModal'),
    
            // modal
            modalOpen: false,
            showModalRequiredFiledForReference: false,
    
            // validation
            errors: {},
    
            generateReference() {
            if (!this.name) 
            {
               this.errors.name = "Product Name is required.";
              
            }
            if (!this.weight)
            {
                this.errors.weight = "Product Weight is required.";
            }
            if (!this.name || !this.weight) {
                this.showModalRequiredFiledForReference = true;
               return;
            }
            let gram = this.weight + 'G-';
            // Ambil singkatan dari nama (huruf pertama setiap perkataan)

            let initials = this.name
                .split(/\s+/) // split ikut space
                .map(word => word.charAt(0).toUpperCase())
                .join('');

           // Tarikh format DDMMYY
            let date = new Date();
            let formattedDate =
                String(date.getDate()).padStart(2, '0') +
                String(date.getMonth() + 1).padStart(2, '0') +
                date.getFullYear().toString().slice(-2);


            // Combine → contoh: LKSMAB-20250928
            this.reference = gram + initials + formattedDate;
    
        },


            // modal functions
            openModal(type) {
                this.modalOpen = true;
            },
            closeModal() {
                this.modalOpen = false;
            },
    
            // file handling
            addFiles(event) {
                Array.from(event.target.files).forEach(file => {
                    this.selectedFiles.push({
                        file,
                        url: URL.createObjectURL(file)
                    });
                });
                this.errors.images = "";
                event.target.value = '';
    
            },
            removeFile(index) {
                this.selectedFiles.splice(index, 1);
                if(!this.selectedFiles.length){
                    this.errors.images = 1;
                }
            },
    
            // ✅ validation + submit
            submitProduct() {
                this.error = null; 
                this.errors = {};
    
                // Required fields
                if (!this.name) this.errors.name = 1;
                if (!this.selectedCategory) this.errors.category = 1;
                if (!this.weight) this.errors.weight = 1;
                if (!this.selectedMetal) this.errors.metal =1;
                if (!this.selectedGrade) this.errors.grade = 1;
                if (!this.reference) this.errors.reference = 1;
                if (this.selectedFiles.length === 0) this.errors.images = 1;
    
                if (
                    !this.name ||
                    !this.selectedCategory ||
                    !this.weight ||
                    !this.selectedMetal ||
                    !this.selectedGrade ||
                    !this.reference ||
                    this.selectedFiles.length === 0
                ) {
                    this.error = "Please fill in all required fields.";
                    return;
                }
        
        
            
 @this.call('submit');

                
            }
        }
    }
    </script>
    

    </div>
    