<?php

namespace App\Livewire\ProductStock;

use Livewire\Attributes\On;
use Livewire\Component;

class StockOut extends Component
{
    public bool $showModal = false;
    public $productId;
    #[On('stock-out-form')] 
    public function openModal($productId)
    {
      $this->productId = $productId;
      $this->showModal = true;
    }
    public function render()
    {
        return view('livewire.product-stock.stock-out');
    }
}
