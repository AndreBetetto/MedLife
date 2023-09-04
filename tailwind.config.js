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
                'verde': {
                    '1': '#008000',
                    '2': '#32cd32',
                    '3': '#63b76C',
                },

                'amarelo':{
                    '1': '#fafa37',
                    '2': '#ffef00',
                },

                'laranja':{
                    '1': '#f9a601',
                    '2': '#ff7417',
                },

                'vermelho':{
                    '1':'#c13617',
                    '2': '#d72009',
                    '3': '#e80700',
                },

                footerDark:{
                    0: '#391C60',
                },
            },
            gridTemplateColumns: {
                '16': 'repeat(16, minmax(0, 1fr))',
                'table': '100px 500px 398px 120px',
                'large-table': '100px 300px 250px 120px 200px 50px 99px',
                'small-table': '100px 175px 175px 200px 150px 100px 220px'
              }
        },
    },
    
    important: true,  

    plugins: [
        require('autoprefixer'),
        forms,
        require("tw-elements/dist/plugin.cjs")
    ],
};
