<?php

namespace App\Livewire;

use App\Models\ProductStock;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class Stock extends Component
{
    use WithPagination;

    public $search = '';

    // Reset pagination when search text changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $stocks = ProductStock::query()
        // ->when($this->search, function ($query) {
        //     $query->where('name', 'like', '%'.$this->search.'%')
        //           ->orWhere('sku', 'like', '%'.$this->search.'%')
        //           ->orWhereHas('metal', function ($q) {
        //               $q->where('name', 'like', '%'.$this->search.'%');
        //           });
        // })
            ->paginate(10);

        return view('livewire.stock', [
            'stocks' => $stocks,
        ]);
    }
}
