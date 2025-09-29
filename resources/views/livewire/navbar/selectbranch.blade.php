<?php

use App\Models\References\Branch;
use App\Events\BranchSelected;
use Livewire\Volt\Component;

new class extends Component
{
    public ?int $selectedBranchId = null;
    public ?string $selectedBranchName = null;
    public $branches = [];

    public function mount()
    {

        $this->branches = Branch::get(['id', 'name']);
        $first = $this->branches->first();
        $this->selectedBranchId = session('branch_id', $first?->id);
        // $this->selectedBranchId = $first?->id;
    }

    public function updatedSelectedBranchId($value)
    {
        $branch = Branch::find($value);
        // $this->selectedBranchName = $branch?->name;

        // Optional: fire event
        event(new BranchSelected($value));
    }
};
?>
<!-- View -->
<div class="relative" id="branchDropdown">
    <!-- Dropdown Button -->
    <button id="branchButton" class="inline-flex items-center gap-2 py-2 px-3 bg-white text-gray-800 text-sm font-semibold rounded-md border border-gray-200">
        <img src='{{ asset("images/dropdownlogo.png") }}' alt="Dropdown" class="w-[20px]" />
        <span id="branchButtonText">
            {{ $branches->firstWhere('id', $selectedBranchId)?->name ?? 'Pilih Cawangan' }}
        </span>
        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 8l4 4 4-4" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div id="branchMenu" class="absolute z-10 mt-2 w-56 max-h-80 overflow-hidden rounded-md shadow-lg bg-white border border-gray-200 hidden">
        <!-- Search Input -->
        <div class="p-2 border-b border-gray-200">
            <input type="text" id="branchSearch" placeholder="Cari cawangan..."
                class="w-full px-3 py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-amber-400 focus:border-amber-400 placeholder-gray-400" />
        </div>

        <!-- Options List -->
        <div id="branchList" class="max-h-56 overflow-y-auto py-1">
            @foreach($branches as $branch)
                <a href="#" class="branch-option block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                   data-id="{{ $branch->id }}">
                   {{ $branch->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById('branchDropdown');
    const button = document.getElementById('branchButton');
    const menu = document.getElementById('branchMenu');
    const searchInput = document.getElementById('branchSearch');
    const list = document.getElementById('branchList');
    const buttonText = document.getElementById('branchButtonText');

    // Toggle menu
    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    // Filter options
    searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase();
        list.querySelectorAll('.branch-option').forEach(option => {
            const text = option.textContent.toLowerCase();
            option.style.display = text.includes(filter) ? 'block' : 'none';
        });
    });

    // Select option
    list.querySelectorAll('.branch-option').forEach(option => {
        option.addEventListener('click', (e) => {
            e.preventDefault();
            const id = option.dataset.id;
            const name = option.textContent;

            // Update button text immediately
            buttonText.textContent = name;

            // Update Livewire property
            if (window.Livewire) {
                @this.set('selectedBranchId', id);
            }

            // Close menu
            menu.classList.add('hidden');
        });
    });
});
</script>
