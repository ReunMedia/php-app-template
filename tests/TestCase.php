<?php

declare(strict_types=1);

namespace Tests;

use DI\Container;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Container\ContainerInterface;

/**
 * Pest TestCase with DI-container.
 */
abstract class TestCase extends BaseTestCase
{
    public ContainerInterface $container;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->container = new Container($this->getDefinitions());
    }

    private function getDefinitions(): array
    {
        // Add any test definitions here
        return [];
    }
}
