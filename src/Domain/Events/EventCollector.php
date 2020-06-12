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
     * @var Event[] The list of collected Events.
     */
    private $events = [];

    private function __construct(){}

    /**
     * Get the EventCollector current instance or create one
     *
     * @return self
     */
    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Add an Event to the list
     *
     * @param Event $event
     * @return void
     */
    private function addEvent(Event $event): void
    {
        self::instance()->events[] = $event;
    }

    /**
     * Collect an Event
     *
     * @param Event $event
     * @return void
     */
    public function collect(Event $event): void
    {
        $this->addEvent($event);
    }

    /**
     * Flush the event list
     *
     * @return void
     */
    public function flush(): void
    {
        self::instance()->events = [];

        reset(self::instance()->events);
    }

    /**
     * Get the event list
     * 
     * @return Event[]
     */
    public function getEvents(): array
    {
        return self::instance()->events;
    }

    /**
     * Remove an Event from the list by its key.
     *
     * @param integer $key
     * @return void
     */
    public function remove(int $key): void
    {
        if (true === array_key_exists($key, self::instance()->events)) {

            unset(self::instance()->events[$key]);
        }
    }

    /**
     * Reset the EventCollector.
     *
     * @return void
     */
    public function shutdown()
    {
        self::$instance = null;
    }
}
