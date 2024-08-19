<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Traits;

trait ClearsSessionData
{
    protected function clearSessionData(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
            $_SESSION = [];
        }
    }
}
