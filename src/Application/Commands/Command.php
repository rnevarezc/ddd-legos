<?php

declare(strict_types=1);

namespace Ddd\Application\Commands;

interface Command
{
    /**
     * Handle a Command
     *
     * @return mixed
     */
    public function toArray() : array;
}