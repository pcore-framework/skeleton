<?php

namespace App;

use PCore\HttpServer\Kernel as HttpKernel;

/**
 * Class Kernel
 * @package App
 */
class Kernel extends HttpKernel
{

    protected array $middlewares = [
        'App\Middlewares\ExceptionHandleMiddleware',
        'PCore\HttpServer\Middlewares\RoutingMiddleware'
    ];

}