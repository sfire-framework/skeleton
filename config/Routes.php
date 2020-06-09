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

use App\Middleware\Routes\HeadersMiddleware;
use App\Middleware\Routes\LanguageMiddleware;
use sFire\Routing\Router;
use sFire\Routing\Route;


/**
 * Class Routes
 * @package sFire\Config
 */
class Routes {


    /**
     * Constructor
     */
    public function __construct() {

        Router :: module('App') -> middleware(HeadersMiddleware::class, LanguageMiddleware::class) -> group(function(Route $route) {

            //Add default error pages
            $route -> controller('Error') -> group(function(Route $route) {

                $route -> error('401', 'error.401') -> action('401');
                $route -> error('403', 'error.403') -> action('403');
                $route -> error('404', 'error.404') -> action('404');
            });

            //Home
            $route -> get('', 'home.index') -> controller('Home') -> action('index');
        });
    }
}