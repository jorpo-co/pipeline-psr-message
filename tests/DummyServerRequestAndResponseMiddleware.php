<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

class DummyServerRequestAndResponseMiddleware extends ServerRequestAndResponse
{
    use ServerRequestProcessing;
    use ResponseProcessing;
}
