<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

abstract class Guid implements Id
{
    protected $id;

    /**
     * @inheritDoc 
     * */
    public function __construct($id = null)
    {
        $this->id = (string) $id;
    }

    /**
     * @inheritDoc 
     * */
    public function get()
    {
        return $this->id;
    }

    /**
     * @inheritDoc 
     * */
    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * @inheritDoc
     */
    public static function fromString(string $id)
    {
        return new static($id);
    }

    /**
     * @inheritDoc
     */
    public static function fromId($id) : self
    {
        return $id instanceof static ? $id : new static($id);
    }

    public function jsonSerialize() : mixed
    {
        return (string) $this->id;
    }
}
