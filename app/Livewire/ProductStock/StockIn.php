<?php

namespace App\Livewire\ProductStock;

use App\Models\Product;
use App\Models\References\ProductGrade;
use Livewire\Attributes\On;
use Livewire\Component;

class StockIn extends Component
{
    public bool $showModal = false;
    public $productId;
    public $product;
    public $grades;

    #[On('stock-in-form')] 
    public function openModal($productId)
    {
      $this->productId = $productId;
      $this->showModal = true;
      $this->product = Product::find($productId);
    }

    public function render()
    {
        $this->grades = ProductGrade::pluck('grade', 'id')->toArray();
        return view('livewire.product-stock.stock-in');
    }
}
