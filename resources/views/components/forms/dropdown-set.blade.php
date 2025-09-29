@props([
    'label' => 'Select',
    'required' => false,
    'options' => [],
    'placeholder' => 'Select an option',
    'value' => null,
    'name' => 'dropdown',
    'model' => null,
    'width' => 'w-full',
    'addButtonLabel' => 'Add New',
    'onClick' => null,
])

<div class="flex flex-col">
    <x-forms.label :label="$label" :required="$required" />

    <div class="flex mt-1 items-center gap-2">
        <x-select-searchable-qisti 
            :options="$options" 
            :placeholder="$placeholder" 
            :value="$value" 
            :name="$name" 
            :model="$model" 
            :width="$width" 
        />

        @if($onClick)
            <x-forms.input-dropdown.add-button :label="$addButtonLabel" :onClick="$onClick" />
        @endif
    </div>

    <p x-cloak x-show="(errors.{{ $name }} && !{{ $model }})" class="text-xs text-red-500">
        {{ $label }} is required.
    </p>
</div>
