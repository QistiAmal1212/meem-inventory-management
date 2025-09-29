<button type="button" @click="{{ $onClick }}"
    class="w-28 h-9 relative bg-white rounded-md outline outline-1 outline-offset-[-1px] outline-amber-500 overflow-hidden flex items-center justify-center gap-2 px-2">
    <div class="w-4 h-4 relative flex-none">
        <x-icons.plus-icon />
    </div>
    <span class="text-amber-500 text-sm font-normal font-['Inter'] leading-snug">{{ $label }}</span>
</button>
