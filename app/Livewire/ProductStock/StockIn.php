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
    public $productList = [];
    public $categoryList = [];
    public $categorySelected;
    public $productSelected;
    public $images;
    public $remark;
    public $quantity;

    #[On('stock-in-form')] 
    public function openModal($productId)
    {
    
      $this->showModal = true; 

      if($productId)
      {
       $this->productId = $productId;
       $this->product = Product::find($productId);
      }

    }

    public function save()
    {
     dd('bitch');
    }



    public function render()
    {
        $this->productList = Product::pluck('name', 'id')->toArray();
        $this->categoryList = ['1' => 'Restock','2' => 'Stock Out', '3' => 'Sales'];
        
        return view('livewire.product-stock.stock-in');
    }
}
