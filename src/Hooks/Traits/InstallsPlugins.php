<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Hooks\Traits;

trait InstallsPlugins
{
    protected function installPlugins(string ...$pluginPath): void
    {
        foreach ($pluginPath as $pluginPath) {
            require_once($pluginPath);
            activate_plugin($pluginPath);
        }

        do_action('init');
    }
}
