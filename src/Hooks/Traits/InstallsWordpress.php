<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Hooks\Traits;

trait InstallsWordpress
{
    protected function installWordpress($root = 'var/www/html/') : void
    {
        define('WP_INSTALLING', true);

        require_once($root . '/wp-load.php');
        require_once($root. '/wp-admin/includes/upgrade.php');

        global $wpdb;

        if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}options'")) {
            return;
        }

        wp_install('TEST', 'admin', 'admin@example.com', true, '', 'password');

        define('WP_INSTALLING', false);
    }
}
