<?php

if (function_exists('base_path') === false) {
    /**
     * @param string $path
     * @return string
     */
    function base_path(string $path = ''): string
    {
        return BASE_PATH . ltrim($path, '/');
    }
}