<?php

/**
 * Doctrine CLI configuration.
 *
 * @copyright 2020 Reun Media
 *
 * @see https://github.com/Reun-Media/php-app-template
 *
 * @version 3.0.0
 */

declare(strict_types=1);

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Tools\Console\Command\RunSqlCommand;
use Doctrine\DBAL\Tools\Console\ConnectionProvider\SingleConnectionProvider;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Tools\Console\ConsoleRunner as MigrationsConsoleRunner;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner as OrmConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;

/** @var ContainerInterface $container */
/** @var Application $cli */

// Load migrations configuration
$migrations = new PhpFile("migrations.php");

// Use EntityManager if project uses Doctrine ORM
if ($container->has(EntityManagerInterface::class)) {
    /** @var EntityManagerInterface */
    $em = $container->get(EntityManagerInterface::class);
    $entityManagerProvider = new SingleManagerProvider($em);
    OrmConsoleRunner::addCommands($cli, $entityManagerProvider);
    $emLoader = new ExistingEntityManager($em);
    $dependencyFactory = DependencyFactory::fromEntityManager($migrations, $emLoader);
}
// Use Connection if project only uses Doctrine DBAL
elseif ($container->has(Connection::class)) {
    /** @var Connection */
    $connection = $container->get(Connection::class);
    $dependencyFactory = DependencyFactory::fromConnection(
        $migrations,
        new ExistingConnection($connection)
    );

    // Add `run-sql` command for DBAL (included in ORM commands)
    $cli->add(new RunSqlCommand(new SingleConnectionProvider($connection)));
} else {
    // Don't add migrations commands if there's no Doctrine.
    return;
}

// Add migrations commands for either ORM or DBAL
MigrationsConsoleRunner::addCommands($cli, $dependencyFactory);
