import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            'oryn-ui-css': resolve(__dirname, '../resources/css/oryn-ui.css'),
            'oryn-ui-js': resolve(__dirname, '../resources/js/oryn-ui.js'),
            // Force alpinejs to resolve from docs-site's own node_modules
            // so the package's oryn-ui.js can share the same Alpine instance.
            'alpinejs': resolve(__dirname, 'node_modules/alpinejs'),
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
