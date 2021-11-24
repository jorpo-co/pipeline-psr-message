<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;
use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

/**
 * @implements Middleware<ServerRequest|Response,Message>
 */
abstract class ServerRequestAndResponse implements Middleware
{
    public function process(object $context): object
    {
        return ($context instanceof ServerRequest)
            ? $this->processServerRequest($context)
            : (($context instanceof Response)
                ? $this->processResponse($context)
                : $context);
    }

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processServerRequest(ServerRequest $request): Message;

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processResponse(Response $response): Message;
}
