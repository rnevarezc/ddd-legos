<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

use JsonSerializable;

interface ValueObject extends JsonSerializable
{
    /**
     * Get an string representation
     *
     * @return string
     */
    public function __toString();
}