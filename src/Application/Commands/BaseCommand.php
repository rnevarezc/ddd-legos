<?php

declare(strict_types=1);

namespace Ddd\Application\Commands;

use Spatie\DataTransferObject\FlexibleDataTransferObject as DataTransferObject;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Concrete DataTransfer common class just to avoid hard dependencies.
 */
abstract class BaseCommand extends DataTransferObject implements Command
{
    /**
     * Create a Command from a Psr\Http\Message\ServerRequestInterface
     * 
     * This is optional. It is used in the context, but could be removed
     * if the Project is used with other framework to avoid hard dependencies.
     *
     * @param ServerRequestInterface $request
     * @return self
     */
    public static function fromRequest(ServerRequestInterface $request) : self
    {
        return new static($request->getParsedBody());
    }
}