<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Middleware\Validation;

use sFire\Validation\MiddlewareAbstract;


/**
 * Class TrimEmptyStrings
 * @package App\Middleware
 */
class TrimEmptyStrings extends MiddlewareAbstract {


    /**
     * Removes spaces on the left and right in the value that needs to be validated
     * @return void
     */
    public function execute(): void {
    	$this -> setValue(trim($this -> getValue()));
    }
}