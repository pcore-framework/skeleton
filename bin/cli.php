<?php

use App\Bootstrap;
use PCore\Aop\Scanner;
use PCore\Console\CommandCollector;
use Symfony\Component\Console\Application;

define('BASE_PATH', dirname(__DIR__) . '/');

(function () {
    $loader = require_once './vendor/autoload.php';
    Bootstrap::boot($loader, true);
    $config = Scanner::scanConfig(BASE_PATH . '/vendor/composer/installed.json');
    $application = new Application();
    $commands = array_merge($config['commands'], CommandCollector::all());
    foreach ($commands as $command) {
        $application->add(new $command);
    }
    $application->run();
})();