import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Kumbh Sans"', ...defaultTheme.fontFamily.sans],
                miriam: ['"Miriam Libre"', 'serif'],
                lavish: ['"Lavishly Yours"', 'cursive'],
                code: ['"Source Code Pro"', 'monospace'],
                work: ['"Work Sans"', 'sans-serif'],
                jost: ['"Jost"', 'sans-serif'],
                raleway: ['"Raleway"', 'sans-serif'],
                miriam: ['"Playwrite DE Grund"', 'serif'],
            },
        },
    },

    safelist: [
        {
            pattern: /(bg|text|border)-(gray|slate|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose)-(50|100|200|300|400|500|600|700|800|900)/,
        },
        {
            pattern: /(rounded|p|m|gap|w|h|text|font|shadow|border|flex|grid|col|row|justify|items|overflow|scroll|sticky|top|z|bg|inline|hidden|block|relative|absolute|fixed|left|right|bottom|inset|container|max-w|min-w|py|px|pt|pb|pl|pr|mt|mb|mx|my|space)-(.*)/,
        },
        'rounded-[50%]',
        'rounded-[20px]',
        'text-[13px]',
        'scroll-mt-[90px]',
        'py-[60px]',
        'px-[25px]',
    ],

    plugins: [forms, typography],
};
