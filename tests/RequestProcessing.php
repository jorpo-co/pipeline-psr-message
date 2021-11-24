<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Psr\Http\Message\MessageInterface as Message;
use Psr\Http\Message\RequestInterface as Request;

trait RequestProcessing
{
    /**
     * @throws PipelineInterrupted
     */
    protected function processRequest(Request $request): Message
    {
        $request->getBody()->write('processed');

        return $request;
    }
}
