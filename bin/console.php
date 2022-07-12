<?php

declare(strict_types=1);

use App\Kernel\{Bootstrap, Console};
use Symfony\Component\Console\Application;

define('BASE_PATH', dirname(__DIR__) . '/');

(function () {
    $loader = require_once './vendor/autoload.php';
    Bootstrap::boot($loader, true);
    (new Console())->run();
})();