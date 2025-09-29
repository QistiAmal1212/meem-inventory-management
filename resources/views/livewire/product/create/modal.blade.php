<x-modal.add-value />

<x-modal.warning :show="'showModal'"  title="Validation Errors"   buttonText="OK" >
    <ul class="flex flex-wrap gap-2 max-h-48 overflow-y-auto p-2">
        @foreach($modalMessage as $field => $messages)
            @foreach($messages as $msg)
                <li class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full shadow-sm flex items-center gap-1">
                  <x-icons.warning-icon class="w-4 h-4"/>
                    <span> {{ $msg }}</span>
                </li>
            @endforeach
        @endforeach
    </ul>
</x-modal.warning>


<x-modal.warning :show="'showModalRequiredFiledForReference'"  title="Generate Errors" buttonText="OK" >
    <li class="text-sm font-medium px-3 py-1  flex items-center gap-1">
        <span>Please make sure field name and weight being fill before generate!</span>
    </li>
</x-modal.warning>