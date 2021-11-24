<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;
use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

/**
 * @implements Middleware<ServerRequest,Message>
 */
abstract class ServerRequestOnly implements Middleware
{
    public function process(object $context): object
    {
        return $context instanceof ServerRequest
            ? $this->processServerRequest($context)
            : $context;
    }

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processServerRequest(ServerRequest $request): Message;
}
