<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

interface IntegrationEvent extends \JsonSerializable, Event
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}
