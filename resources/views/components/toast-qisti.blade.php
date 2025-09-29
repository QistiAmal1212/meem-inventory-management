<div 
x-cloak

    x-data="{ show: false, type: '', message: '', description: '' }" 
    x-on:toast.window="
        type = $event.detail.type; 
        message = $event.detail.message; 
        description = $event.detail.description || ''; 
        show = true; 
        setTimeout(() => show = false, 4000);
    " 
    class="fixed top-4 right-4 z-[9999] space-y-2"
>
  <!-- Toast -->
  <div x-show="show" 
       x-transition.opacity.duration.300ms 
       :class="type === 'success' 
                ? 'flex items-start w-full max-w-sm p-4 mb-4 bg-white rounded-lg shadow-md border border-green-100' 
                : 'flex items-start w-full max-w-sm p-4 mb-4 bg-white rounded-lg shadow-md border border-red-100'"
       role="alert">
      
      <!-- Icon -->
      <div class="flex-shrink-0 mt-0.5">
          <svg x-show="type === 'success'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          <svg x-show="type === 'danger'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
      </div>
      
      <!-- Text Content -->
      <div class="ms-3">
          <div class="text-sm font-medium text-gray-900" x-text="message"></div>
          <div class="text-xs text-gray-500 mt-1" x-show="description" x-text="description"></div>
      </div>
      
      <!-- Close Button -->
      <button @click="show = false" class="ms-auto text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
      </button>
  </div>
</div>

@if (session()->has('toast'))
    <script>
        document.addEventListener("DOMContentLoaded", () => { 
            setTimeout(() => {
                window.dispatchEvent(new CustomEvent("toast", { 
                    detail: @json(session('toast'))
                }));
            }, 50); // give Alpine some time to hook the listener
        });
    </script>
@endif
