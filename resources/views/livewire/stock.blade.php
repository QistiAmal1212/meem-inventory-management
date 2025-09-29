<div class="p-6 bg-gray-50 min-h-screen font-sans">

    <x-toast-qisti />
  
    <x-confirm-delete 
        title="Padam Produk" 
        message="Adakah anda pasti mahu padam produk ini?" 
    />
  
  
  
     <!-- Main Card -->
     <div class="bg-white rounded-lg shadow-md border border-gray-200 px-4 w-full max-w-screen-xl mx-auto">
         <!-- Top Controls -->
         <div class="flex flex-wrap justify-between items-center gap-4 pt-4 mb-6">
             <!-- Search Input -->
        
            
            
             <div class="relative w-72">
                 <input
                     type="text"
                     placeholder="Search"
                      wire:model.live="search"
                     class="w-full h-10 pl-10 pr-4 text-sm text-gray-600 border border-gray-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400"
                 />
                 <div class="absolute left-3 top-2.5 text-gray-400">
                     <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                     </svg>
                 </div>
             </div>
             
  
             
             <div class="flex items-center gap-2">

              <div class="relative w-32 h-10">
                <select
                  class="select2 w-full h-full appearance-none bg-white rounded-md outline outline-1 outline-gray-200 text-gray-500 text-xs font-normal px-3 pr-8 leading-snug font-['Inter']"
                >
                  <option value="" disabled selected>All Stock</option>
                  <option value="cat1">All Stock</option>
                  <option value="cat2">Low Stock</option>
                </select>
              
                <!-- Custom Arrow -->
                <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2">
                  <svg
                    class="w-4 h-4 text-gray-500"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
              


              <div class="relative w-32 h-10">
                <select
                  class="select2 w-full h-full appearance-none bg-white rounded-md outline outline-1 outline-gray-200 text-gray-500 text-xs font-normal px-3 pr-8 leading-snug font-['Inter']"
                >
                  <option value="" disabled selected>Category</option>
                  <option value="cat1">Category 1</option>
                  <option value="cat2">Category 2</option>
                  <option value="cat3">Category 3</option>
                </select>
              
                <!-- Custom Arrow -->
                <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2">
                  <svg
                    class="w-4 h-4 text-gray-500"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
              
                 <!-- Buttons -->
                 <a href="{{ route('product.export.pdf') }}" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                  <image src="{{ asset("images/pdf.svg") }}"/>
                 </a>
                 <a href="{{ route('product.export') }}"
                 class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                  <img src="{{ asset('images/excel-export.svg') }}" alt="Excel"/>
                 </a>
              <button
                  class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-100">
                  <img src="{{ asset('images/import-data.svg') }}" alt="Import"/>
              </button>
             </div>
  
    
         </div>
           
  
  
  
         <div class="min-h-[600px]">
             <div class="overflow-x-auto w-full">
              <table class="w-full border border-gray-200 rounded-lg ">
                <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase">
                  <tr>
                    <th class="px-4 py-4 text-left">
                      <input type="checkbox" class="w-4 h-4 border-gray-600 rounded-sm">
                    </th>   
                    <th class="px-4 py-4 text-left">Product Name</th>  
                     <th class="px-4 py-4 text-left">Category</th>
                    <th class="px-4 py-4 text-left">Sku</th>
                    <th class="px-4 py-4 text-left">Metal</th>
                    <th class="px-4 py-4 text-left">Total Qty</th>
                    <th class="px-4 py-4 text-left">Minimum Qty</th>
                    <th class="px-4 py-4 text-left">Actions</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-600"> 
                @foreach($stocks as $stock)
                  <tr class="hover:bg-gray-50">
                    <td class="px-4 py-4">
                      <input type="checkbox" class="w-4 h-4 border-gray-600 rounded-sm">
                    </td> 
                    <td class="px-4 py-4 flex items-center gap-2">
                      <div class="w-6 h-6 rounded bg-zinc-300"></div>
                      <span class="text-xs">{{$stock->product->name}}</span>
                    </td>
                    <td class="px-4 py-4">{{$stock->product->category->name}}</td>
                    <td class="px-4 py-4">{{$stock->product->sku}}</td>
                    <td class="px-4 py-4">{{$stock->product->metal->name}}</td>
                    <td class="px-4 py-4 text-center">
                        {{$stock->quantity}}
                    </td>
                    <td class="px-4 py-4 text-center">
                      {{$stock->min_quantity}}
                    </td>
                  
                    {{-- <td class="px-4 py-4">{{$stock->createdUser->name}}</td> --}}
                    <td class="px-4 py-4 flex gap-2">
                      <button class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white"
                       onclick="window.location.href='{{ route('view.product', $stock->id) }}'"
                      >
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.00028 2.64038C9.55923 2.64044 11.0832 3.10345 12.3788 3.97057C13.5934 4.7835 14.5562 5.9173 15.1615 7.24334L15.278 7.51161L15.2865 7.53385C15.3842 7.7971 15.3965 8.08339 15.3232 8.35239L15.2865 8.46623C15.2838 8.47366 15.281 8.48117 15.278 8.48847C14.6836 9.92977 13.6744 11.1624 12.3788 12.0296C11.1642 12.8425 9.74878 13.2997 8.29206 13.3538L8.00028 13.3597C6.44117 13.3597 4.91672 12.8967 3.62105 12.0296C2.40632 11.2165 1.4437 10.0823 0.838324 8.75607L0.721858 8.48847C0.718836 8.48117 0.71611 8.47366 0.713349 8.46623C0.601716 8.16546 0.601754 7.83468 0.713349 7.53385L0.721858 7.51161C1.31627 6.07035 2.32544 4.83774 3.62105 3.97057C4.91672 3.10339 6.44117 2.64038 8.00028 2.64038ZM8.00028 3.98038C6.70657 3.98038 5.44143 4.36461 4.36629 5.08418C3.29802 5.79922 2.46467 6.81347 1.97026 7.9997C2.46466 9.18614 3.29785 10.2008 4.36629 10.9159C5.44143 11.6355 6.70657 12.0197 8.00028 12.0197L8.24235 12.0151C9.45109 11.9703 10.6257 11.5905 11.6336 10.9159C12.7019 10.2009 13.5345 9.18607 14.0289 7.9997C13.5345 6.8136 12.7018 5.79917 11.6336 5.08418C10.5585 4.36467 9.29385 3.98044 8.00028 3.98038Z" fill="#6B7280"/>
                              <path d="M9.33995 8.00007C9.33995 7.25999 8.74003 6.66007 7.99995 6.66007C7.25986 6.66007 6.65995 7.25999 6.65995 8.00007C6.65995 8.74015 7.25986 9.34007 7.99995 9.34007C8.74003 9.34007 9.33995 8.74015 9.33995 8.00007ZM10.6799 8.00007C10.6799 9.48017 9.48004 10.6801 7.99995 10.6801C6.51982 10.6801 5.31995 9.48017 5.31995 8.00007C5.31995 6.51994 6.51982 5.32007 7.99995 5.32007C9.48004 5.32007 10.6799 6.51994 10.6799 8.00007Z" fill="#6B7280"/>
                          </svg>
                      </button>
                      <button class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white"
                      onclick="window.location.href='{{ route('edit.product', $stock->id) }}'"
                      >
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_166_19014)">
                              <path d="M14.03 3.18859C14.03 2.86539 13.9013 2.55545 13.6728 2.32688C13.4443 2.09842 13.1348 1.96977 12.8117 1.96964C12.4886 1.9696 12.1779 2.09725 11.9494 2.32558L11.95 2.32623L3.00707 11.2711C2.92937 11.3486 2.87175 11.4442 2.83957 11.5492L2.13686 13.8615L4.45307 13.1594L4.52962 13.1313C4.60445 13.0981 4.67285 13.0514 4.73114 12.9932L13.6728 4.0503L13.7539 3.96066C13.9316 3.74389 14.03 3.4713 14.03 3.18859ZM15.37 3.18859C15.3699 3.82483 15.133 4.4368 14.7079 4.90612L14.6202 4.99772L5.67726 13.942C5.44429 14.1742 5.15774 14.3461 4.84303 14.4419L1.92618 15.3265L1.92421 15.3271C1.75061 15.3793 1.5661 15.383 1.39031 15.3389C1.21447 15.2947 1.05345 15.2039 0.925102 15.0758C0.79671 14.9477 0.705282 14.7865 0.660767 14.6107C0.616336 14.4349 0.620028 14.2505 0.671889 14.0767L0.673196 14.0741L1.55781 11.1579L1.55846 11.156L1.59837 11.0395C1.68487 10.8089 1.81315 10.5963 1.97656 10.412L2.06096 10.3217L11.0019 1.37881L11.0942 1.29113C11.5636 0.866263 12.1755 0.629558 12.8117 0.629639C13.4902 0.629764 14.1411 0.899596 14.6208 1.37946C15.1005 1.85934 15.3701 2.51008 15.37 3.18859Z" fill="#6B7280"/>
                              <path d="M9.51634 2.85629C9.76163 2.61099 10.1496 2.59585 10.4127 2.81049L10.4637 2.85629L13.1437 5.53629L13.1896 5.58732C13.4042 5.85048 13.389 6.23841 13.1437 6.48371C12.8984 6.72898 12.5105 6.74412 12.2473 6.52951L12.1963 6.48371L9.51634 3.80371L9.47052 3.75267C9.25591 3.48952 9.27099 3.10159 9.51634 2.85629Z" fill="#6B7280"/>
                              </g>
                              <defs>
                              <clipPath id="clip0_166_19014">
                              <rect width="16" height="16" fill="white"/>
                              </clipPath>
                              </defs>
                          </svg>
                              
                      </button>
                      <button class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white"
                      onclick="window.location.href='{{ route('edit.product', $stock->id) }}'"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                      </svg>
                      
                      </button>
                   
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div class="mt-4 mb-4">
                  {{ $stocks->links() }}
              </div>
            </div>
          </div>
  
     </div>
  </div>
  
  
  