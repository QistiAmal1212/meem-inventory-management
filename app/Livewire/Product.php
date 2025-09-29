<?php

namespace App\Livewire;

use App\Models\Product as ModelsProduct;
use App\Models\References\ProductCategory;
use App\Models\References\ProductMetal;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class Product extends Component 
{
    use WithPagination;

    public $search = '';
    public $CategoryList = [];
    public $MetalList = [];
    public $selectedCategory = null;
    public $selectedMetal = null;



    public function mount()
    {
        $this->CategoryList = ProductCategory::pluck('name', 'id')->toArray();
        $this->MetalList = ProductMetal::pluck('name', 'id')->toArray();

    }

    // Reset pagination when search text changes
    public function updatingSearch()
    {
      $this->resetPage();
    }
    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatingSelectedMetal()
    {
        $this->resetPage();
    }


    public function delete($id)
    {
        $product = ModelsProduct::find($id);
        if ($product) {
            $product->delete();
            $this->dispatch('toast', type: 'success', message: 'Product deleted successfully!', description: 'The product has been permanently removed from the database.');

        } else {
            $this->dispatch('toast', type: 'danger', message: 'Product not found.');
        }
    }
    

    public function render()
    {

        $products = ModelsProduct::query()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('sku', 'like', '%'.$this->search.'%')
                  ->orWhereHas('metal', function ($q) {
                      $q->where('name', 'like', '%'.$this->search.'%');
                  })
                  ->orWhereHas('category', function ($q) {
                    $q->where('name', 'like', '%'.$this->search.'%');
                });
        })
        ->when($this->selectedCategory, function ($query) {
            $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->selectedMetal, function ($query) {
                $query->where('metal_id', $this->selectedMetal);
                })
        ->paginate(7);

        return view('livewire.product', [
            'products' => $products,
        ]);
    }
}
