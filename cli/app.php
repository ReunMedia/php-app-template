<?php

declare(strict_types=1);

use Composer\ClassMapGenerator\ClassMapGenerator;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;

/**
 * @var Application        $cli
 * @var ContainerInterface $container
 */
$classMap = ClassMapGenerator::createMap(__DIR__."/../src/App/Cli/Commands");
foreach ($classMap as $symbol => $path) {
    $command = $container->get($symbol);
    if ($command instanceof Command) {
        $cli->add($command);
    }
}
