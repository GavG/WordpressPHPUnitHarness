<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Traits;

trait UsesDbTransactions
{
    protected function startDbTransaction(): void
    {
        global $wpdb;
        $wpdb->query('START TRANSACTION');
    }

    protected function rollbackDbTransaction(): void
    {
        global $wpdb;
        $wpdb->query('ROLLBACK');
    }
}
