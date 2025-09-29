<div class="max-w-7xl mx-auto bg-white rounded-xl shadow-sm p-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
  
      <div 
      x-data="{
          images: @js($images),
          current: 0
      }"
      class="bg-gray-50 rounded-lg p-4 flex flex-col items-center justify-center"
  >
      <!-- Image Preview -->
      <div class="w-full h-72 bg-gray-100 rounded-md flex items-center justify-center overflow-hidden">
          <template x-if="images.length">
              <img 
                  :src="images[current].url" 
                  :alt="images[current].name" 
                  class="object-contain h-full"
              >
          </template>
          <template x-if="!images.length">
              <span class="text-gray-400 text-sm">Preview area</span>
          </template>
      </div>
  
      <!-- Controls -->
      <div class="flex items-center justify-between w-full mt-4">
          <!-- Left arrow -->
          <button 
              @click="if (current > 0) current--; else current = images.length - 1"
              class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded-full text-gray-600 hover:bg-gray-200"
          >
              ←
          </button>
  
          <!-- Filename -->
          <div class="text-gray-700 text-sm text-center" x-show="images.length">
              {{-- <div class="font-medium" x-text="images[current].name"></div> --}}
          </div>
  
          <!-- Right arrow -->
          <button 
              @click="if (current < images.length - 1) current++; else current = 0"
              class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded-full text-gray-600 hover:bg-gray-200"
          >
              →
          </button>
      </div>
  </div>
  
    
  
      <!-- Product Details -->
      <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
        <dl class="divide-y divide-gray-200">
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Product</dt>
            <dd class="col-span-2 text-sm text-gray-800">{{ $product->name }} </dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Category</dt>
            <dd class="col-span-2 text-sm text-gray-800">{{$product->category->name}}</dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Metal</dt>
            <dd class="col-span-2 text-sm text-gray-800">{{ $product->metal->name }}</dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Grade</dt>
            <dd class="col-span-2 text-sm text-gray-800">{{ $product->grade->grade }}</dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Weight</dt>
            <dd class="col-span-2 text-sm text-gray-800">{{ $product->weight }}</dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">SKU</dt>
            <dd class="col-span-2 text-sm text-gray-800">{{ $product->sku }}</dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Total Quantity</dt>
            <dd class="col-span-2 text-sm text-gray-800"> {{ $product->productStock->sum('min_quantity') }}</dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Status</dt>
            <dd class="col-span-2 text-sm text-green-600 font-medium">{!! $product->status_badge !!}
            </dd>
          </div>
  
          <div class="px-4 py-3 grid grid-cols-3 gap-4">
            <dt class="text-sm font-semibold text-gray-600">Description</dt>
            <dd class="col-span-2 text-sm text-gray-700 leading-relaxed">
            {{$product->description ?? '-'}}
            </dd>
          </div>
  
        </dl>
      </div>
  
    </div>
  </div>
  