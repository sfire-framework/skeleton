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

use sFire\Store\Container\ContainerAbstract;


/**
 * Class Path
 * @package sFire\Bootstrap
 */
class Path extends ContainerAbstract {


    /**
     * Constructor
     */
    public function __construct() {

        //Call parent constructor
        parent::__construct();

        $this -> set('root',              dirname(dirname(__FILE__))   .                    DIRECTORY_SEPARATOR);
        $this -> set('config',            $this -> get('root')          . 'config' .         DIRECTORY_SEPARATOR);
        $this -> set('data',              $this -> get('root')          . 'data' .           DIRECTORY_SEPARATOR);
        $this -> set('modules',           $this -> get('root')          . 'modules' .        DIRECTORY_SEPARATOR);
        $this -> set('vendor',            $this -> get('root')          . 'vendor' .         DIRECTORY_SEPARATOR);
        $this -> set('cache',             $this -> get('data')          . 'cache' .          DIRECTORY_SEPARATOR);
        $this -> set('log',               $this -> get('data')          . 'log' .            DIRECTORY_SEPARATOR);
        $this -> set('session',           $this -> get('data')          . 'session' .        DIRECTORY_SEPARATOR);
        $this -> set('upload',            $this -> get('data')          . 'upload' .         DIRECTORY_SEPARATOR);
        $this -> set('cache-template',    $this -> get('cache')         . 'template' .       DIRECTORY_SEPARATOR);
        $this -> set('log-access',        $this -> get('log')           . 'access' .         DIRECTORY_SEPARATOR);
        $this -> set('log-error',         $this -> get('log')           . 'error' .          DIRECTORY_SEPARATOR);
    }
}