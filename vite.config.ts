/**
 * Reun Media Vite configuration for PHP projects.
 *
 * @author Reun Media <company@reun.eu>
 * @copyright 2021 Reun Media
 *
 * @see https://github.com/Reun-Media/php-app-template
 *
 * @version 2.0.1
 */

import { defineConfig } from "vite";
import liveReload from "vite-plugin-live-reload";
import { fileURLToPath } from "url";

export default defineConfig({
  build: {
    manifest: true,
    outDir: "www/static/dist",
    rollupOptions: {
      input: {
        style: "src-www/css/style.css",
        main: "src-www/js/main.ts",
      },
    },
  },
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src-www", import.meta.url)),
    },
  },
  server: {
    host: true,
    port: 5173,
    strictPort: true,
    origin: "http://localhost:5173", // Must match Vite dev server URL
    watch: {
      ignored: ["**/vendor/**"],
    },
  },
  plugins: [liveReload(["./src/**/.(php|twig)"])],
});
