<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity;

use Ddd\Domain\ValueObjects\Id;

interface Entity extends \JsonSerializable
{
    /**
     * Get the Entity ID
     *
     * @return void
     */
    public function getId() : ?Id;

    /**
     * Get an array representation
     *
     * @return array
     */
    public function toArray() : array;
}