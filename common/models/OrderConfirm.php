<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_confirm".
 *
 * @property string $id
 * @property string $via
 * @property int $amount
 * @property string $bank
 * @property string $account_name
 * @property string $account_number
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class OrderConfirm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_confirm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['via', 'bank', 'account_name', 'account_number'], 'required'],
            [['amount', 'bank_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['via', 'bank', 'account_name', 'account_number'], 'string', 'max' => 255],
            [['status', 'removeImage'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'via' => Yii::t('common', 'Via'),
            'amount' => Yii::t('common', 'Amount'),
            'bank' => Yii::t('common', 'Bank'),
            'account_name' => Yii::t('common', 'Account Name'),
            'account_number' => Yii::t('common', 'Account Number'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'bank_id' => Yii::t('common', 'Bank ID'),
        ];
    }

    public function getOrderList()
    {
        return $this->hasOne(OrderList::className(), ['transfer_confirmation' => 'id']);
    }
}
