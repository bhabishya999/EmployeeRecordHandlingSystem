const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            
                
                
            
            colors: {
                primary: "#4C51BF",
                danger: '#C53030',
                error: "#D93025",
                dark_green: "#04844B",
                dark_blue:"#718096",
                light_blue:"#EDF2F7",
                dark_gray:"#FBFBFB",
                dark_cyanblue:"#1A202C",
               
                light_green:"#4D966F",
                bordergray:"#E2E8F0",
                light_cyanblue:"#A0AEC0",
                light_iris:"#4A5568",
                dark_pink:" #BE4CB1"

            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
