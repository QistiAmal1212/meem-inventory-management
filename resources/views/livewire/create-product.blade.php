<div x-cloak x-data="productForm()" class="text-sm" >

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf

        <div class="space-y-5 mx-auto p-4 rounded-lg">
            <div class="p-5 border rounded-lg bg-white">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 flex items-center gap-2">
                   <x-icons.info-icon />
                    <span>Product Information</span>
                </h2>
                
                <div class="grid grid-cols-2 gap-4">
    
                    <x-forms.input-text label="Product Name" name="name" placeholder="Enter product name" required  maxlength="30" />
                    <x-forms.sku-input />
                    <x-forms.dropdown-set label="Category" required="true" :options="$categories" placeholder="Select Category" value="{{$selectedCategory}}" name="category"  model="selectedCategory" width="w-[420px]" addButtonLabel="Add New" onClick="openModal('Category')"/>
                    <x-forms.input-number label="Product Weight" name="weight" placeholder="Enter product weight" required  maxlength="30" />
                    <x-forms.dropdown-set label="Metal" required="true" :options="$metals" placeholder="Select Metal" value="{{$selectedMetal}}" name="metal" model="selectedMetal" width="w-[420px]" addButtonLabel="Add New" onClick="openModal('Metal')"/>
                    <x-forms.dropdown-set label="Grade" required="true" :options="$grades" placeholder="Select Grade" value="{{$selectedGrade}}" name="grade" model="selectedGrade" width="w-[420px]" addButtonLabel="Add New" onClick="openModal('Grade')" />
                    <x-forms.textarea label="Description" name="description" id="description" placeholder="Write a brief description..." rows="2" maxlength="300" />
                 

                </div>   
            
            </div>
        </div>

        <x-product.image-form />  
        
        <!-- Buttons -->
        <div class="flex justify-end mt-1 px-5 gap-2 mb-8">
            <x-forms.cancel-button />
            <x-forms.submit-button text="Save Product" />
        </div> 
    
    </form>
    
    @include('livewire.product.create.modal')

<script>
    function productForm() {
        return {
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
            modalOpen: false,
            showModalRequiredFiledForReference: false,
    
            errors: {},

             submit() {
                this.errors = {};
                if (!this.name) this.errors.name = true;
                if (!this.selectedCategory) this.errors.category = true;
                if (!this.weight) this.errors.weight = true;
                if (!this.selectedMetal) this.errors.metal = true;
                if (!this.selectedGrade) this.errors.grade = true;
                if (!this.reference) this.errors.reference = true;
                // if (this.selectedFiles.length === 0) this.errors.images = true;
                if (!this.name || !this.selectedCategory || !this.weight || !this.selectedMetal || !this.selectedGrade || !this.reference ||  this.selectedFiles.length === 0 ) return;
                @this.set('images', this.selectedFiles)
                @this.call('submit');
            },
    
            generateReference() {
            if (!this.name)  this.errors.name = "Product Name is required.";
            if (!this.weight) this.errors.weight = "Product Weight is required.";
            if (!this.name || !this.weight) {
                this.showModalRequiredFiledForReference = true;
               return;
            }

            let gram = this.weight + 'G-';
            // Ambil singkatan dari nama (huruf pertama setiap perkataan)
            let initials = this.name.split(/\s+/).map(word => word.charAt(0).toUpperCase()).join('');
            // Tarikh format DDMMYY
            let date = new Date();
            let formattedDate = String(date.getDate()).padStart(2, '0') + String(date.getMonth() + 1).padStart(2, '0') + date.getFullYear().toString().slice(-2);
            this.reference = gram + initials + formattedDate;
        },
           
            openModal(type) {
                this.modalType = type;
                this.modalOpen = true;
            },
            closeModal() {
                this.modalOpen = false;
            },
            
            saveOption() {
                @this.call('addOption', this.modalType, this.newValue)
                this.newValue = '';
                this.closeModal();
            },

            addFiles(event) {
          Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.selectedFiles.push({
                        file: e.target.result, // ✅ base64 string
                        name: file.name,
                        url: URL.createObjectURL(file) // for preview only
                    });
                };
                reader.readAsDataURL(file); // convert to base64
            });

            this.errors.images = "";
            event.target.value = '';
        },

            removeFile(index) {
                @this.removeExistingImage(index);
                // this.selectedFiles.splice(index, 1);
                // if(!this.selectedFiles.length){
                //     this.errors.images = 1;
                // }
            },
           
        }
    }
 </script>
    

</div>
    