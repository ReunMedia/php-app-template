<?php

declare(strict_types=1);

namespace App\Config;

use Reun\PhpAppConfig\Config\DefinitionsInterface;
use Reun\PhpAppConfig\Config\RoutesInterface;
use Reun\PhpAppDefinitions\Config\SlimConfig;
use Reun\PhpAppDefinitions\Definitions\DoctrineOrmDefinitions;
use Reun\PhpAppDefinitions\Definitions\MonologDefinitions;
use Reun\PhpAppDefinitions\Definitions\PhpDebugBarDefinitions;
use Reun\PhpAppDefinitions\Definitions\SlimDefinitions;
use Reun\PhpAppDefinitions\Definitions\SlimPsrHttpDefinitions;
use Reun\PhpAppDefinitions\Definitions\SymfonyCacheDefinitions;
use Reun\PhpAppDefinitions\Definitions\TwigDefinitions;
use Reun\TwigUtilities\Config\TwigUtilitiesDefinitions;

class AppDefinitions implements DefinitionsInterface
{
    /**
     * @return array<class-string,mixed>
     */
    #[\Override]
    public static function getDefinitions(): array
    {
        return array_merge(
            // Load package definitions first to allow app definitions to
            // override them
            self::getPackageDefinitions(),
            self::getAppDefinitions(),
        );
    }

    /**
     * @return array<class-string,mixed>
     */
    private static function getPackageDefinitions(): array
    {
        $c = [];

        $c += SymfonyCacheDefinitions::getDefinitions();
        $c += DoctrineOrmDefinitions::getDefinitions();
        $c += SlimPsrHttpDefinitions::getDefinitions();
        $c += MonologDefinitions::getDefinitions();
        $c += PhpDebugBarDefinitions::getDefinitions();
        $c += SlimDefinitions::getDefinitions();
        $c += TwigDefinitions::getDefinitions();
        $c += TwigUtilitiesDefinitions::getDefinitions();

        return $c;
    }

    /**
     * @return array<class-string,mixed>
     */
    private static function getAppDefinitions(): array
    {
        $c = [];

        $c[RoutesInterface::class] = fn (AppRoutes $x) => $x;

        // Use custom SlimConfig to specify additional middleware
        $c[SlimConfig::class] = fn (AppSlimConfig $x) => $x;

        return $c;
    }
}
