<div 
    x-cloak
    x-data="fileUpload()"
    x-on:open-upload.window="open = true"
    x-show="open"
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
    x-transition
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

        <!-- File Upload (Drag & Drop style) -->
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

        <!-- Professional Preview -->
        <template x-if="fileName">
            <div class="mt-4 border rounded-xl bg-gray-50 overflow-hidden shadow-sm">
                <div class="flex items-center justify-between px-4 py-3 bg-white border-b">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 
                                2 0 002 2h12a2 2 0 002-2V8z"/>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800" x-text="fileName"></p>
                            <p class="text-xs text-gray-500" x-text="fileSize + ' • ' + fileType"></p>
                        </div>
                    </div>
                </div>

                <!-- CSV Data Preview -->
                <div class="px-4 py-3">
                    <template x-if="filePreview.length">
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left text-gray-600 border">
                                <thead class="bg-gray-100 text-gray-700 font-semibold">
                                    <tr>
                                        <template x-for="(col, index) in filePreview[0]" :key="index">
                                            <th class="px-2 py-1 border" x-text="'Col ' + (index+1)"></th>
                                        </template>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(row, rIndex) in filePreview" :key="rIndex">
                                        <tr>
                                            <template x-for="(cell, cIndex) in row" :key="cIndex">
                                                <td class="px-2 py-1 border truncate max-w-[120px]" x-text="cell"></td>
                                            </template>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </div>
            </div>
        </template>

        <!-- Error -->
        @error('file') 
            <p class="mt-2 text-xs text-red-500">{{ $message }}</p> 
        @enderror

        <!-- Footer -->
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
                :disabled="!fileName"
            >
                Upload
            </button>
        </div>
    </div>
</div>

<script>
function fileUpload() {
    return {
        open: false,
        fileName: '',
        fileSize: '',
        fileType: '',
        filePreview: [],

        handleFile(e) {
            const file = e.target.files[0];
            if (!file) return;

            this.fileName = file.name;
            this.fileSize = (file.size / 1024).toFixed(1) + ' KB';
            this.fileType = file.type || 'CSV';

            const reader = new FileReader();
            reader.onload = (event) => {
                const text = event.target.result;
                const rows = text.split('\n').map(r => r.split(','));
                this.filePreview = rows;
            };
            reader.readAsText(file);

           
        },
        
    }
}
</script>
