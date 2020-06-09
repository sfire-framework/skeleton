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
use sFire\Http\Request;


/**
 * Class LanguageMiddleware
 * @package App
 */
class LanguageMiddleware extends MiddlewareAbstract {


    /**
     * Contains an array with supported languages
     * @var string[]
     */
    private array $languages = ['de', 'fr', 'it', 'nl'];


    //Will run before application logic is executed
    public function before() {

        $language = Request::getAcceptedLanguage();

        if(null !== $language) {

            $language = strtolower(substr($language, 0, 2));

            if(true === in_array($language, $this -> languages)) {

                $translation = sprintf('%s%s%stranslation.php', $this -> module() -> getPaths() -> getTranslations(), $language, DIRECTORY_SEPARATOR);
                $this -> router() -> getRoute() -> assign('translation', $translation);
                $this -> language() -> set($language);
            }
        }

        $this -> next(); //Execute next middleware or execute the controller if no other middleware is available
    }

    //Will run after application logic is executed. You may use this i.e. for logging.
    public function after() {
    }
}