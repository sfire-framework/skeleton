<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Validators;

use \sFire\Validation\ValidatorCallback;
use \sFire\Bootstrap\Mvc\Helpers\MvcHelperTrait;


/**
 * Class Token
 * @package App
 */
class Token {


    use MvcHelperTrait;


    /**
     * Validates form tokens preventing CSRF attacks
     * @param mixed $value The value that needs to be validated
     * @param array $parameters An array with parameters set during the validation for validating the value
     * @param ValidatorCallback $validator
     * @return bool
     */
    public function isValid($value, array $parameters, ValidatorCallback $validator): bool {

        $validator -> setMessage('Token is invalid');

        $session = $this -> provider('session');
        $tokens  = $session -> get('tokens', []);
        $token   = array_search($value, $tokens);

        unset($tokens[$token]);
        $session -> set('tokens', $tokens);

        return false !== $token;
    }
}