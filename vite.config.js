import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    base: './',
    server: {
        https: true,
        host: true,
        hmr: {
            host: 'anymore-suit-maternity-rational.trycloudflare.com',
            protocol: 'wss',
        },
    },
});
