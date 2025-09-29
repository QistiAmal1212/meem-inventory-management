<div class="p-5">
    <div class="w-full relative bg-white rounded-lg shadow-[0_0_2px_rgba(23,26,31,0.12)] border px-4 py-2 pb-4">
        <h2 class="text-lg mb-4 text-gray-800 flex items-center gap-2">
            <x-icons.image-icon />
            <span class="font-semibold ">Images</span><span class="text-red-500">*</span>
        </h2>
        <div class="flex flex-wrap gap-4 mt-4 relative">
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
                    <x-icons.add-image-icon />
                    <span class="text-gray-400 text-sm font-normal font-['Inter']">Add Images</span>
                </div>
            </div>
            <input type="file" x-ref="imagesInput" multiple accept="image/*" class="hidden" @change="addFiles($event)">
        </div>
        <p  x-cloak x-show="errors.images" class="text-xs text-red-500" >At least 1 image is required.</p>
    </div>
    
</div>