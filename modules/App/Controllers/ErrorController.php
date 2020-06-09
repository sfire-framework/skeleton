<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Controllers;

use sFire\Http\Response;


/**
 * Class ErrorController
 * @package App
 */
class ErrorController extends ControllerAbstract {


    /**
     * 401 error page
     * @return void
     */
    public function action401(): void {

        Response :: setStatus(401);
        echo $this -> view('error.401.html');
        $this -> stop();
    }


    /**
     * 403 error page
     * @return void
     */
    public function action403(): void {

        Response :: setStatus(403);
        echo $this -> view('error.403.html');
        $this -> stop();
    }


    /**
     * 404 error page
     * @return void
     */
    public function action404(): void {

        Response :: setStatus(404);
        echo $this -> view('error.404.html');
        $this -> stop();
    }
}