<?php

declare(strict_types=1);

use App\Bootstrap;
use App\Kernel;
use PCore\HttpMessage\ServerRequest;
use PCore\Di\Context;
use PCore\HttpServer\ResponseEmitter\SwooleResponseEmitter;
use Swoole\Constant;
use Swoole\Http\{Request, Response, Server};

define('BASE_PATH', dirname(__DIR__) . '/');

(function () {
    $loader = require_once './vendor/autoload.php';
    Bootstrap::boot($loader, true);
    $server = new Server('0.0.0.0', 9501);
    /** @var Kernel $kernel */
    $kernel = Context::getContainer()->make(Kernel::class);
    $server->on('request', function (Request $request, Response $response) use ($kernel) {
        $psrResponse = $kernel->through(ServerRequest::createFromSwooleRequest($request, [
            'request' => $request,
            'response' => $response,
        ]));
        (new SwooleResponseEmitter())->emit($psrResponse, $response);
    });
    $server->set([
        Constant::OPTION_WORKER_NUM => 4,
    ]);
    $server->start();
})();