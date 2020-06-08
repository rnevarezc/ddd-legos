<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

interface State extends ValueObject
{
    /**
     * Get State Value
     *
     * @return void
     */
    public function getValue();

    /**
     * Cast an State instance from a mixed $state value
     *
     * @param mixed $state
     * @return self
     */
    public static function fromState($state) : self;
}