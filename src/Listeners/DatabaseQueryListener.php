<?php

declare(strict_types=1);

namespace App\Listeners;

use PCore\Database\Events\QueryExecuted;
use PCore\Event\Contracts\EventListenerInterface;
use PCore\Log\LoggerFactory;

/**
 * Class DatabaseQueryListener
 * @package App\Listeners
 */
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
        if ($event instanceof QueryExecuted) {
            $this->loggerFactory->get('sql')
                ->debug($event->query, [
                    'duration' => $event->duration,
                    'bindings' => $event->bindings
                ]);
        }
    }

}