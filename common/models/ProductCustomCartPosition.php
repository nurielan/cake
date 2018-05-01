<?php

namespace common\models;

use yii\base\Object;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

class ProductCustomCartPosition extends Object implements CartPositionInterface
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
        return $this->getProductCustom()->price;
    }

    /**
     * @return Product
     */
    public function getProductCustom()
    {
        if ($this->_product === null) {
            $this->_product = ProductCustom::findOne(['no' => $this->no]);
        }
        return $this->_product;
    }
}