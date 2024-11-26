<?php

declare(strict_types=1);

namespace App\Twig;

use App\Config\AppConfig;
use App\Twig\Functions\RandomNumber;
use Reun\TwigUtilities\Functions\ViteAsset;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    public function __construct(
        private AppConfig $appConfig
    ) {}

    public function getGlobals(): array
    {
        return [
            "globals" => [
                "env" => $_ENV,
                "config" => $this->appConfig,
            ],
        ];
    }

    public function getFilters(): array
    {
        return [];
    }

    public function getFunctions(): array
    {
        return [
            RandomNumber::getFunction(),
            ViteAsset::getFunction(),
        ];
    }
}
