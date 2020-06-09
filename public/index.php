<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

use sFire\Bootstrap\Boot\Bootstrap;

$autoloaderFile = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

if(false === file_exists($autoloaderFile)) {
    exit(sprintf('Autoloader could not be found. Make sure to run "composer update" to generate the autoloader file. Tried to load "%s".', $autoloaderFile));
}

$autoloader = require_once($autoloaderFile);
$boot = new Bootstrap($autoloader);
$boot -> exec();