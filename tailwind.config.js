import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            width: {
                'pokemon': '193px',
              },
            height: {
                'pokemon': '140px',
              },
            fontSize: {
                'xxs': '0.65rem',  // 10.4px if 1rem = 16px
                'tiny': '0.5rem'   // 8px if 1rem = 16px
            },
            aspectRatio: {
                'custom': '90 / 126.5',
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                custom: ['GillSans-Bold', 'sans-serif'],
            },
            textShadow: {
                'outline': '1px 1px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000',
                'subtle-outline': '0.5px 0.5px 0 #000, -0.5px -0.5px 0 #000, 0.5px -0.5px 0 #000, -0.5px 0.5px 0 #000',
              }
        },
    },

    plugins: [forms, aspectRatio,require('tailwindcss-textshadow')],
};
