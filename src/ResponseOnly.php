<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;
use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * @implements Middleware<Response,Message>
 */
abstract class ResponseOnly implements Middleware
{
    /**
     * @throws PipelineInterrupted
     */
    public function process(object $context): object
    {
        return ($context instanceof Response)
            ? $this->processResponse($context)
            : $context;
    }

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processResponse(Response $response): Message;
}
