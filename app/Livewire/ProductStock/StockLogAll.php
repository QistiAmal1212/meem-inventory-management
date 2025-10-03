<?php

namespace App\Livewire\ProductStock;

use App\Models\ProductInOut;
use Livewire\Attributes\On;
use Livewire\Component;

class StockLogAll extends Component
{
    public bool $showModal = false;
    public $page = 1;
    public $timelines = [];
    public $total = 0;

    #[On('stock-log-all')] 
    public function openModal()
    {
      $this->loadMore();
      $this->showModal = true;
    }


    public function loadMore()
    {
        $this->total = ProductInOut::where('branch_id', session('branch_id'))->count();

        $results = ProductInOut::where('branch_id', session('branch_id'))->latest()->paginate(3, ['*'], 'page', $this->page);
        
        
        $this->timelines = array_merge(
            $this->timelines,
            $results->items()
        );

        if ($results->hasMorePages()) {
            $this->page++;
        }

        // dd($this->page);
    }

    public function render()
    {
        return view('livewire.product-stock.stock-log-all');
    }
}
