<div x-data="productForm()" class="text-sm">

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
    
        <!-- Product Information -->
        <div class="space-y-5 mx-auto p-5 rounded-lg">
            <div class="p-5 border rounded-lg bg-white">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 flex items-center gap-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_173_16409)">
                            <path d="M17.47 10.0001C17.47 5.87455 14.1256 2.53012 10 2.53012C5.87443 2.53012 2.53 5.87455 2.53 10.0001C2.53 14.1257 5.87443 17.4701 10 17.4701C14.1256 17.4701 17.47 14.1257 17.47 10.0001ZM19.13 10.0001C19.13 15.0424 15.0423 19.1301 10 19.1301C4.95764 19.1301 0.869995 15.0424 0.869995 10.0001C0.869995 4.95776 4.95764 0.870117 10 0.870117C15.0423 0.870117 19.13 4.95776 19.13 10.0001Z" fill="#6B7280"/>
                            <path d="M9.17004 13.3302L9.17004 10.0102C9.17004 9.55177 9.54163 9.18018 10 9.18018C10.4585 9.18018 10.83 9.55177 10.83 10.0102L10.83 13.3302C10.83 13.7886 10.4585 14.1602 10 14.1602C9.54163 14.1602 9.17004 13.7886 9.17004 13.3302Z" fill="#6B7280"/>
                            <path d="M10.0082 5.84009L10.0933 5.84414C10.5117 5.88666 10.8382 6.24035 10.8382 6.67009C10.8382 7.09983 10.5117 7.45352 10.0933 7.49604L10.0082 7.50009H10C9.54163 7.50009 9.17004 7.12848 9.17004 6.67009C9.17004 6.2117 9.54163 5.84009 10 5.84009H10.0082Z" fill="#6B7280"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_173_16409">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <span>Product Information</span>
                </h2>
                
                <div class="grid grid-cols-2 gap-4">
    
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name" x-model="name"
                            class="mt-1 w-full h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            placeholder="Enter product name" required>
                    </div>
    
                    <!-- Reference -->
                    <div>
                        <label for="reference" class="block text-sm font-medium text-gray-700">Reference</label>
                        <input type="text" name="reference" id="reference" x-model="reference"
                            class="mt-1 w-full h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            placeholder="Auto generate reference" required>
                    </div>
    
                    <!-- Category -->
                    <div class="flex flex-col">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <div class="flex mt-1 items-center gap-2">
                            <select name="category_id" id="category_id" x-model="category"
                                class="select2 !flex-1 !h-9 !bg-white !rounded-md !outline !outline-1 !outline-gray-200 !px-2.5 !focus:outline-none !focus:ring-1 !focus:ring-yellow-400"
                                required>
                                <option value="">Sila buat pilihan</option>
                                <template x-for="opt in categories" :key="opt">
                                    <option :value="opt.toLowerCase().replace(/\s+/g,'_')" x-text="opt"></option>
                                </template>
                            </select>
    
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
                    </div>
    
                    <!-- Weight -->
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                        <input type="text" name="weight" id="weight" x-model="weight"
                            class="mt-1 w-full h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            placeholder="Enter weight" required>
                    </div>
    
                    <!-- Metal -->
                    <div class="flex flex-col">
                        <label for="metal_id" class="block text-sm font-medium text-gray-700">Metal</label>
                        <div class="flex mt-1 items-center gap-2">
                            <select name="metal_id" id="metal_id" x-model="metal"
                                class="select2 flex-1 h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                                required>
                                <option value="">Sila buat pilihan</option>
                                <template x-for="opt in metals" :key="opt">
                                    <option :value="opt.toLowerCase().replace(/\s+/g,'_')" x-text="opt"></option>
                                </template>
                            </select>
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
                    </div>
    
                    <!-- Gred -->
                    <div class="flex flex-col">
                        <label for="gred_id" class="block text-sm font-medium text-gray-700">Gred</label>
                        <div class="flex mt-1 items-center gap-2">
                            <select name="gred_id" id="gred_id" x-model="gred"
                                class="select2 flex-1 h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                                required>
                                <option value="">Sila buat pilihan</option>
                                <template x-for="opt in greds" :key="opt">
                                    <option :value="opt.toLowerCase().replace(/\s+/g,'_')" x-text="opt"></option>
                                </template>
                            </select>
                            <button type="button" @click="openModal('Gred')"
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
                    </div>
    
                    <!-- Description -->
                    <div class="col-span-2 mt-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="2" x-model="description"
                            class="mt-1 w-full bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 py-1.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                            maxlength="300" placeholder="Write a brief description..." required></textarea>
                    </div>
    
                </div>
            </div>
        </div>
    
        <!-- Images Section -->
        <div class="p-5">
            <div class="w-full relative bg-white rounded-lg shadow-[0_0_2px_rgba(23,26,31,0.12)] border px-4 py-2 pb-4">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 flex items-center gap-2">
                    <!-- Your Images SVG -->
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.64 4.19C16.64 3.73 16.27 3.36 15.81 3.36H4.19C3.73 3.36 3.36 3.73 3.36 4.19V15.81C3.36 16.27 3.73 16.64 4.19 16.64H15.81C16.27 16.64 16.64 16.27 16.64 15.81V4.19ZM18.3 15.81C18.3 17.18 17.18 18.3 15.81 18.3H4.19C2.81 18.3 1.7 17.18 1.7 15.81V4.19C1.7 2.81 2.81 1.7 4.19 1.7H15.81C17.18 1.7 18.3 2.81 18.3 4.19V15.81Z" fill="#6B7280"/>
                        <path d="M8.33 7.5C8.33 7.04 7.96 6.67 7.5 6.67C7.04 6.67 6.67 7.04 6.67 7.5C6.67 7.96 7.04 8.33 7.5 8.33C7.96 8.33 8.33 7.96 8.33 7.5ZM9.99 7.5C9.99 8.87 8.87 9.99 7.5 9.99C6.12 9.99 5.01 8.87 5.01 7.5C5.01 6.12 6.12 5.01 7.5 5.01C8.87 5.01 9.99 6.12 9.99 7.5Z" fill="#6B7280"/>
                        <path d="M13.74 8.63C14.4 8.63 15.03 8.89 15.5 9.36L18.06 11.92C18.38 12.31 18.36 12.79 18.06 13.09C17.76 13.4 17.28 13.42 16.95 13.15L14.33 10.53C14.17 10.38 13.96 10.29 13.74 10.29C13.55 10.29 13.36 10.36 13.21 10.48L5.61 18.07C5.29 18.4 4.76 18.4 4.44 18.07C4.11 17.75 4.11 17.22 4.44 16.9L11.98 9.36C12.16 9.19 12.6 8.83 13.74 8.63Z" fill="#6B7280"/>
                    </svg>
                    <span>Images</span>
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
    
                    <div class="w-28 h-28 relative rounded-md outline outline-2 outline-offset-[-2px] outline-gray-300 cursor-pointer flex items-center justify-center"
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
            </div>
        </div>
    
        <!-- Buttons -->
        <div class="flex justify-end mt-2 px-5 gap-2">
            <button type="button"
                    class="w-24 h-9 bg-gray-500 rounded-md text-white text-sm font-normal font-['Inter'] leading-snug hover:bg-gray-600 transition">
                Cancel
            </button>
            <button type="submit"
                    class="w-32 h-9 bg-amber-500 rounded-md text-white text-sm font-normal font-['Inter'] leading-snug hover:bg-amber-600 transition">
                Add Product
            </button>
        </div>
    
    </form>
    
<!-- Add New Modal -->
<div x-show="modalOpen" x-transition.opacity class="fixed inset-0 bg-black/30 flex items-center justify-center z-50" style="display: none;">
    <div class="bg-white rounded-lg p-5 w-80 border">
        <h3 class="text-lg font-semibold mb-4">Add New <span x-text="modalType"></span></h3>
        <input type="text" x-model="newValue" x-ref="newValueInput"
               class="w-full border rounded-md px-3 py-2 outline outline-1 outline-gray-200 focus:ring-1 focus:ring-yellow-400"
               placeholder="Enter new value">
        <div class="mt-4 flex justify-end gap-2">
            <button type="button" @click="closeModal()" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md">Cancel</button>
            <button type="button" @click="saveOption()" class="bg-amber-500 hover:bg-yellow-500 text-white px-4 py-2 rounded-md">OK</button>
        </div>
    </div>
</div>



    <script>
Livewire.hook('morph.updated', ({ el, component }) => {
    $('.select2').select2('destroy');
    $('.select2').select2();
    
})
   
        $(document).ready(function() {
    $('.select2').select2();
});
function productForm() {
    return {
        name: @entangle('name'),
        reference: @entangle('reference'),
        category: @entangle('category_id'),
        metal: @entangle('metal_id'),
        gred: @entangle('gred_id'),
        weight: @entangle('weight'),
        description: @entangle('description'),
        categories: @entangle('categories'),
        metals: @entangle('metals'),
        greds: @entangle('greds'),
        selectedFiles: @entangle('images'),
        modalOpen: false,
        modalType: '',
        newValue:  @entangle('newValue'),

        openModal(type) {
            this.modalType = type;
            this.modalOpen = true;
            this.newValue = '';
            this.$nextTick(() => this.$refs.newValueInput.focus());
        },

        closeModal() {
            this.modalOpen = false;
        },

        saveOption() { 
         
            if(this.newValue.trim()) {
                @this.addOption(this.modalType, this.newValue);
                this.closeModal();
            }
        },

        addFiles(event) {
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = e => this.selectedFiles.push({file: file, url: e.target.result});
                reader.readAsDataURL(file);
            });
        },

        removeFile(index) {
            this.selectedFiles.splice(index,1);
        }
    }
}
  
    </script>

    </div>
    