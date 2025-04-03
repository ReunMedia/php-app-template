/**
 * Reun Media Prettier configuration.
 *
 * @author Reun Media <company@reun.eu>
 * @copyright 2020 Reun Media
 *
 * @see https://github.com/ReunMedia/project-templates
 *
 * @version 5.1.0
 */

export default {
  plugins: [
    "prettier-plugin-packagejson",
    "@zackad/prettier-plugin-twig", // Enable if using Twig
    // "prettier-plugin-tailwindcss" // Enable if using Tailwind
  ],
  twigSingleQuote: false,
};
