<?php

declare(strict_types=1);

namespace App\Controller;

use App\Response;
use PCore\Routing\Annotations\{Controller, GetMapping};
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: '/')]
class IndexController
{

    #[GetMapping(path: '/')]
    public function test(): ResponseInterface
    {
        return (new Response())->json(['status' => true]);
    }

}