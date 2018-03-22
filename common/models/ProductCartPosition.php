<?php

namespace common\models;

class ProductCartPosition extends Object implements \yz\shoppingcart\CartPositionInterface
{
    /**
     * @var Product
     */
    protected $_product;

    public $id;

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->getProduct()->price;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        if ($this->_product === null) {
            $this->_product = Product::findOne($this->id);
        }
        return $this->_product;
    }

    public function setQuantity($quantity)
    {
        // TODO: Implement setQuantity() method.
    }

    public function getQuantity()
    {
        // TODO: Implement getQuantity() method.
    }

    public function getCost($withDiscount = true)
    {
        // TODO: Implement getCost() method.
    }
}