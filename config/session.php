<?php

declare(strict_types=1);

return [
    'default' => 'file',
    'stores' => [
        'file' => [
            'handler' => 'PCore\Session\Handlers\FileHandler',
            'options' => [
                'path' => __DIR__ . '/../var/session',
                'gcDivisor' => 100,
                'gcProbability' => 1,
                'gcMaxLifetime' => 1440
            ]
        ],
        'redis' => [
            'handler' => 'PCore\Session\Handlers\RedisHandler',
            'options' => [
                'connector' => \PCore\Redis\Connectors\BaseConnector::class,
                'config' => []
            ]
        ]
    ]
];