<?php
/**
 * sFire Framework (https://sfire.io)
 *
 * @link      https://github.com/sfire-framework/ for the canonical source repository
 * @copyright Copyright (c) 2014-2020 sFire Framework.
 * @license   http://sfire.io/license BSD 3-CLAUSE LICENSE
 */

declare(strict_types=1);

namespace App\Models\Mapper;

use sFire\Bootstrap\Mapper\MapperAbstract;
use App\Models\Gateway\Mysql\ProductGateway;
use App\Models\Entity\ProductEntity;


/**
 * Class ProductMapper
 * @package App
 */
class ProductMapper extends MapperAbstract {


    /**
     * Returns product entity based on given product id
     * @param int $id The product id
     * @return false|ProductEntity
     */
    public function getById(int $id) {

        $product = (new ProductGateway()) -> getById($id);
        return $this -> toEntityIterator($product, ProductEntity::class) -> current();
    }
}