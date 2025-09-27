import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Work Sans', ...defaultTheme.fontFamily.sans],
                miriam: ['"Miriam Libre"', 'serif'],
                lavish: ['"Lavishly Yours"', 'cursive'],
                code: ['"Source Code Pro"', 'monospace'],
            },
        },
    },

    plugins: [forms, typography],
};
