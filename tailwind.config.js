/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      './src/**/*.{vue,js,ts,jsx,tsx}',
      './node_modules/flowbite/**/*.js'

  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('flowbite/plugin'),
  ],
}
