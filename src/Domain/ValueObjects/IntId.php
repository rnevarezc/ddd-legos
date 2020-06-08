<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

abstract class IntId implements Id
{
    protected $id;

    /**
     * @inheritDoc 
     * */
    public function __construct($id = null)
    {
        $this->id = (int) $id;
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

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return (string) $this->id;
    }
}
