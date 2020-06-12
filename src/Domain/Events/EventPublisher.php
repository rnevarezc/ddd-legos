<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

final class EventPublisher
{
    private static $instance;

    private $dispatcher;

    /**
     * Default constructor
     *
     * @param EventDispatcher $dispatcher
     */
    private function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Boot the Publisher instance
     *
     * @param EventDispatcher $dispatcher
     * @return void
     */
    public static function boot(EventDispatcher $dispatcher): void
    {
        if (!static::$instance) {
            static::$instance = new self($dispatcher);
        }
    }

    /**
     * Raise an event recording it in the Dispatcher.
     *
     * @param Event $event
     * @return void
     */
    public static function raise(Event $event): void
    {
        if (!static::$instance) {
            throw new \LogicException('EventPublisher needs to be booted.');
        }

        static::$instance->dispatcher->record($event);
    }
}
