<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

interface Id extends ValueObject
{
    /**
     * Default Constructor
     *
     * @param mixed $id
     */
    public function __construct($id = null);

    /**
     * Get the Identity Value
     *
     * @return void
     */
    public function get();

    /**
     * Get an Id instance from an uncasted $id 
     * 
     * If $id is an Instance if ID, should return it. 
     * Otherwise, create an instance
     *
     * @param mixed $id
     * @return self
     */
    public static function fromId($id): self;
}