<?php

/**
 * Reun Media Doctrine Migrations configuration.
 *
 * @copyright 2020 Reun Media
 *
 * @see https://github.com/ReunMedia/php-app-template
 *
 * @version 2.0.1
 */

declare(strict_types=1);

// https://www.doctrine-project.org/projects/doctrine-migrations/en/stable/reference/configuration.html
return [
    "migrations_paths" => [
        "App\\Doctrine\\Migrations" => "./src/App/Doctrine/Migrations",
    ],
];
