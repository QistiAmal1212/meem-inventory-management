<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

#[Layout('components.layouts.app')]
class EditProduct extends Component
{
    public $product;

   public $removeLater = [];

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

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->reference = $this->product->sku;
        $this->weight = $this->product->numericWeight;
        $this->description = $this->product->description;
        $this->category_id = $this->product->category_id;
        $this->metal_id = $this->product->metal_id;
        $this->grade_id = $this->product->grade_id;
        $this->categories = ProductCategory::pluck('name', 'id')->take('8')->toArray();
        $this->metals = ProductMetal::pluck('name', 'id')->toArray();
        $this->grades = ProductGrade::pluck('grade', 'id')->toArray();

        if ($this->product) {
            // Push existing images from DB as URLs
            $this->images = $this->product->images->pluck('path')->map(function ($url) {
                return ['url' => asset('storage/'.$url), 'existing' => true];
            })->toArray();
        }
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

        $this->dispatch('reinit-select2');
    }

 

    public function removeExistingImage($index)
    {
        if (isset($this->images[$index]) && ($this->images[$index]['existing'] ?? false)) {
            $imagePath = Str::after(parse_url($this->images[$index]['url'], PHP_URL_PATH), '/storage/');
    
            // Mark this image for deletion later
            $this->removeLater[] = $imagePath;
    
            // Just remove from the Livewire array (preview/UI)
            array_splice($this->images, $index, 1);
        }
    }
    


    public function submit()
    {
     
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                // 'images.*' => 'image|max:5120', // validate each image (optional)
            ]);

    
            // Save to DB
            $product = Product::create([
                'name' => $this->name,
                'sku' => $this->reference,
                'category_id' => $this->category_id,
                'metal_id' => $this->metal_id,
                'grade_id' => $this->grade_id,
                'weight' => $this->weight,
                'description' => $this->description,
                'created_user_id' => auth()->id(),
            ]);

            // delete images marked for removal
            foreach ($this->removeLater as $path) {
                ProductImage::where('path', $path)->delete();
                Storage::disk('public')->delete($path);
            }

            foreach ($this->images as $image) {
                if (!empty($image['url']) && str_contains($image['url'], ',')) {
                    [$meta, $content] = explode(',', $image['url'], 2);
            
                    // extract mime type → extension
                    preg_match('/data:image\/(\w+);base64/', $meta, $matches);
                    $ext = $matches[1] ?? 'png'; 
            
                    $filename = uniqid('', true) . '.' . $ext;
                    $path = "products/$filename";
            
                    Storage::disk('public')->put($path, base64_decode($content));
            
                    $product->images()->create(['path' => $path]);
                }
            }
            

    
            // Reset form
            // $this->reset(['name', 'reference', 'category_id', 'metal_id', 'grade_id', 'weight', 'description', 'images']);
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'Product Update successfully!',
                'description' => 'The product has been permanently update to the database.'
            ]);
    
            return redirect()->route('product', $product->id);
        
        } catch (\Exception $e) {
            // Log error for debugging
         dd($e->getMessage());
    
          
        }
    }
    public function render()
    {
        return view('livewire.edit-product');
    }
}
