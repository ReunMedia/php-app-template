<?php

declare(strict_types=1);

namespace App\Config;

use Reun\PhpAppDefinitions\Config\SlimConfig;
use Reun\TwigUtilities\Slim\Error\TwigNotFoundSlimMiddleware;

class AppSlimConfig extends SlimConfig
{
    public function getMiddlewareClasses(): array
    {
        $mw = parent::getMiddlewareClasses();

        // This middleware makes missing Slim templates (i.e. dynamic pages)
        // return 404 status code in production.
        $mw[] = TwigNotFoundSlimMiddleware::class;

        return $mw;
    }
}
