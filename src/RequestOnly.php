<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;
use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\RequestInterface as Request;

/**
 * @implements Middleware<Request,Message>
 */
abstract class RequestOnly implements Middleware
{
    public function process(object $context): object
    {
        return ($context instanceof Request)
            ? $this->processRequest($context)
            : $context;
    }

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processRequest(Request $request): Message;
}
