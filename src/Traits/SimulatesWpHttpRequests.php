<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Traits;

use WP;

trait SimulatesWpHttpRequests
{
    protected function simulateGetRequest(string $path, string $ipAddress): void
    {
        $_SERVER['REQUEST_URI'] = $path;
        $_SERVER['QUERY_STRING'] = '';
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REMOTE_ADDR'] = $ipAddress;

        $wp = new WP;
        $wp->main();
    }
}
