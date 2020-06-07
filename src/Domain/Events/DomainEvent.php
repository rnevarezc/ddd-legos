<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

use Carbon\CarbonImmutable;

abstract class DomainEvent implements Event
{
    public const NAME = 'event';

    public EventId $uuid;

    public CarbonImmutable $firedAt;

    protected function __construct()
    {
        $this->uuid = new EventId();
        $this->firedAt = CarbonImmutable::now();
    }

    /**
     * @inheritDoc
     */
    public function getEventId(): EventId
    {
        return $this->uuid;
    }

    /**
     * @inheritDoc
     */
    public function getType() : string
    {
        return static::NAME;
    }

    /**
     * @inheritDoc
     */
    public function getFiredAt(): CarbonImmutable
    {   
        return $this->firedAt;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'uuid'=> (string) $this->uuid,
            'fired_at'=> (string) $this->firedAt,
        ] + $this->toArray();
    }
}
