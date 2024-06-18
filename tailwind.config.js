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
        bgPrimary: 'rgb(200, 200, 253)',
        bgSecondary: 'rgb(248, 249, 253)',

        // Flaschards
        fcColor: 'rgb(251, 242, 247)',

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

