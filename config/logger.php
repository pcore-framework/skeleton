<?php

declare(strict_types=1);

use Monolog\Logger;

return [
    'default' => 'app',
    'logger' => [
        'app' => [
            'handler' => 'Monolog\Handler\RotatingFileHandler',
            'options' => [
                'filename' => __DIR__ . '/../var/log/app.log',
                'maxFiles' => 180,
                'level' => Logger::WARNING
            ]
        ],
        'sql' => [
            'handler' => 'Monolog\Handler\RotatingFileHandler',
            'options' => [
                'filename' => __DIR__ . '/../var/log/database/sql.log',
                'maxFiles' => 180,
                'level' => Logger::DEBUG
            ]
        ]
    ]
];