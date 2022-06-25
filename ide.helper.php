<?php

namespace Psr\Http\Message {

    use PCore\HttpMessage\Response;
    use PCore\HttpMessage\ServerRequest;

    /**
     * @mixin ServerRequest
     */
    interface ServerRequestInterface
    {
    }

    /**
     * @mixin Response
     */
    interface ResponseInterface
    {

    }

}

namespace Psr\Container {

    use PCore\Di\Container;

    /**
     * @mixin Container
     */
    interface ContainerInterface
    {
    }

}

namespace Psr\SimpleCache {

    use PCore\Cache\Cache;

    /**
     * @mixin Cache
     */
    interface CacheInterface
    {
    }

}