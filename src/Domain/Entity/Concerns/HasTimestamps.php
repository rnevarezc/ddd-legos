<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity\Concerns;

use Carbon\Carbon;
use Carbon\CarbonImmutable;

trait HasTimestamps
{
    protected $createdAt;

    protected $updatedAt;

    protected function setCreatedAt($dt = null)
    {
        $this->createdAt = $dt 
            ? CarbonImmutable::parse($dt) 
            : CarbonImmutable::now();
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    protected function setUpdatedAt($dt)
    {
        $this->updatedAt = Carbon::parse($dt);
    }

    protected function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function touch()
    {
        $this->updatedAt = Carbon::now();
    }
}