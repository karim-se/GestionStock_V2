import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
   
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
                   'resources/css/Articles/ListeArticles.css',
                    'resources/js/Articles/ListeArticles.js',
                    "resources/css/CommandesAchats/ListeAchats.css",
                    "resources/js/CommandesAchats/ListeAchats.js",
                    'resources/js/CommandesAchats/Ajouter_Achat.js'
                    
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
