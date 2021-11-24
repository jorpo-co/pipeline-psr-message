<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use Jorpo\Pipeline\Middleware\DummyRequestAndResponseMiddleware;
use Jorpo\Pipeline\Middleware\DummyRequestOnlyMiddleware;
use Jorpo\Pipeline\Middleware\DummyResponseOnlyMiddleware;
use Jorpo\Pipeline\Middleware\DummyServerRequestAndResponseMiddleware;
use Jorpo\Pipeline\Middleware\DummyServerRequestOnlyMiddleware;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class MiddlewareTest extends TestCase
{
    public function testThatMiddlewareCanProcessRequestOnly()
    {
        $subject = new DummyRequestOnlyMiddleware;
        $request = (new Psr17Factory)->createRequest('GET', '/badger');
        $response = (new Psr17Factory)->createResponse(200, 'OK');

        $processedRequest = $subject->process($request);
        $processedResponse = $subject->process($response);

        $this->assertSame('processed', (string) $processedRequest->getBody());
        $this->assertEmpty((string) $processedResponse->getBody());
    }

    public function testThatMiddlewareCanProcessResponseOnly()
    {
        $subject = new DummyResponseOnlyMiddleware;
        $request = (new Psr17Factory)->createRequest('GET', '/badger');
        $response = (new Psr17Factory)->createResponse(200, 'OK');

        $processedRequest = $subject->process($request);
        $processedResponse = $subject->process($response);

        $this->assertEmpty((string) $processedRequest->getBody());
        $this->assertSame('processed', (string) $processedResponse->getBody());
    }

    public function testThatMiddlewareCanProcessRequestAndResponse()
    {
        $subject = new DummyRequestAndResponseMiddleware;
        $request = (new Psr17Factory)->createRequest('GET', '/badger');
        $response = (new Psr17Factory)->createResponse(200, 'OK');

        $processedRequest = $subject->process($request);
        $processedResponse = $subject->process($response);

        $this->assertSame('processed', (string) $processedRequest->getBody());
        $this->assertSame('processed', (string) $processedResponse->getBody());
    }

    public function testThatMiddlewareCanProcessServerRequestOnly()
    {
        $subject = new DummyServerRequestOnlyMiddleware;
        $serverRequest = (new Psr17Factory)->createServerRequest('GET', '/badger');
        $request = (new Psr17Factory)->createRequest('GET', '/badger');
        $response = (new Psr17Factory)->createResponse(200, 'OK');

        $processedServerRequest = $subject->process($serverRequest);
        $processedRequest = $subject->process($request);
        $processedResponse = $subject->process($response);

        $this->assertSame('processed', (string) $processedServerRequest->getBody());
        $this->assertEmpty((string) $processedRequest->getBody());
        $this->assertEmpty((string) $processedResponse->getBody());
    }

    public function testThatMiddlewareCanProcessServerRequestAndResponse()
    {
        $subject = new DummyServerRequestAndResponseMiddleware;
        $serverRequest = (new Psr17Factory)->createServerRequest('GET', '/badger');
        $request = (new Psr17Factory)->createRequest('GET', '/badger');
        $response = (new Psr17Factory)->createResponse(200, 'OK');

        $processedServerRequest = $subject->process($serverRequest);
        $processedRequest = $subject->process($request);
        $processedResponse = $subject->process($response);

        $this->assertSame('processed', (string) $processedServerRequest->getBody());
        $this->assertEmpty((string) $processedRequest->getBody());
        $this->assertSame('processed', (string) $processedResponse->getBody());
    }
}
