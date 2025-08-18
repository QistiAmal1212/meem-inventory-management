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
<div>
    <div class="relative"
         x-data="{
             branchOpen: false,
             search: '',
             branches: @js($branches),
             selectedBranchId: @entangle('selectedBranchId').live
         }"
    >
        <button @click="branchOpen = !branchOpen"
            class="inline-flex items-center gap-2 py-2 px-3 bg-white text-gray-800 text-sm font-semibold rounded-md focus:outline-none border border-gray-300 shadow-sm"
        >
            <img src='{{ asset("images/dropdownlogo.png") }}' alt="Dropdown" class="w-[20px]" />
            <span x-text="branches.find(b => b.id == selectedBranchId)?.name || 'Pilih Cawangan'"></span>
            <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 8l4 4 4-4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <div x-show="branchOpen" @click.away="branchOpen = false" x-transition
             class="absolute z-10 mt-2 w-56 max-h-80 overflow-hidden rounded-md shadow-lg bg-white ring-opacity-5 focus:outline-none"
        >
            <div class="p-2 border border-gray-200">
                <input type="text" x-model="search" placeholder="Cari cawangan..."
                    class="w-full px-3 py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-amber-400 focus:border-amber-400 placeholder-gray-400" />
            </div>
            <div class="max-h-56 overflow-y-auto py-1" role="none">
                <template x-for="branch in branches.filter(b => b.name.toLowerCase().includes(search.toLowerCase()))" :key="branch.id">
                    <a href="#"
                       @click.prevent="
                           selectedBranchId = branch.id;
                           branchOpen = false;
                       "
                       class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                       x-text="branch.name"
                       role="menuitem"
                    ></a>
                </template>
            </div>
        </div>
    </div>
</div>
