import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

/** @type {import('vite').UserConfig} */
export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        },
    },

    plugins: [
        laravel([
                'resources/css/app.css',
                'resources/scss/style.scss',
                'resources/js/app.js',
            ]),
    ],
    define: {
        global: 'globalThis',
    },

    resolve: {
        alias: {
          "socket.io-client": "socket.io-client/dist/socket.io.js",
        },
      },

});
