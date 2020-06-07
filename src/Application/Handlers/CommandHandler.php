<?php

declare(strict_types=1);

namespace Ddd\Application\Handlers;

use Ddd\Application\Commands\Command;

interface CommandHandler
{
    /**
     * Handle a Command
     *
     * @return mixed
     */
    public function handle(Command $command);
}