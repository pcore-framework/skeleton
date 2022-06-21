<?php

declare(strict_types=1);

namespace App\Listeners;

use PCore\Database\Events\QueryExecuted;
use PCore\Event\Contracts\EventListenerInterface;
use PCore\Log\LoggerFactory;

class DatabaseQueryListener implements EventListenerInterface
{

    public function __construct(protected LoggerFactory $loggerFactory)
    {
    }

    public function listen(): iterable
    {
        return [QueryExecuted::class];
    }

    public function process(object $event): void
    {
        print_r($event);
    }

}