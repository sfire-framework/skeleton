<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Middleware\Routes;

use sFire\Bootstrap\Middleware\MiddlewareAbstract;
use sFire\Http\Response;


/**
 * Class HeadersMiddleware
 * @package App\Middleware
 */
class HeadersMiddleware extends MiddlewareAbstract {

    //Will run before application logic is executed
    public function before() {

        Response :: addHeader('X-Frame-Options', 'SAMEORIGIN');
        $this -> next(); //Execute next middleware or execute the controller if no other middleware is available
    }

    //Will run after application logic is executed. You may use this i.e. for logging.
    public function after() {
    }
}