<?php

declare(strict_types=1);

namespace Ddd\Domain\Events;

final class EventPublisher
{
    private static $instance;

    private $dispatcher;

    private function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public static function boot(EventDispatcher $dispatcher): void
    {
        if (!static::$instance) {
            static::$instance = new self($dispatcher);
        }
    }

    public static function raise(Event $event): void
    {
        if (!static::$instance) {
            throw new \LogicException('EventPublisher needs to be booted.');
        }

        static::$instance->dispatcher->record($event);
    }
}
