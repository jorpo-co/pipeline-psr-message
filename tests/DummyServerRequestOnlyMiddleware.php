<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

class DummyServerRequestOnlyMiddleware extends ServerRequestOnly
{
    use ServerRequestProcessing;
}
