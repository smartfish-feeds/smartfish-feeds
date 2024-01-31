import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const isProduction = process.env.APP_ENV === 'production';

export default defineConfig({
    base: isProduction ? 'https://yourproductiondomain.com/' : '/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
