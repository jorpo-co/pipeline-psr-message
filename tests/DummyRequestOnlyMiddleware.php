<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

class DummyRequestOnlyMiddleware extends RequestOnly
{
    use RequestProcessing;
}
