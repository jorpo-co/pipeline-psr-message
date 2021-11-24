<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

class DummyResponseOnlyMiddleware extends ResponseOnly
{
    use ResponseProcessing;
}
