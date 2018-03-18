<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cake_product_item_highlight".
 *
 * @property string $id
 * @property string $product_item_no
 * @property string $created_at
 * @property string $updated_at
 */
class CakeProductItemHighlight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cake_product_item_highlight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_item_no'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_item_no'], 'string', 'max' => 64],
            [['product_item_no'], 'unique'],
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
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    public function getProductItem()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_no']);
    }
}
