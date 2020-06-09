<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Middleware\Template;

use sFire\Bootstrap\Mvc\Helpers\MvcHelperTrait;
use sFire\DataControl\Token;
use sFire\Template\Parser;


/**
 * Class TemplateMiddleware
 * @package App
 */
class TemplateMiddleware {


    use MvcHelperTrait;


    /**
     * Contains the maximum amount of tokens saved per session
     * @var int
     */
    const TOKEN_AMOUNT = 10;


    /**
     * Contains the length of the token
     * @var int
     */
    const TOKEN_LENGTH = 64;

	
    /**
     * Constructor
     * @param Parser $view
     */
    public function __construct(Parser $view) {

        //Add a route function for converting a route identifier to URL
        $view -> addFunction('route', function(string $identifier, array $params = []): string {
            return $this -> router() -> routeToUrl($identifier, $params);
        });

        //Add token function for preventing CSRF attacks
        $view -> addFunction('token', function(): string {

            $tokens  = [];
            $token   = Token::create(self::TOKEN_LENGTH);
            $session = $this -> provider('session');

            if(false === $session -> has('tokens')) {
                $session -> add('token', $tokens);
            }
            else {

                $tokens = $session -> get('tokens');

                if(count($tokens) > self::TOKEN_AMOUNT) {
                    $tokens = array_slice($tokens, -1 * (self::TOKEN_AMOUNT), self::TOKEN_AMOUNT);
                }
            }

            $tokens[] = $token;
            $this -> provider('session') -> set('tokens', $tokens);

            return $token;
        });

        //Set the language as variable in the view
        $view -> assign('language', $this -> language() -> get());
    }
}