<?php

declare(strict_types=1);

namespace Ddd\Application\Commands;

trait HasPagination
{   
    protected static $LIMIT = 10;

    public ?string $page = '1';

    public function getOffset()
    {
        return ((int) $this->page - 1 ) * self::$LIMIT;
    }

    public function setLimit(?int $limit)
    {
        self::$LIMIT = $limit ?? self::$LIMIT;
    }

    public function getLimit()
    {
        return self::$LIMIT;
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