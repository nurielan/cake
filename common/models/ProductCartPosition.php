<?php

namespace common\models;

use yii\base\Object;
use yz\shoppingcart\CartPositionInterface;

class ProductCartPosition extends Object implements CartPositionInterface
{
    /**
     * @var Product
     */
    protected $_product;

    public $no;
    public $price;
    public $weight;
    public $quantities = [];
    public $cost;
    public $user_address_no;

    public function getId()
    {
        return md5(serialize([
            $this->no,
            $this->price,
            $this->weight,
            $this->user_address_no
        ]));
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
            $this->_product = ProductItem::findOne(['no' => $this->no]);
        }
        return $this->_product;
    }

    public function setQuantity($quantity)
    {
        // TODO: Implement setQuantity() method.
        $this->quantities = $quantity;
    }

    public function getQuantity()
    {
        // TODO: Implement getQuantity() method.
        return $this->quantities;
    }

    public function getCost($withDiscount = true)
    {
        // TODO: Implement getCost() method.
        $this->cost = $this->price * $this->getQuantity();

        return $this->cost;
    }

    public function getUserAddress()
    {
        return UserAddress::find()->where(['no' => $this->user_address_no])->one();
    }
}