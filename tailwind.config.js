// tailwind.config.js
export default {
    darkMode: false, 
    theme: {
      extend: {},
    },
    presets: [
      require("./vendor/power-components/livewire-powergrid/tailwind.config.js"), 
  ],
    plugins: [],
    content: [
    
      './app/Livewire/**/*Table.php',
      './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
      './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
  ]
  }
  