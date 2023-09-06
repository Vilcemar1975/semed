import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.js',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {

        container: {
            center: true,
          },

        screens: {
            sm: '480px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
          },

        extend: {

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

          colors: {
            'branco': '#fff',
            'vermelho': '#e31823',
            'azul': '#76a8fc',
            'azul-100': '#075AA9',
            'azul-400': '#ebf2fc',
            'azul-500': '#043f75',
          },

          boxShadow: {
            '3xl': '0 8px 10px rgba(0, 0, 0, 0.4)',
          }
        },


    },

    plugins: [forms, typography, require('flowbite/plugin')],
};
