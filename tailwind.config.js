/** @type {import('tailwindcss').Config} */
module.exports = {
  mode : "jit",
  content: ["index.html","./view/**/*.{html,js,php}","admin/**/*.{html,php,js}"],
  theme: {
    extend: {
      fontFamily: {
        'roboto': ['Roboto', 'sans-serif'],
      },
      colors:{
       'input-footer': 'rgba(255, 255, 255, 0.25)' ,
      
        
       
      },
      boxShadow: {
        'item': '0 2px 10px rgba(0,0,0,0.2)',
        'itemHover': '2px 4px 20px rgba(0,0,0,0.5)',
        'mysd': '5px 5px 0px #ff5252'
      }
    },
  },
  plugins: [],
}