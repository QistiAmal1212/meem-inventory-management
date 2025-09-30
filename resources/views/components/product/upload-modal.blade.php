<div 
    x-cloak
    x-data="fileUpload(
        @entangle('existingNames'),
        @entangle('existingSkus'),
        @entangle('categories'),
        @entangle('metals'),
        @entangle('grades')
     )"
    x-on:open-upload.window="open = true"
    x-show="open"
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
    x-transition
    x-effect="!open && reset()"
>
    <div @click.away="open = false"
         class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-6 transform transition-all">

        <!-- Header -->
        <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 16v-8m0 0l-4 4m4-4l4 4M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1"/>
            </svg>
            Import Products
        </h2>

        <!-- Example CSV link -->
        <div class="mb-3 text-sm">
            <a href="{{ asset('example/products-example.csv') }}" 
               download
               class="text-amber-600 hover:text-amber-700 font-medium underline">
               Download Template
            </a>
        </div>

        <!-- File Upload -->
        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
            <div class="flex flex-col items-center justify-center pt-4 pb-2">
                <svg class="w-10 h-10 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01.88-2.62l4.12-5.13a4 4 0 016.35 0l4.12 5.13A4 4 0 0121 16H7z"/>
                </svg>
                <p class="text-sm text-gray-500 mt-2">Click to upload or drag and drop</p>
                <p class="text-xs text-gray-400">CSV only</p>
            </div>
            <input 
                type="file" 
                wire:model="file" 
                accept=".csv"
                class="hidden" 
                @change="handleFile($event)"
            />
        </label>

        <template x-if="fileName">
            <div class="mt-4 border rounded-xl bg-gray-50 overflow-hidden shadow-sm max-h-[400px] flex flex-col">
                
                <!-- Table scrollable -->
                <div class="overflow-auto flex-1">
                    <table class="w-full text-xs text-left text-gray-600 border">
                        <thead class="bg-gray-100 text-gray-700 font-semibold sticky top-0">
                            <tr>
                                <template x-for="col in fileHeader" :key="col">
                                    <th class="px-2 py-1 border" x-text="col"></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(row, rIndex) in filePreview" :key="rIndex">
                                <tr>
                                    <template x-for="(cell, cIndex) in row" :key="cIndex">
                                        <td class="px-2 py-1 border truncate max-w-[120px]"
                                            :class="getCellClass(fileHeader[cIndex], cell)"
                                            x-text="cell">
                                        </td>
                                    </template>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
        
                <!-- Errors scrollable -->
                <template x-if="fileErrors.length">
                    <div class="mt-2 p-2 border border-red-200 rounded text-red-700 text-sm overflow-auto max-h-32">
                        <template x-for="error in fileErrors" :key="error">
                            <p x-text="error"></p>
                        </template>
                    </div>
                </template>
            </div>
        </template>
        


        @error('file') 
            <p class="mt-2 text-xs text-red-500">{{ $message }}</p> 
        @enderror

        <div class="mt-6 flex justify-end gap-3">
            <button 
                @click="open = false"
                class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm text-gray-700"
            >
                Cancel
            </button>
            <button 
                @click="$wire.uploadFile(); open = false"
                class="px-4 py-2 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium shadow-sm disabled:opacity-50"
               :disabled="!fileName || fileErrors.length > 0"
            >
                Upload
            </button>
        </div>
    </div>
</div>

<script>
function fileUpload(existingNames = [], existingSkus = [], categories = [], metals = [], grades = []) {
    return {
        open: false,
        fileName: '',
        filePreview: [],
        fileHeader: [],
        fileErrors: [],
        existingNames: existingNames,
        existingSkus: existingSkus,
        categories: categories,
        metals: metals,
        grades: grades,

        handleFile(e) {
            const file = e.target.files[0];
            if (!file) return;

            this.fileName = file.name;
            const reader = new FileReader();
            reader.onload = (event) => {
                const text = event.target.result.trim();
                const rows = text.split(/\r?\n/).map(r => r.split(','));

                this.fileHeader = rows.shift();
                this.filePreview = rows;

                // Reset errors
                this.fileErrors = [];

                // Collect errors
                this.filePreview.forEach((row, rIndex) => {
                    row.forEach((cell, cIndex) => {
                        const column = this.fileHeader[cIndex].trim().toLowerCase();
                        const val = cell.trim().toLowerCase();

                         // Required error
        if (!val) {
            this.fileErrors.push(`Row ${rIndex + 1}, column "${column}" cannot be empty.`);
            return; // skip other checks if empty
        }

        // Column-specific validations
        if (column === 'weight' && !/^\d+(\.\d+)?$/.test(val)) this.fileErrors.push(`Row ${rIndex + 1}: Weight must be a number.`);
        if (column === 'name' && this.existingNames.includes(val.toLowerCase())) this.fileErrors.push(`Row ${rIndex + 1}: Duplicate name "${cell}".`);
        if (column === 'sku' && this.existingSkus.includes(val.toLowerCase())) this.fileErrors.push(`Row ${rIndex + 1}: Duplicate SKU "${cell}".`);
        if (column === 'category' && !this.categories.includes(val.toLowerCase())) this.fileErrors.push(`Row ${rIndex + 1}: Invalid category "${cell}".`);
        if (column === 'metal' && !this.metals.includes(val.toLowerCase())) this.fileErrors.push(`Row ${rIndex + 1}: Invalid metal "${cell}".`);
        if (column === 'grade' && !this.grades.includes(val.toLowerCase())) this.fileErrors.push(`Row ${rIndex + 1}: Invalid grade "${cell}".`);
                    });
                });
            };
            reader.readAsText(file);
        },

        getCellClass(column, value) {
            const val = value.trim().toLowerCase();
            column = column.trim().toLowerCase();

            if (!val) return 'bg-red-100 text-red-700 font-semibold';
            if (column === 'name' && this.existingNames.includes(val)) return 'bg-red-100 text-red-700 font-semibold';
            if (column === 'sku' && this.existingSkus.includes(val)) return 'bg-red-100 text-red-700 font-semibold';
            if (column === 'weight' && !/^\d+(\.\d+)?$/.test(val)) return 'bg-red-100 text-red-700 font-semibold';
            if (column === 'category' && !this.categories.includes(val)) return 'bg-red-100 text-red-700 font-semibold';
            if (column === 'metal' && !this.metals.includes(val)) return 'bg-red-100 text-red-700 font-semibold';
            if (column === 'grade' && !this.grades.includes(val)) return 'bg-red-100 text-red-700 font-semibold';

            return '';
        },
        reset() {
            this.fileName = '';
            this.filePreview = [];
            this.fileHeader = [];
            this.fileErrors = [];
        }
    }
}

</script>
