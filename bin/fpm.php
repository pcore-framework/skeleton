<?php

declare(strict_types=1);

use App\Bootstrap;
use App\Kernel;
use PCore\Di\Context;
use PCore\HttpMessage\ServerRequest;
use PCore\HttpServer\ResponseEmitter\FPMResponseEmitter;

(function () {
    $loader = require_once '../vendor/autoload.php';
    Bootstrap::boot($loader, false);
    /** @var Kernel $kernel */
    $kernel = Context::getContainer()->make(Kernel::class);
    $response = $kernel->through(ServerRequest::createFromGlobals());
    (new FPMResponseEmitter())->emit($response);
})();