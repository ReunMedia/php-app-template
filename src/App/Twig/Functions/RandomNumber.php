<?php

declare(strict_types=1);

namespace App\Twig\Functions;

use Reun\TwigUtilities\Functions\AbstractFunction;

class RandomNumber extends AbstractFunction
{
    /**
     * @return int a random number
     */
    public function __invoke(
    ): int {
        return rand();
    }
}
