<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Models\Gateway\Mysql;

use ArrayIterator;
use sFire\Bootstrap\Gateway\Mysqli\MysqliGatewayAbstract;


/**
 * Class ProductGateway
 * @package App
 */
class ProductGateway extends MysqliGatewayAbstract {


    /**
     * Constructor
     */
    public function __construct() {

        $this -> setAdapter($this -> provider('database'));
        $this -> setTable('product');
    }


    /**
     * Returns products based on a given id
     * @param int $id The id of the product
     * @return ArrayIterator
     */
    public function getById(int $id): ArrayIterator {
        return $this -> select() -> where('id = :id') -> bind(['id' => $id]) -> toArrayIterator();
    }
}