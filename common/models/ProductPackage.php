<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_package".
 *
 * @property string $id
 * @property string $no
 * @property string $name
 * @property string $alias
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $description
 * @property int $status
 * @property int $discount
 * @property string $discount_price
 * @property int $tax
 * @property string $tax_price
 * @property int $type
 * @property int $in_stock
 * @property int $out_stock
 * @property string $price
 * @property int $weight
 * @property string $product_item_1
 * @property string $product_item_2
 * @property string $product_item_3
 * @property string $product_item_4
 * @property string $product_item_5
 * @property string $product_item_6
 * @property string $product_item_7
 * @property string $product_item_8
 * @property string $product_item_9
 * @property string $product_item_10
 * @property int $custom
 * @property string $created_at
 * @property string $updated_at
 */
class ProductPackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['discount', 'tax', 'in_stock', 'out_stock', 'weight'], 'integer'],
            [['discount_price', 'tax_price', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'name', 'alias', 'image1', 'image2', 'image3', 'product_item_1', 'product_item_2', 'product_item_3', 'product_item_4', 'product_item_5', 'product_item_6', 'product_item_7', 'product_item_8', 'product_item_9', 'product_item_10'], 'string', 'max' => 64],
            [['status', 'type', 'custom'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'no' => Yii::t('common', 'No'),
            'name' => Yii::t('common', 'Name'),
            'alias' => Yii::t('common', 'Alias'),
            'image1' => Yii::t('common', 'Image1'),
            'image2' => Yii::t('common', 'Image2'),
            'image3' => Yii::t('common', 'Image3'),
            'description' => Yii::t('common', 'Description'),
            'status' => Yii::t('common', 'Status'),
            'discount' => Yii::t('common', 'Discount'),
            'discount_price' => Yii::t('common', 'Discount Price'),
            'tax' => Yii::t('common', 'Tax'),
            'tax_price' => Yii::t('common', 'Tax Price'),
            'type' => Yii::t('common', 'Type'),
            'in_stock' => Yii::t('common', 'In Stock'),
            'out_stock' => Yii::t('common', 'Out Stock'),
            'price' => Yii::t('common', 'Price'),
            'weight' => Yii::t('common', 'Weight'),
            'product_item_1' => Yii::t('common', 'Product Item 1'),
            'product_item_2' => Yii::t('common', 'Product Item 2'),
            'product_item_3' => Yii::t('common', 'Product Item 3'),
            'product_item_4' => Yii::t('common', 'Product Item 4'),
            'product_item_5' => Yii::t('common', 'Product Item 5'),
            'product_item_6' => Yii::t('common', 'Product Item 6'),
            'product_item_7' => Yii::t('common', 'Product Item 7'),
            'product_item_8' => Yii::t('common', 'Product Item 8'),
            'product_item_9' => Yii::t('common', 'Product Item 9'),
            'product_item_10' => Yii::t('common', 'Product Item 10'),
            'custom' => Yii::t('common', 'Custom'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
