<?php

declare(strict_types=1);

namespace App\Config;

use App\Action\HelloAction;
use Reun\PhpAppConfig\Config\RoutesInterface;
use Reun\TwigUtilities\Slim\Action\DynamicTwigPage;
use Slim\Interfaces\RouteCollectorProxyInterface;

class AppRoutes implements RoutesInterface
{
    public static function registerRoutes(RouteCollectorProxyInterface $group): void
    {
        $group->get("/", DynamicTwigPage::class);
        $group->get("/hello", HelloAction::class);
        $group->get("/{page}", DynamicTwigPage::class);
    }
}
