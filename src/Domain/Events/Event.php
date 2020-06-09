<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

use Carbon\CarbonImmutable;

interface Event extends \JsonSerializable
{
    /**
     * Get the Event UUID
     *
     * @return EventId
     */
    public function getEventId() : EventId;

    /**
     * Get the event type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get the DateTime the event was fired.
     *
     * @return CarbonImmutable
     */
    public function getFiredAt(): CarbonImmutable;

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}
