<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ViewProduct extends Component
{
    public $images = [];

    public $product;

    public function mount($id)
    {

        $this->product = Product::find($id);

        $this->images = $this->product->images->map(function ($img) {
            return [
                'name' => basename($img->path),
                'url' => asset('storage/'.$img->path),
            ];
        });

    }

    public function render()
    {
        return view('livewire.view-product');
    }
}
