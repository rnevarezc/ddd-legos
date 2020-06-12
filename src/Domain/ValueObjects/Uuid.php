<?php

declare(strict_types=1);

namespace Ddd\Domain\ValueObjects;

use Ramsey\Uuid\Uuid as UuidGenerator;

abstract class Uuid implements Id
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * Default constructor. Set the Uuid or generate one from the $id
     *
     * @param [type] $id
     */
    public function __construct($id = null)
    {
        $this->uuid = UuidGenerator::fromString(
            $id ?: (string) UuidGenerator::uuid4()
        )->toString();
    }

    /**
     * Compare with an Uuid
     *
     * @param Uuid $uuid
     * @return boolean
     */
    public function equals(Uuid $uuid): bool
    {
        return $this->uuid === $uuid->__toString();
    }

    /**
     * Get the Uuid bytes representation.
     *
     * @return string
     */
    public function getBytes(): string
    {
        return UuidGenerator::fromString($this->uuid)->getBytes();
    }

    /**
     * Generate a Uuid from Bytes string.
     *
     * @param string $bytes
     * @return self
     */
    public static function fromBytes(string $bytes): self
    {
        return new static(UuidGenerator::fromBytes($bytes)->toString());
    }

    /**
     * Cast to Bytes the string uuid provided. 
     *
     * @param string $uid
     * @return string
     */
    public static function toBytes(string $uid): string
    {
        return (new static($uid))->getBytes();
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return (string) $this->uuid;
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
    public function get()
    {
        return $this->uuid;
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
        return (string) $this->uuid;
    }
}
