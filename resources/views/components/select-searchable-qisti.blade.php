<div class="relative main-div" id="{{ $id }}">
    <!-- Trigger / input -->
    <div class=" {{ $width }} flex items-center justify-between h-10 px-3 border border-gray-200 rounded-md cursor-pointer bg-white"
         onclick="toggleDropdown('{{ $id }}')">
        <span class="text-xs text-gray-500" id="{{ $id }}-display">
            {{ $value !== null && $value !== '' 
        ? ($options[$value] ?? $placeholder) 
        : $placeholder 
    }}
        </span>
        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>

    <!-- Dropdown -->
    <div class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-40 overflow-auto hidden">
        <input type="text" placeholder="Search..." class="w-full h-8 px-3 mb-1 text-xs border-b border-gray-200 focus:outline-none"
               oninput="filterOptions('{{ $id }}', this.value)">

        <ul class="list-none p-0 m-0">
            @foreach($options as $key => $value)
            <li class="px-3 py-2 text-xs cursor-pointer hover:bg-gray-100"
                onclick="selectOption('{{ $id }}', '{{ $key }}', '{{ $value }}', '{{ $model }}')">
                {{ $value }}
            </li>
        @endforeach
        
        </ul>
    </div>

    <!-- Hidden input bound to Livewire -->
    <input type="hidden" name="{{ $name }}" value="{{ $value ?? '' }}">
</div>

<script>
function toggleDropdown(id) {
    const dropdown = document.querySelector('#' + id + ' > div:nth-child(2)');
    dropdown.classList.toggle('hidden');
}

function selectOption(containerId, valueId, displayName, model) {
    const container = document.getElementById(containerId);
    const display = container.querySelector(`#${containerId}-display`);
    const hidden = container.querySelector('input[type="hidden"]');
    const dropdown = container.querySelector('div:nth-child(2)');

    display.textContent = displayName; // show name
    hidden.value = valueId; // store id in hidden input

    // Dispatch input event for Livewire
    hidden.dispatchEvent(new Event('input', { bubbles: true }));
    @this.set(model, valueId);

    dropdown.classList.add('hidden');
}


function filterOptions(id, search) {
    const container = document.getElementById(id);
    const items = container.querySelectorAll('ul li');
    items.forEach(li => {
        li.style.display = li.textContent.toLowerCase().includes(search.toLowerCase()) ? 'block' : 'none';
    });
}

// Close dropdown when clicking outside
document.addEventListener('click', function(e) {
    document.querySelectorAll('.main-div').forEach(container => {
        if (!container.contains(e.target)) {
            const dropdown = container.querySelector('div:nth-child(2)');
            if(dropdown) dropdown.classList.add('hidden');
        }
    });
});
</script>
