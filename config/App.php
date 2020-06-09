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
 * Class App
 * @package sFire\Bootstrap
 */
class App extends ContainerAbstract {


    /**
     * Constructor
     */
    public function __construct() {


        //Call parent constructor
        parent::__construct();


        //Set the default language
        $this -> set('locale', 'en');


        //Load modules
        $this -> set('modules', ['App']);


        //Debug options
        $this -> set('debug', [

            'mode' => 'development',

            'display' => [

                'enabled' => true, //Whenever to show the error on screen
                'ip'	  => [] //An array with IP addresses to white list to show the error
            ],

            'write' => [

                'enabled' => true, //Whenever to enable or disable to log the error to file
                'rotate'  => 'day' //Log rotating in hour, day, week, month or year
            ]
        ]);


        //Cache options
        $this -> set('cache', [
            'probability' => 5 //Probability sweep through cache folder deleting old/expired files.
        ]);


        //Set default file extensions
        $this -> set('extensions', [

            'translation' 	=> '.lg',
            'view' 			=> '.htwml',
            'cache'			=> '.ch'
        ]);


        //Set default prefix names for file types i.e. [Foo][Home][Controller][.php] where "Foo" is the prefix , "Home" the name and "Controller" the postfix
        $this -> set('prefix', [

            'controller' 	=> '',
            'helper' 		=> '',
            'model' 		=> '',
            'entity' 		=> '',
            'validator' 	=> '',
            'mapper' 		=> '',
            'gateway' 		=> '',
            'schedule' 		=> '',
            'action'		=> 'action',
            'middleware'	=> ''
        ]);


        //Set default postfix names for file types i.e. [Foo][Home][Controller][.php] where "Foo" is the prefix , "Home" the name and "Controller" the postfix
        $this -> set('postfix', [

            'controller' 	=> 'Controller',
            'helper' 		=> 'Helper',
            'model' 		=> 'Model',
            'entity' 		=> 'Entity',
            'validator' 	=> 'Validator',
            'mapper' 		=> 'Mapper',
            'gateway' 		=> 'Gateway',
            'schedule' 		=> 'Schedule',
            'action'		=> '',
            'middleware'	=> 'Middleware'
        ]);


        //Set default directories
        $this -> set('directory', [

            'config' 				=> '',
            'controller' 			=> 'Controllers' 	. DIRECTORY_SEPARATOR,
            'model'		 			=> 'Models' 		. DIRECTORY_SEPARATOR,
            'entity'	 			=> 'Models' 		. DIRECTORY_SEPARATOR . 'Entity' . DIRECTORY_SEPARATOR,
            'mapper'	 			=> 'Models' 		. DIRECTORY_SEPARATOR . 'Mapper' . DIRECTORY_SEPARATOR,
            'gateway'	 			=> 'Models' 		. DIRECTORY_SEPARATOR . 'Gateway' . DIRECTORY_SEPARATOR,
            'helper' 				=> 'Helpers' 		. DIRECTORY_SEPARATOR,
            'translation' 			=> 'Translations' 	. DIRECTORY_SEPARATOR,
            'validator' 			=> 'Validators' 	. DIRECTORY_SEPARATOR,
            'view' 					=> 'Views' 			. DIRECTORY_SEPARATOR,
            'middleware'			=> 'Middleware'		. DIRECTORY_SEPARATOR,
            'middleware-http'		=> 'Middleware'		. DIRECTORY_SEPARATOR . 'http' . DIRECTORY_SEPARATOR,
            'middleware-validation'	=> 'Middleware'		. DIRECTORY_SEPARATOR . 'validation' . DIRECTORY_SEPARATOR
        ]);
    }
}