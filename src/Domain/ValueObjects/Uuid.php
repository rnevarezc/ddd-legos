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

    public function __construct($id = null)
    {
        $this->uuid = UuidGenerator::fromString($id ?: (string) UuidGenerator::uuid4())->toString();
    }

    public function equals(Uuid $uuid): bool
    {
        return $this->uuid === $uuid->__toString();
    }

    public function getBytes(): string
    {
        return UuidGenerator::fromString($this->uuid)->getBytes();
    }

    public static function fromBytes(string $bytes): self
    {
        return new static(UuidGenerator::fromBytes($bytes)->toString());
    }

    public static function toBytes(string $uid): string
    {
        return (new static($uid))->getBytes();
    }

    public function __toString()
    {
        return (string) $this->uuid;
    }

    public static function fromString(string $id)
    {
        return new static($id);
    }

    public function get()
    {
        return $this->uuid;
    }

    public static function fromId($id) : self
    {
        return $id instanceof static ? $id : new static($id);
    }

    public function jsonSerialize()
    {
        return (string) $this->uuid;
    }
}
