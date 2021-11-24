<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

trait ServerRequestProcessing
{
    /**
     * @throws PipelineInterrupted
     */
    protected function processServerRequest(ServerRequest $request): Message
    {
        $request->getBody()->write('processed');

        return $request;
    }
}
