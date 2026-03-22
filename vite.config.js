import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    build: {
        lib: {
            entry: {
                'oryn-ui': resolve(__dirname, 'resources/js/oryn-ui.js'),
                'oryn-ui-css': resolve(__dirname, 'resources/css/oryn-ui.css'),
            },
            formats: ['es'],
        },
        outDir: 'dist',
        rollupOptions: {
            external: ['alpinejs'],
            output: {
                globals: {
                    alpinejs: 'Alpine',
                },
            },
        },
    },
    css: {
        postcss: {
            plugins: [
                require('@tailwindcss/postcss'),
            ],
        },
    },
});
