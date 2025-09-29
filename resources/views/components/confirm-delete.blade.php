<div 
    x-cloak
    x-data="{ 
        open: false, 
        itemId: null, 
        functionName: 'delete', 
        modalTitle: 'Pengesahan Padam', 
        modalMessage: 'Adakah anda pasti mahu padam item ini?' 
    }" 
    x-on:open-delete.window="
        open = true; 
        itemId = $event.detail.id; 
        functionName = $event.detail.functionName || 'delete';
        modalTitle = $event.detail.title || 'Pengesahan Padam';
        modalMessage = $event.detail.message || 'Adakah anda pasti mahu padam item ini?';
    "
    x-show="open"
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-51"
    x-transition
>
    <div class="bg-white rounded-lg shadow-lg p-6 w-80">
        <h2 class="text-lg font-semibold text-gray-800" x-text="modalTitle"></h2>
        <p class="mt-2 text-sm text-gray-600" x-text="modalMessage"></p>

        <div class="mt-4 flex justify-end gap-2">
            <button 
                @click="open = false"
                class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-sm"
            >
                Batal
            </button>
            <button 
                @click="$wire.call(functionName, itemId); open = false"
                class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white text-sm"
            >
                Padam
            </button>
        </div>
    </div>
</div>
