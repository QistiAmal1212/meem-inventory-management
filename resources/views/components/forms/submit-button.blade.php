@props([
    'text' => '',
])

<button type="button"
@click="submit()"
        class="w-32 h-9 bg-amber-500 rounded-md text-white text-sm font-normal font-['Inter'] leading-snug hover:bg-amber-600 transition">
  {{  $text }}
</button>