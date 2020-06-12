<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

use MyCLabs\Enum\Enum;

abstract class EnumState extends Enum implements State
{
    /**
     * @inheritDoc
     */
    public static function fromState($state) : self
    {
        return $state instanceof static ? $state  : new static($state);
    }
}