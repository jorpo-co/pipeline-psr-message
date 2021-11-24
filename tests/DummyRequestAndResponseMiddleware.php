<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

class DummyRequestAndResponseMiddleware extends RequestAndResponse
{
    use RequestProcessing;
    use ResponseProcessing;
}
