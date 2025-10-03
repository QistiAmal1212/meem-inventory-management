@props([
    'label' => 'Description',
    'name' => 'description',
    'id' => 'description',
    'rows' => 2,
    'placeholder' => 'Write a brief description...',
    'maxlength' => 300,
])

<div {{ $attributes->merge(['class' => 'col-span-2 mt-3']) }}>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        rows="{{ $rows }}"
        {{-- x-model="{{ $name }}" --}}
        class="mt-1 w-full bg-white rounded-md outline outline-1 outline-gray-200 px-2.5 py-1.5 focus:outline-none focus:ring-1 focus:ring-yellow-400"
        maxlength="{{ $maxlength }}"
        placeholder="{{ $placeholder }}"
    ></textarea>
</div>
