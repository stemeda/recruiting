<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */

use Cake\Datasource\ConnectionManager;

require dirname(__DIR__) . '/config/bootstrap.php';

ConnectionManager::drop('test');
ConnectionManager::config('test', ['url' => getenv('db_dsn')]);
