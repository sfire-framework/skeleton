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

use App\Middleware\Template\TemplateMiddleware;
use sFire\Template\Parser;


/**
 * Class ControllerAbstract
 * @package App
 */
class ControllerAbstract extends \sFire\Bootstrap\Mvc\ControllerAbstract {


    /**
     * Returns an instance of Parser for rendering template views
     * @param string $file The path to the template file
     * @return Parser
     */
    public function view(string $file): Parser {

        $parser = new Parser();

        //Set the cache directory where all parsed templates will be saved
        $parser -> setCacheDir($this -> path() -> get('cache-template'));

        //Set the root directory where all the template files are located
        $parser -> setTemplateDir($this -> module() -> getPaths() -> getViews());

        //Add translation
        if($translation = $this -> router() -> getRoute() -> getParam('translation')) {
            $parser -> translation($translation, $this -> language() -> get());
        }

        //Add template middleware
        $parser -> middleware(TemplateMiddleware::class);

        //Set the template file to parse
        $parser -> setFile($file);

        return $parser;
    }


    /**
     * Stops all execution
     * @return void
     */
    public function stop(): void {
        exit();
    }
}