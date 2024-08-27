# WordpressPHPUnitHarness

## Description

A PHPUnit Extension and some traits to assist with Wordpress plugin PHPUnit testing.

This package assumes that Wordpress is installed and globally available.

## Contents

### GavG\WordpressPhpUnitHarness\AbstractWpBoot

An abstract phpunit test runner extension class which registers a PHPUnit hook to perform the following:

- Install Wordpress: loads up the framework and calls wp_install if a database is not already created, you may customize the root dir by overriding the wpRoot function, the default is '/var/www/html'
- Installs Plugins: return a lits of full file paths for each plugin to load from the pluginPaths function, this is optional
- Executes Before Test Suite Hooks: optionally return an array of callables to run once before the PHP Unit tests are executed. This may be used to seed test pages, for example.

This class should be extended and the concrete registered with PHPUnit (info on that here: https://docs.phpunit.de/en/10.5/extending-phpunit.html#registering-an-extension)

### Traits

Several test helper traits are provided under "GavG\WordpressPhpUnitHarness\Traits"

- ClearsSessionData
- UsesDbTransactions
- SimulatesWpHttpRequests
- MakesWpAdminRequests
