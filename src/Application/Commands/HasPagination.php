<?php

declare(strict_types=1);

namespace Ddd\Application\Commands;

trait HasPagination
{   
    public ?string $page = '1';

    public function getOffset(): int
    {
        return ((int) $this->page - 1 ) * $this->getLimit();
    }

    public function getLimit(): int
    {
        return (int) ( isset($this->limit) ? $this->limit : 10 );
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return array_merge(parent::toArray(), [
            'pagination' => [
                'offset' => $this->getOffset(),
                'limit' => $this->getLimit(),
            ]
        ]);
    }
}