<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class EditProduct extends Component
{
    public $product;

    public $removeFile = [];

    public $categories = [];

    public $metals = [];

    public $grades = [];

    public $selectedCategory;

    public $selectedMetal;

    public $selectedGrade;

    public $name;

    public $reference;

    public $weight;

    public $description;

    public $images = [];

    public $modalOpen = false;

    public $modalType;

    public $newValue;

    // validation error messages
    public $modalMessage = [];

    public $showModal = false;

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->reference = $this->product->sku;
        $this->weight = $this->product->numericWeight;
        $this->description = $this->product->description;
        $this->selectedCategory = $this->product->category_id;
        $this->selectedMetal = $this->product->metal_id;
        $this->selectedGrade = $this->product->grade_id;
        $this->categories = ProductCategory::pluck('name', 'id')->take('8')->toArray();
        $this->metals = ProductMetal::pluck('name', 'id')->toArray();
        $this->grades = ProductGrade::pluck('grade', 'id')->toArray();
        $this->images = $this->product->images->pluck('path')->map(function ($url) {
            return ['url' => asset('storage/'.$url), 'existing' => true];
        })->toArray();

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

    public function removeExistingImage($index)
    {
        if (isset($this->images[$index]) && ($this->images[$index]['existing'] ?? false)) {
            $imagePath = Str::after(parse_url($this->images[$index]['url'], PHP_URL_PATH), '/storage/');
            $this->removeFile[] = $imagePath;
            array_splice($this->images, $index, 1);
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
            $this->product->Update([
                'name' => $this->name,
                'sku' => $this->reference,
                'category_id' => $this->selectedCategory,
                'metal_id' => $this->selectedMetal,
                'grade_id' => $this->selectedGrade,
                'weight' => $this->weight,
                'description' => $this->description,
            ]);

            // delete images
            foreach ($this->removeFile as $path) {
                ProductImage::where('path', $path)->delete();
                Storage::disk('public')->delete($path);
            }

            // store new images
            foreach ($this->images as $image) {
                if (! empty($image['url']) && str_contains($image['url'], ',')) {
                    [$meta, $content] = explode(',', $image['url'], 2);

                    // extract mime type → extension
                    preg_match('/data:image\/(\w+);base64/', $meta, $matches);
                    $ext = $matches[1];

                    $filename = uniqid('', true).'.'.$ext;
                    $path = "products/$filename";

                    Storage::disk('public')->put($path, base64_decode($content));

                    $this->product->images()->create(['path' => $path]);
                }
            }
            session()->flash('toast', ['type' => 'success', 'message' => 'Product Update successfully!', 'description' => 'The product has been permanently update to the database.',
            ]);

            return redirect()->route('product', $this->product->id);

        } catch (ValidationException $e) {
            $this->modalMessage = $e->errors();
            $this->showModal = true;

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-product');
    }
}
