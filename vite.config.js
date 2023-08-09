import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/scss/style.scss',
            'resources/js/app.js',
        ]),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
