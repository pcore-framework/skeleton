<?php

if (false === function_exists('base_path')) {
    /**
     * @param string $path
     * @return string
     * @throws Exception
     */
    function base_path(string $path = ''): string
    {
        return BASE_PATH . ltrim($path, '/');
    }
}