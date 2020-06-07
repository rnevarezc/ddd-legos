<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity;

use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection
{
    /**
     * Default Constructor
     * 
     * Extend the BaseCollection __construct method to allow only 
     * Entity items (or null) using the ... operator :) 
     *
     * @param iterable $items
     */
    public function __construct(?iterable $items)
    {
        $this->assertItems(...$items);
    }

    /**
     * Filter unpacked items and Assert all are entities.
     * 
     * This must be done this way, so we dont alter the Default Constructor.
     *
     * @param Entity|null ...$items
     * @return void
     */
    protected function assertItems(?Entity ...$items)
    {
        parent::__construct($items);
    }

    /**
     * Set the item in the given offset (Allowing only Entity objects)
     * 
     * @inheritDoc
     */
    public function offsetSet($key, $value)
    {
        if (!$value instanceof Entity ) {
            throw new \InvalidArgumentException("Value must be an Entity");
        }

        parent::offsetSet($key, $value);
    }
} 