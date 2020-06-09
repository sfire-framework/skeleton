<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Models\Entity;

use App\Models\Gateway\Mysql\ProductGateway;
use sFire\Bootstrap\Entity\Mysqli\MysqliEntityAbstract;


/**
 * Class ProductEntity
 * @package App
 */
class ProductEntity extends MysqliEntityAbstract {


    /**
     * Constructor
     */
    public function __construct() {

        $this -> setGateway(new ProductGateway());

        //Set the table properties
        $this -> property('id') -> int() -> generated(true) -> primary();
        $this -> property('title') -> string();
        $this -> property('price') -> float();
        $this -> property('active') -> bool();
        $this -> property('created_at') -> date() -> generated(true);
        $this -> property('edited_at') -> date() -> generated(true);
        $this -> property('deleted_at') -> date();
    }
}