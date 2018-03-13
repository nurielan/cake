<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_list".
 *
 * @property string $id
 * @property string $no
 * @property string $cashier
 * @property int $quantity
 * @property int $discount
 * @property string $discount_price
 * @property int $tax
 * @property string $tax_price
 * @property int $weight
 * @property string $price
 * @property string $user_no
 * @property string $user_username
 * @property string $user_email
 * @property string $user_image
 * @property int $user_role
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class OrderList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no', 'user_username', 'user_email'], 'required'],
            [['quantity', 'discount', 'tax', 'weight'], 'integer'],
            [['discount_price', 'tax_price', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'cashier', 'user_no', 'user_username', 'user_email', 'user_image'], 'string', 'max' => 64],
            [['user_role', 'status'], 'string', 'max' => 1],
            [['no'], 'unique'],
            [['user_username'], 'unique'],
            [['user_email'], 'unique'],
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
            'cashier' => Yii::t('common', 'Cashier'),
            'quantity' => Yii::t('common', 'Quantity'),
            'discount' => Yii::t('common', 'Discount'),
            'discount_price' => Yii::t('common', 'Discount Price'),
            'tax' => Yii::t('common', 'Tax'),
            'tax_price' => Yii::t('common', 'Tax Price'),
            'weight' => Yii::t('common', 'Weight'),
            'price' => Yii::t('common', 'Price'),
            'user_no' => Yii::t('common', 'User No'),
            'user_username' => Yii::t('common', 'User Username'),
            'user_email' => Yii::t('common', 'User Email'),
            'user_image' => Yii::t('common', 'User Image'),
            'user_role' => Yii::t('common', 'User Role'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
