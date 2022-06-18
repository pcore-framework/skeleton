<?php

declare(strict_types=1);

return [
    'aop' => [
        'cache' => false,
        'paths' => ['./src'],
        'runtimeDir' => './runtime',
        'collectors' => [
            'PCore\HttpServer\RouteCollector',
            'PCore\Event\ListenerCollector'
        ]
    ],
    'bindings' => [
        'PCore\Config\Contracts\ConfigInterface' => 'PCore\Config\Repository',
        'Psr\EventDispatcher\EventDispatcherInterface' => 'PCore\Event\EventDispatcher',
        'Psr\Log\LoggerInterface' => 'PCore\Log\Logger'
    ]
];