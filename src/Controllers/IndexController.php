<?php

declare(strict_types=1);

namespace App\Controllers;

use PCore\HttpMessage\Response;
use PCore\Routing\Annotations\Controller;
use PCore\Routing\Annotations\GetMapping;
use PCore\Routing\Annotations\PostMapping;
use PCore\Routing\Annotations\PutMapping;
use PCore\Routing\Annotations\DeleteMapping;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: '/')]
class IndexController
{

    #[GetMapping(path: '/')]
    public function get(): ResponseInterface
    {
        return (new Response())->json([
            'status' => true,
            'messages' => 'Method GET'
        ]);
    }

    #[PostMapping(path: '/')]
    public function post(): ResponseInterface
    {
        return (new Response())->json([
            'status' => true,
            'messages' => 'Method POST'
        ]);
    }

    #[PutMapping(path: '/')]
    public function put(): ResponseInterface
    {
        return (new Response())->json([
            'status' => true,
            'messages' => 'Method PUT'
        ]);
    }

    #[DeleteMapping(path: '/')]
    public function delete(): ResponseInterface
    {
        return (new Response())->json([
            'status' => true,
            'messages' => 'Method DELETE'
        ]);
    }

}