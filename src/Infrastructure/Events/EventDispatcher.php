<?php

namespace Ddd\Infrastructure\Events;

use Ddd\Domain\Events\EventCollector;
use Ddd\Domain\Events\EventDispatcher as EventDispatcherInterface;
use Ddd\Domain\Events\Event;
use Ddd\Domain\Events\EventPublisher;
use Psr\EventDispatcher\EventDispatcherInterface as InfrastructureDispatcher;

class EventDispatcher implements EventDispatcherInterface
{
    /**
     * @var InfrastructureDispatcher
     */
    private $dispatcher;

    /**
     * @var EventCollector
     */
    private $collector;

    /**
     * Default Constructor
     *
     * @param InfrastructureDispatcher $dispatcher
     * @param EventCollector $collector
     */
    public function __construct(
        InfrastructureDispatcher $dispatcher, EventCollector $collector
    ){
        $this->dispatcher = $dispatcher;
        $this->collector = $collector;
        
        $this->bootPublisher();
    }

    /**
     * Boot the internal Publisher singleton instance
     *
     * @return void
     */
    private function bootPublisher(): void
    {
        EventPublisher::boot($this);
    }

    /**
     * @inheritDoc
     */
    public function record(Event $event): void
    {
        $this->collector->collect($event);
    }

    /**
     * @inheritDoc
     */
    public function dispatch(): void
    {
        foreach ($this->collector->getEvents() as $key => $event) {
            $this->dispatcher->dispatch($event);
            $this->collector->remove($key);
        }
    }
}
