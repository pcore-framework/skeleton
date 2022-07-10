<?php

declare(strict_types=1);

namespace App\Exceptions\Handlers;

use PCore\HttpMessage\Exceptions\HttpException;
use PCore\HttpMessage\Response;
use PCore\HttpServer\Contracts\{ExceptionHandlerInterface, StoppableExceptionHandlerInterface};
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Throwable;

/**
 * Class HttpExceptionHandler
 * @package App\Exceptions\Handlers
 */
class HttpExceptionHandler implements ExceptionHandlerInterface, StoppableExceptionHandlerInterface
{

    public function handle(Throwable $throwable, ServerRequestInterface $request): ?ResponseInterface
    {
        $statusCode = $throwable->getCode();
        return Response::json([
            'status' => false,
            'code' => $statusCode,
            'data' => null,
            'message' => $throwable->getMessage()
        ], $statusCode);
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof HttpException;
    }

}