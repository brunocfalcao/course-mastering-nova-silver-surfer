import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ]
        }),
    ],
    build: {
        outDir: path.resolve(__dirname, `public/vendor/course-mastering-nova-silver-surfer`),
    },
});
