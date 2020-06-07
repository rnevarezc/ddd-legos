<?php

declare(strict_types=1);

namespace Ddd\Application\Handlers;

use Ddd\Domain\Events\EventDispatcher;

trait DispatchesEvents
{   
    protected ?EventDispatcher $eventDispatcher;

    /**
     * @todo Use a Command Bus Middleware to abstract event Dispatching logic
     * @return void
     */
    final public function dispatchEvents()
    {
        isset($this->eventDispatcher) && $this->eventDispatcher->dispatch();
    }

    final public function setEventDispatcher(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}