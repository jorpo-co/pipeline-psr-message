<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;
use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * @implements Middleware<Request|Response,Message>
 */
abstract class RequestAndResponse implements Middleware
{
    public function process(object $context): object
    {
        return ($context instanceof Request)
            ? $this->processRequest($context)
            : (($context instanceof Response)
                ? $this->processResponse($context)
                : $context);
    }

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processRequest(Request $request): Message;

    /**
     * @throws PipelineInterrupted
     */
    abstract protected function processResponse(Response $response): Message;
}
