<?php

namespace common\models;

use yii\base\Object;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

class ProductPackageCartPosition extends Object implements CartPositionInterface
{
    use CartPositionTrait;

    public $no, $price, $weight;
    private $_product = null;

    public function getId()
    {
        // TODO: Implement getId() method.
        return md5(serialize([
            $this->no,
            $this->price,
            $this->weight
        ]));
    }

    public function getPrice()
    {
        return $this->getProductPackage()->price;
    }

    /**
     * @return Product
     */
    public function getProductPackage()
    {
        if ($this->_product === null) {
            $this->_product = ProductPackage::findOne(['no' => $this->no]);
        }
        return $this->_product;
    }
}