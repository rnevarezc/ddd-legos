<?php

namespace Ddd\Domain\Entity;

use Ddd\Domain\ValueObjects\Uuid;
use Ddd\Domain\Events\{Event, EventPublisher};
use Ddd\Domain\ValueObjects\Id;

abstract class AggregateRoot implements Entity
{
    protected Uuid $uuid;

    protected function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    final public function equals(Uuid $uuid)
    {
        return $this->uuid->equals($uuid);
    }

    final protected function raise(Event $event): void
    {
        EventPublisher::raise($event);
    }

    public function __toString(): string
    {
        return (string) $this->uuid;
    }

    /**
     * @inheritDoc 
    */
    public function getId() : ?Id
    {
        return $this->uuid;
    }
}
