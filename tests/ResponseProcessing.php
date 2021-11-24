<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Psr\Http\Message\ResponseInterface as Response;

trait ResponseProcessing
{
    /**
     * @throws PipelineInterrupted
     */
    protected function processResponse(Response $response): Response
    {
        $response->getBody()->write('processed');

        return $response;
    }
}
