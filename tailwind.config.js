/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // Backgrounds colors
        bgPrimary: 'rgb(186, 103, 181, .1)',
        bgSecondary: 'rgb(1, 40, 154, .1)',
      },
    }
  },
  plugins: [],
}

