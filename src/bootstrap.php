<?php
/**
 * Reun Webapp bootstrap file.
 *
 * This file loads environment variables, sets some PHP configuration and
 * creates the DI container. The same bootstrap file is used for both CLI and
 * Web modes, which makes all the definitions etc. available for both modes.
 * The Slim application is only run in web mode.
 *
 * @copyright 2020 Reun Media
 *
 * @see https://github.com/Reun-Media/php-app-template
 *
 * @version 2.0.0
 */

declare(strict_types=1);

use App\Config\AppConfig;
use App\Config\AppDefinitions;
use DI\Container;
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Reun\PhpAppConfig\Config\AbstractAppConfig;
use Reun\PhpAppConfig\Config\RoutesInterface;
use Slim\App;

require __DIR__."/../vendor/autoload.php";

// Set working directory to project root
chdir(__DIR__."/../");

###############################
#region Project Configuration #
###############################
// Initialize application config.
$appConfig = new AppConfig();

// Load .env file
// .env is meant for development. Production environment variables are managed
// separately.
$dotenv = Dotenv::createImmutable("{$appConfig->projectRoot}");
$dotenv->safeLoad();

// Set PHP configuration
setlocale(LC_ALL, $appConfig->phpLocale);
if (extension_loaded("intl")) {
    Locale::setDefault($appConfig->phpLocale);
}
date_default_timezone_set($appConfig->defaultTimezone);
#endregion

#################################
#region Container configuration #
#################################
// Create container builder
$containerBuilder = new ContainerBuilder();

// Add Config and Dotenv to container
$containerBuilder->addDefinitions([
    AbstractAppConfig::class => $appConfig,
    Dotenv::class => $dotenv,
]);

// Add Definitions
$containerBuilder->addDefinitions(AppDefinitions::getDefinitions());

// Enable container caching in production
if (AbstractAppConfig::PROD === $appConfig->projectEnv) {
    $containerBuilder->enableCompilation("{$appConfig->cacheDirectory}/php-di");
    $containerBuilder->writeProxiesToFile(
        true,
        "{$appConfig->cacheDirectory}/php-di/proxies"
    );
}

// Build the container.
$container = $containerBuilder->build();
#endregion

######################
#region Slim Web App #
######################
// Run Slim app in web mode
if (AbstractAppConfig::SAPI_WEB === $appConfig->sapiMode) {
    /**
     * @var App<Container>
     */
    $app = $container->get(App::class);

    $app->group("", RoutesInterface::class.":registerRoutes");
    $app->run();
}
#endregion
