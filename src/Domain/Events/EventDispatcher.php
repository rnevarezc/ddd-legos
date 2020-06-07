<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

interface EventDispatcher
{
    /**
     * Record an Event
     *
     * @param Event $event
     * @return void
     */
    public function record(Event $event): void;

    /**
     * Dispatch an Event
     *
     * @return void
     */
    public function dispatch(): void;
}
