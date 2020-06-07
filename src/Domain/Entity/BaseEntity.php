<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity;

use Ddd\Domain\Entity\Concerns\HasAttributes;
use Ddd\Domain\ValueObjects\Id;

abstract class BaseEntity implements Entity
{
    protected Id $id;

    use HasAttributes;

    /**
     * Default Constructor
     *
     * @param EntityId $id;
     */
    protected function __construct(Id $id)
    {
        $this->id = $id;
    }
    
    /**
     * @inheritDoc
     */
    public function getId() : ?Id
    {
        return $this->id ?: null;
    }
}