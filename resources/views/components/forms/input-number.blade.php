<div x-cloak 
     x-data="{ 
         focused: false, 
         touched: false, 
         nameValue: @entangle($name) 
     }" 
     class="space-y-1">

    <x-forms.label :label="$label" :required="$required" />

    <input 
        type="number" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        x-model="{{ $name }}"
        maxlength="{{ $maxlength }}"
        @keydown="if(event.key === '-' || event.key === 'e') event.preventDefault()" 
        @focus="focused = true" 
        @blur="focused = false; touched = true"
        class="mt-1 w-full h-9 bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
        placeholder="{{ $placeholder }}"
        min=0
    >

    {{-- <p>
        <span x-cloak x-show="focused" class="text-xs text-gray-400">
            <span x-text="{{ $name }}.length"></span> / {{ $maxlength }} characters
        </span>
    </p> --}}

    <p x-cloak x-show="(errors.{{ $name }} && !{{ $name }}) || (touched && !{{ $name }} && !errors.{{ $name }})" class="text-xs text-red-500">
        {{ $label }} is required.
    </p>
</div>
