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


/**
 * Class HomeController
 * @package App
 */
class HomeController extends ControllerAbstract {


    /**
     * Homepage index
     * @return void
     */
    public function actionIndex(): void {
        echo $this -> view('home.index.html');
    }
}