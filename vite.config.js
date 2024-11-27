import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/app.js', 'resources/css/app.css'],
      refresh: true,
    }),
  ],
  esbuild: {
    loader: 'jsx', // Si vous utilisez JSX ou une autre syntaxe spécifique
  },
});
