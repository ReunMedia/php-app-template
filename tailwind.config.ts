/**
 * Tailwind configuration for Reun PHP App Template
 *
 * @author Reun Media <company@reun.eu>
 * @copyright 2024 Reun Media
 *
 * @see https://github.com/ReunMedia/php-app-template
 *
 * @version 1.0.0
 */

import type { Config } from "tailwindcss";

export default {
  content: ["./src/view/**/*.*", "./src-www/css/**/*.*", "./src-www/js/**/*.*"],
  theme: {
    extend: {},
  },
  plugins: [],
} satisfies Config;
