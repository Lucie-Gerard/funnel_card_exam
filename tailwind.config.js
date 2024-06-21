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
        bgPrimary: 'rgb(213, 235, 255)',
        bgSecondary: 'rgb(255, 253, 253)',

        // Flaschards and inputs background
        fcColor: 'rgb(246, 251, 255)',
        bgInput2: 'rgb(246, 251, 255)',

        // Text color
        txtColor: 'rgb(0, 10, 12)',

        // Autre
        primary: 'rgb(1, 40, 154)',
        stroke: 'rgb(1, 40, 154, .2)',
      },
      
      fontFamily: {
        tillana: ['tillana'],
        raleway: ['raleway'],
      }
    }
  },
  plugins: [],
}

