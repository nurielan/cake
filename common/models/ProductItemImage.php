<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_item_image".
 *
 * @property string $id
 * @property string $product_item_no
 * @property string $name
 * @property string $alias
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class ProductItemImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_item_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_item_no', 'name', 'alias', 'image1', 'image2', 'image3'], 'string', 'max' => 64],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'product_item_no' => Yii::t('common', 'Product Item No'),
            'name' => Yii::t('common', 'Name'),
            'alias' => Yii::t('common', 'Alias'),
            'image1' => Yii::t('common', 'Image1'),
            'image2' => Yii::t('common', 'Image2'),
            'image3' => Yii::t('common', 'Image3'),
            'description' => Yii::t('common', 'Description'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
