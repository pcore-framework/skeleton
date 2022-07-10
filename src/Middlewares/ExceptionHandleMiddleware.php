<?php

declare(strict_types=1);

namespace App\Middlewares;

use PCore\HttpServer\Middlewares\ExceptionHandleMiddleware as HttpExceptionHandleMiddleware;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Log\LoggerInterface;
use Throwable;

/**
 * Class ExceptionHandleMiddleware
 * @package App\Http\Middlewares
 */
class ExceptionHandleMiddleware extends HttpExceptionHandleMiddleware
{

    protected array $exceptionHandlers = [
        'App\Exceptions\Handlers\HttpExceptionHandler'
    ];

    public function __construct(protected LoggerInterface $logger)
    {
    }

    protected function reportException(Throwable $throwable, ServerRequestInterface $request): void
    {
        $this->logger->error($throwable->getMessage(), [
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
            'headers' => $request->getHeaders(),
            'request' => $request->getQueryParams() + $request->getParsedBody()
        ]);
    }

    protected function renderException(Throwable $throwable, ServerRequestInterface $request): ResponseInterface
    {
        return parent::renderException(...func_get_args());
    }

}