<?php

namespace common\models;

use yii\base\Object;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

class ProductCartPosition extends Object implements CartPositionInterface
{
    use CartPositionTrait;

    /**
     * @var Product
     */
    protected $_product;

    public $no;
    public $price;
    public $weight;
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

    public function getUserAddress()
    {
        return UserAddress::find()->where(['no' => $this->user_address_no])->one();
    }
}