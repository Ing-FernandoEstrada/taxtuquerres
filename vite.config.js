import {defineConfig} from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
export default defineConfig({
    buildDirectory: '../../public/build',
    build: {
        manifest: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/modals.js',
            ],
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
