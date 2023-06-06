import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/argon-dashboard-tailwind.css',
                'resources/css/nucleo-icons.css',
                'resources/css/nucleo-svg.css',
                'resources/css/perfect-scrollbar.css',
                'resources/css/tooltips.css',
                'resources/js/app.js',
                'resources/js/app.js',
                'resources/js/argon-dashboard-tailwind.js',
                'resources/js/argon-dashboard-tailwind.min.js',
                'resources/js/plugins/chartjs.min.js',
                'resources/js/plugins/perfect-scrollbar.min.js',

            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
