import {defineConfig} from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
export default defineConfig({
    build: {
        manifest: true,
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
            resolve: {
                alias: {
                    '@': '/resources/js'
                }
            }
        }),
    ],
});
