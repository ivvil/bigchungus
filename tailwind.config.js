import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto Condensed', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blue': '#00429E',
                'green': '#00794C',
                'red': '#9D312B',
                'yellow': '#FFC200',
            },
        },
    },

    plugins: [forms],
};
