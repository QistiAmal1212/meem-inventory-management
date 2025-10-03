<?php

namespace App\Livewire;

use App\Imports\ProductsImport;
use App\Models\Product as ModelsProduct;
use App\Models\ProductStock;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use TallStackUi\Traits\Interactions;
use Prism\Prism\Prism;
use Prism\Prism\ValueObjects\ProviderTool;
use Prism\Prism\ValueObjects\Media\Image;
use Prism\Prism\Enums\Provider;

#[Layout('components.layouts.app')]
class Stock extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Interactions;

    public $file;
    public $search = '';

    public $CategoryList = [];

    public $MetalList = [];

    public $selectedCategory = null;

    public $selectedMetal = null;

    public $existingNames = [];

    public $existingSkus = [];
   
    public $categories;

    public $metals;

    public $grades;

    public $minQty;

    public $responseAi;
  
    #[On('branch-changed')]
    public function refreshOnBranchChanged()
    {
        $this->reset(); 
    }

    public function mount()
    {
        $this->CategoryList = ProductCategory::pluck('name', 'id')->toArray();
        $this->MetalList = ProductMetal::pluck('name', 'id')->toArray();
       $this->data();
    
    }

    public function data()
    {
        $this->existingNames = ModelsProduct::pluck('name')->map(fn($v) => strtolower(trim($v)))->toArray();
        $this->existingSkus  = ModelsProduct::pluck('sku')->map(fn($v) => strtolower(trim($v)))->toArray();

        // fetch reference table for validation
        $this->categories = ProductCategory::pluck('name')
        ->map(fn($v) => strtolower(trim($v)))
        ->toArray();
    
    $this->metals = ProductMetal::pluck('name')
        ->map(fn($v) => strtolower(trim($v)))
        ->toArray();
    
    $this->grades = ProductGrade::pluck('grade')
        ->map(fn($v) => strtolower(trim($v)))
        ->toArray();
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
            $this->data();
            $this->dispatch('toast', type: 'success', message: 'Product deleted successfully!', description: 'The product has been permanently removed from the database.');

        } else {
            $this->dispatch('toast', type: 'danger', message: 'Product not found.');
        }
    }

    public function bulkDelete($ids)
    {
      ModelsProduct::whereIn('id',$ids)->delete();
      $this->banner()
      ->leave(seconds: 2)
      ->success('Done!', 'Your data has been deleted!')
      ->send();
    }

    public function setMinimumQuantity($stockId, $minQty)
    {
        $stock = ProductStock::where('product_id', $stockId)->where('branch_id', session('branch_id'))->first();
        $stock->update([
            "min_quantity" => $minQty
        ]);
        $this->banner()
        ->leave(seconds: 2)
        ->success('Done!', 'Your data has been updated!')
        ->send();
    }

    public function uploadFile()
    {
        try {
    
            Excel::import(new ProductsImport, $this->file->getRealPath());
           
    $this->banner()
    ->leave(seconds: 2)
    ->success('Done!', 'Your data has been upload!')
    ->send();

            $this->file = null;
            $this->data();
            // return redirect()->route('products');
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
       
    }

    public function getAiSuggestion()
    {
      
        $test = Prism::text()
        ->using(Provider::Gemini, 'gemini-2.0-flash')
        ->withPrompt(
            'Anda adalah pakar pengurusan stok. Berdasarkan data dalam dokumen ini, sila analisis stok semasa dan berikan cadangan strategi pengurusan stok yang paling efektif. 
            Jawapan hendaklah ringkas, tidak lebih daripada 100 patah perkataan, dan disusun dalam bentuk **bullet points** supaya mudah dibaca.',
            [
                Image::fromUrl(url: 'https://batuoibbjnkscecpxiav.supabase.co/storage/v1/object/public/test/stock%20(2).pdf')
            ]
        )
        ->asText();
    
    return $test->text;
    
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
            ->withCount(['productStock as low_stock' => fn($q) => $q->whereColumn('quantity', '<', 'min_quantity')])
            // Add this: prioritize out of stock first
            ->orderByRaw('(SELECT SUM(quantity) FROM product_stocks WHERE product_stocks.product_id = products.id) = 0 DESC')
            ->orderByDesc('low_stock') 
            ->orderByDesc('low_stock') 
            ->paginate(7);

        return view('livewire.stock', [
            'products' => $products,
        ]);
    }
}
