<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

use Illuminate\Contracts\Support\Arrayable;
use Carbon\CarbonImmutable;

interface Event extends \JsonSerializable, Arrayable
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
}
