<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_item".
 *
 * @property string $id
 * @property string $no
 * @property string $product_category_no
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
 * @property string $created_at
 * @property string $updated_at
 */
class ProductItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_item';
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
            [['no', 'product_category_no', 'name', 'alias', 'image1', 'image2', 'image3'], 'string', 'max' => 64],
            [['status', 'type'], 'string', 'max' => 1],
            [['no'], 'unique'],
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
            'product_category_no' => Yii::t('common', 'Product Category No'),
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
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
