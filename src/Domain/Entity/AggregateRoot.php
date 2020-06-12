<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity;

use Ddd\Domain\ValueObjects\Uuid;
use Ddd\Domain\Events\{Event, EventPublisher};
use Ddd\Domain\ValueObjects\Id;

abstract class AggregateRoot implements Entity
{
    protected Uuid $uuid;

    /**
     * Default Constructor
     *
     * @param Uuid $uuid
     */
    protected function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * Get the Aggregate Uuid
     *
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    /**
     * Compare two aggregates
     *
     * @param Uuid $uuid
     * @return void
     */
    final public function equals(Uuid $uuid)
    {
        return $this->uuid->equals($uuid);
    }

    /**
     * Raise a Domain Event using the EventPublisher.
     *
     * @param Event $event
     * @return void
     * @see EventPublisher::raise()
     */
    final protected function raise(Event $event): void
    {
        EventPublisher::raise($event);
    }

    /**
     * @inheritDoc
     */
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
