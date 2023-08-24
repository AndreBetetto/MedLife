import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/tw-elements/dist/js/**/*.js'
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                footerDark:{
                    0: '#391C60',
                },
            },
            gridTemplateColumns: {
                '16': 'repeat(16, minmax(0, 1fr))',
                'table': '50px 300px 250px 120px 200px 200px',
                'large-table': '50px 300px 250px 120px 200px 100px 99px',
                'small-table': '50px 175px 175px 200px 150px 150px 220px'
              }
        },
    },
    
    important: true,  

    plugins: [
        forms,
        require("tw-elements/dist/plugin.cjs")
    ],
};
