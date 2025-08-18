<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout
        :heading="__('Appearance')"
        :subheading="__('Update the appearance settings for your account')"
    >
        <div
            x-data="appearanceSettings"
            x-init="init()"
            class="inline-flex items-center rounded-lg bg-gray-100  border p-1"
        >
            <template x-for="option in ['light' 'system']" :key="option">
                <button
                    @click="setMode(option)"
                    :class="[
                        'px-4 py-2 text-sm font-medium rounded-md transition',
                        mode === option
                            ? 'bg-yellow-400 text-white shadow'
                            : 'text-gray-600  hover:bg-gray-200 '
                    ]"
                    x-text="option.charAt(0).toUpperCase() + option.slice(1)"
                ></button>
            </template>
        </div>
    </x-settings.layout>
</section>

{{-- <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('appearanceSettings', () => ({
            mode: 'system',

            init() {
                this.mode = localStorage.getItem('appearance') || 'system';
                this.applyMode();
            },

            setMode(newMode) {
                this.mode = newMode;
                localStorage.setItem('appearance', newMode);
                this.applyMode();
            },

            applyMode() {
                document.documentElement.classList.remove('dark', 'light');

                if (this.mode === 'dark') {
                    document.documentElement.classList.add('light');
                } else if (this.mode === 'light') {
                    document.documentElement.classList.add('light');
                }
            }
        }));
    });
</script> --}}
