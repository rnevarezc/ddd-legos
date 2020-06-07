<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity\Concerns;

use Ddd\Domain\ValueObjects\State;

trait HasStates
{
    protected ?State $state;

    /**
     * Set the Current State
     *
     * @param State|null $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get the current state
     *
     * @return State|null
     */
    public function getState() : ?State
    {
        return $this->state ?? null;
    }
}