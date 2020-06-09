<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace sFire\Config;

use sFire\Db\Driver\Mysqli;
use sFire\Session\Adapter\Session;
use sFire\Bootstrap\Module\Module;
use sFire\Store\Container\ContainerAbstract;


/**
 * Class Provider
 * @package sFire\Config
 */
class Provider extends ContainerAbstract {


    /**
     * Constructor
     */
    public function __construct() {


        //Call parent constructor
        parent::__construct();


        //Set session provider
        $this -> set('session', function() {
            return new Session();
        });


        //Set database provider
        $this -> set('database', function(): Mysqli {

            $config = Module :: getConfig('database');
            return new Mysqli($config['host'], $config['username'], $config['password'], $config['db'], $config['port'], $config['charset']);
        });
    }
}