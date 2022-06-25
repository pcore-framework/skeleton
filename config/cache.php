<?php

declare(strict_types=1);

return [
    'default' => 'file',
    'stores' => [
        'file' => [
            'handler' => 'PCore\Cache\Handlers\FileHandler',
            'options' => [
                'path' => __DIR__ . '/../var/cache/app'
            ]
        ],
        'redis' => [
            'handler' => 'PCore\Cache\Handlers\RedisHandler',
            'options' => [
                'connection' => 'redis'
            ]
        ],
        'memcached' => [
            'handler' => 'PCore\Cache\Handlers\MemcachedHandler',
            'options' => [
                'host' => '127.0.0.1',
                'port' => 11211
            ]
        ]
    ]
];