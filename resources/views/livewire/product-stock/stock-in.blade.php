<div x-data="stockForm()" x-cloak>
    <!-- Overlay -->
    <div 
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/40 z-60"
        @click="open = false"
        style="display: none;"
    ></div>

    <!-- Drawer -->
    <div 
        x-show="open"
        x-transition:enter="transform transition ease-in-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 w-full max-w-md h-full bg-white shadow-2xl z-61 flex flex-col"
        style="display: none;"
    >
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke-width="2" 
                     stroke="currentColor" 
                     class="w-7 h-7 text-green-500">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          d="M12 3v12m0 0l-4-4m4 4l4-4M3 21h18" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Stock In</h2>
            </div>
            
            <button 
                @click="open = false" 
                class="text-gray-400 hover:text-gray-600 transition"
            >
                <svg xmlns="http://www.w3.org/2000/svg" 
                     viewBox="0 0 20 20" 
                     fill="currentColor" 
                     class="w-6 h-6">
                    <path fill-rule="evenodd" 
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 
                          1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 
                          1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 
                          10 4.293 5.707a1 1 0 010-1.414z" 
                          clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Body (scrollable) -->
        <div class="flex-1 overflow-y-auto px-6 py-5 space-y-6">
            
            <!-- Product Info -->
             <div class="space-y-1">
                <x-forms.label label="Product" required="true" />
                <x-select-searchable-qisti 
                   :options="$productList" 
                    placeholder="Select Product" 
                    name="productSelected" 
                    model="productSelected" 
                    value="{{$product?->id}}"
                />
            </div>
            <!-- Quantity -->
            <x-forms.input-number 
                label="Quantity" 
                name="quantity" 
                placeholder="Enter quantity" 
                required 
            />

            <!-- In or oUT -->
            <div class="space-y-1">
                <x-forms.label label="Category" required="true" />
                <x-select-searchable-qisti 
                    placeholder="Select Action Category" 
                    name="categorySelected" 
                    model="categorySelected" 
                    :options="$categoryList" 
                />
            </div>

            <!-- remark -->
            <x-forms.textarea 
                label="remark" 
                name="remark" 
                id="remark" 
                placeholder="Write a brief remark..." 
                rows="3" 
                maxlength="300" 
            />
            <div x-data="cameraHandler()" class="space-y-3">
                <!-- Normal File Input -->
                <input 
                    type="file" 
                    accept="image/*" 
                    class="block w-full text-sm text-gray-600"
                    wire:model="photo"
                >
            
                <!-- Button to open camera -->
                <button 
                    type="button" 
                    @click="startCamera" 
                    x-show="!cameraActive"
                    class="px-3 py-2 rounded-md bg-yellow-500 text-white text-sm hover:bg-yellow-600"
                >
                    Use Camera
                </button>
            
                <!-- Camera UI -->
                <div x-show="cameraActive" class="space-y-2">
                    <!-- Live Preview -->
                    <video x-ref="video" autoplay playsinline class="w-full rounded-lg bg-black"></video>
            
                    <div class="flex gap-2">
                        <!-- Capture Button -->
                        <button 
                            type="button" 
                            @click="takePhoto" 
                            class="flex-1 px-3 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"
                        >
                            Capture
                        </button>
            
                        <!-- Cancel Camera -->
                        <button 
                            type="button" 
                            @click="stopCamera" 
                            class="flex-1 px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            
                <!-- Hidden field for Livewire -->
                <input type="hidden" x-ref="photo" wire:model="photo">
            </div>
            
            
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50">
            <button 
                type="button" 
                @click="open = false"
                class="px-4 py-2 rounded-lg text-gray-700 bg-white hover:bg-gray-100 transition font-medium border"
            >
                Cancel
            </button>
            
            <button 
                type="button" 
                @click="submit()"
                class="px-5 py-2 rounded-lg bg-yellow-500 text-white font-medium hover:bg-yellow-600 shadow-sm transition"
            >
                Save
            </button>
        </div>
    </div>

<script>
    function stockForm() {
        return {
            productSelected: @entangle('productSelected'),
            categorySelected: @entangle('categorySelected'),
            remark: @entangle('remark'),
            images: @entangle('images'),
            open: @entangle('showModal'),
       

            errors: {},

             submit() {
                console.log('BITCH');
                this.errors = {};
                // if (!this.productSelected) this.errors.productSelected = true;
                // if (!this.categorySelected) this.errors.categorySelected = true;
                // if (!this.productSelected || !this.categorySelected ) return;
                @this.call('save');
            },
           
        }
    }

    function cameraHandler() {
                return {
                    video: null,
                    stream: null,
                    cameraActive: false,
            
                    startCamera() {
                        this.video = this.$refs.video;
                        navigator.mediaDevices.getUserMedia({ video: { facingMode: { ideal: "environment" } } })
                            .then(stream => {
                                this.stream = stream;
                                this.video.srcObject = stream;
                                this.cameraActive = true;
                            })
                            .catch(err => {
                                console.error("Camera error:", err);
                            });
                    },
            
                    takePhoto() {
                        const canvas = document.createElement("canvas");
                        canvas.width = this.video.videoWidth;
                        canvas.height = this.video.videoHeight;
                        const ctx = canvas.getContext("2d");
                        ctx.drawImage(this.video, 0, 0);
            
                        const dataUrl = canvas.toDataURL("image/png");
                        this.$refs.photo.value = dataUrl;
            
                        // Send Base64 to Livewire
                        @this.set('photo', dataUrl);
            
                        this.stopCamera();
                    },
            
                    stopCamera() {
                        if (this.stream) {
                            this.stream.getTracks().forEach(track => track.stop());
                        }
                        this.cameraActive = false;
                    }
                }
            }
 </script>
    

</div>
