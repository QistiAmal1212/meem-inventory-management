<?php

namespace App\Livewire;

use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Laravel\Prompts\textarea;

#[Layout('components.layouts.app')] 
class CreateProduct extends Component
{
    use WithFileUploads;

    public $categories = [];
    public $metals = [];
    public $greds = [];

    public $category;
    public $metal;
    public $gred;

    public $name;
    public $reference;
    public $weight;
    public $description;
    public $images = [];

    public $modalOpen = false;
    public $modalType;
    public $newValue;

    public function mount()
    {
        $this->categories = ProductCategory::pluck('name', 'id')->take('8')->toArray();
        $this->metals = ProductMetal::pluck('name', 'id')->toArray();
        $this->greds = ProductGrade::pluck('grade', 'id')->toArray();
    }



    public function addOption($type, $value)
    {
        if ($type === 'Category') {
            $this->categories[] = $value;
        } elseif ($type === 'Metal') {
        
            $this->metals[] = $value; 
        } elseif ($type === 'Gred') {
            $this->greds[] = $value;
        }

        $this->dispatch('reinit-select2');
    }


    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'category_id' => 'required|string',
            'metal_id' => 'required|string',
            'gred_id' => 'required|string',
            'weight' => 'required|string',
            'description' => 'required|string|max:300',
        ]);

        // Store images
        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('products', 'public');
        }

        // Save to DB (example)
        Product::create([
            'name' => $this->name,
            'sku' => $this->sku,
            'category_id' => $this->category_id,
            'metal_id' => $this->metal_id,
            'gred_id' => $this->gred_id,
            'weight' => $this->weight,
            'description' => $this->description,
        ]);

        $this->reset(['name','reference','category','metal','gred','weight','description','images']);
        $this->dispatchBrowserEvent('notify', ['message' => 'Product added successfully!']);
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
