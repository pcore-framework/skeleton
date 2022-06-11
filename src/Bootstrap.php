<?php

namespace App;

use Composer\Autoload\ClassLoader;
use PCore\Aop\{Scanner, ScannerConfig};
use PCore\Config\Repository;
use PCore\Di\Context;
use PCore\Event\{ListenerProvider, ListenerCollector};

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{

    public static function boot(ClassLoader $loader, bool $enable = false): void
    {
        $container = Context::getContainer();
        $repository = $container->make(Repository::class);
        if ($enable) {
            Scanner::init($loader, new ScannerConfig($repository->get('di.aop')));
        }
        foreach ($repository->get('di.bindings') as $id => $value) {
            $container->bind($id, $value);
        }
        $listenerProvider = $container->make(ListenerProvider::class);
        foreach (ListenerCollector::getListeners() as $listener) {
            $listenerProvider->addListener($container->make($listener));
        }
    }

}