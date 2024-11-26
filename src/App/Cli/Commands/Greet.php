<?php

declare(strict_types=1);

namespace App\Cli\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Example CLI command.
 *
 * All commands from `src/App/Cli/Commands` directory are automatically loaded
 * and support dependency injection.
 *
 * Use `setHidden(true)` in `configure()` to hide a specific command.
 */
class Greet extends Command
{
    #[\Override]
    protected function configure()
    {
        $this
            ->setName("greet")
            ->setDescription("Greets you with a hello.")
            ->addArgument("name", InputArgument::REQUIRED, "Your name")
        ;
    }

    #[\Override]
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $name = $input->getArgument("name");
        $name = is_scalar($name) ? $name : "";
        $output->writeln("Hello {$name}!");

        return 0;
    }
}
