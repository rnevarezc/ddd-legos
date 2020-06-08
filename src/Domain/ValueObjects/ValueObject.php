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

    /**
     * Serialize an Object to a Json Representation
     * 
     * This is useful to be explicitly defined here because we are implementing
     * a pragmatic approach, and having every ValueObject to be JsonSerializable
     * is very useful in practice.
     * 
     * @inheritDoc
     */
    public function jsonSerialize();
}