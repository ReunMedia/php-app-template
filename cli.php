<?php

/**
 * Project CLI entry point.
 *
 * Run project CLI commands with `php cli.php`.
 * Add custom CLI configurations and commands to `cli` directory.
 *
 * @copyright 2020 Reun Media
 *
 * @see https://github.com/ReunMedia/php-app-template
 *
 * @version 2.0.0
 */

declare(strict_types=1);

use Symfony\Component\Console\Application;

require_once __DIR__."/src/bootstrap.php";

// Create CLI App
$cli = new Application("App CLI");
$cli->setCatchExceptions(true);

// Load all CLI configuration files
foreach (glob(__DIR__."/cli/*") as $file) {
    require $file;
}

// Run CLI
$cli->run();
