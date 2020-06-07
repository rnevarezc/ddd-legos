<?php 

declare(strict_types=1);

namespace Ddd\Domain\Events;

class EventCollector
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * @var Event[]
     */
    private $events = [];

    private function __construct(){}

    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function addEvent(Event $event): void
    {
        self::instance()->events[] = $event;
    }

    public function collect(Event $event): void
    {
        $this->addEvent($event);
    }

    public function flush(): void
    {
        self::instance()->events = [];

        reset(self::instance()->events);
    }

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        return self::instance()->events;
    }

    public function remove(int $key): void
    {
        if (true === array_key_exists($key, self::instance()->events)) {

            unset(self::instance()->events[$key]);
        }
    }

    public function shutdown()
    {
        self::$instance = null;
    }
}
