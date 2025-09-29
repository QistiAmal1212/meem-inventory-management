<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
class CreateProduct extends Component
{
    use WithFileUploads;

    public $categories = [];

    public $metals = [];

    public $grades = [];

    public $category_id;

    public $metal_id;

    public $grade_id;

    public $name;

    public $reference;

    public $weight;

    public $description;

    public $images = [];

    public $modalOpen = false;

    public $modalType;

    public $newValue;

    public $selectedCategory = null;

    public $selectedMetal = null;

    public $selectedGrade = null;

    // validation error messages
    public $modalMessage = [];

    public $showModal = false;

    public function mount()
    {
        $this->categories = ProductCategory::pluck('name', 'id')->take('8')->toArray();
        $this->metals = ProductMetal::pluck('name', 'id')->toArray();
        $this->grades = ProductGrade::pluck('grade', 'id')->toArray();
    }

    public function addOption($type, $value)
    {
        if ($type === 'Category') {
            $this->categories[] = $value;
        } elseif ($type === 'Metal') {

            $this->metals[] = $value;
        } elseif ($type === 'Grade') {
            $this->grades[] = $value;
        }
    }

    public function submit()
    {

        try {

            $this->validate([
                'name' => 'required|string|max:255|unique:products,name',
                'reference' => 'required|string|max:255|unique:products,sku',
            ]);

            // Save to DB
            $product = Product::create([
                'name' => $this->name,
                'sku' => $this->reference,
                'category_id' => $this->selectedCategory,
                'metal_id' => $this->selectedMetal,
                'grade_id' => $this->selectedGrade,
                'weight' => $this->weight,
                'description' => $this->description,
                'created_user_id' => auth()->id(),
            ]);

            foreach ($this->images as $image) {
                if (! empty($image['url']) && str_contains($image['url'], ',')) {
                    [$meta, $content] = explode(',', $image['url'], 2);

                    // extract mime type → extension
                    preg_match('/data:image\/(\w+);base64/', $meta, $matches);
                    $ext = $matches[1] ?? 'png';

                    $filename = uniqid('', true).'.'.$ext;
                    $path = "products/$filename";

                    Storage::disk('public')->put($path, base64_decode($content));

                    $product->images()->create(['path' => $path]);
                }
            }

            session()->flash('toast', ['type' => 'success', 'message' => 'Product added successfully!', 'description' => 'The product has been permanently saved to the database.']);

            return redirect()->route('product', $product->id);

        } catch (ValidationException $e) {
            $this->modalMessage = $e->errors();
            $this->showModal = true;

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
