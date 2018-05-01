<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pp_order_confirm".
 *
 * @property string $id
 * @property string $via
 * @property int $amount
 * @property string $bank
 * @property string $bank_id
 * @property string $account_name
 * @property string $account_number
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class PpOrderConfirm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pp_order_confirm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['via', 'bank', 'account_name'], 'required'],
            [['amount', 'bank_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['via', 'bank', 'account_name', 'account_number'], 'string', 'max' => 255],
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
            'via' => Yii::t('common', 'Via'),
            'amount' => Yii::t('common', 'Amount'),
            'bank' => Yii::t('common', 'Bank'),
            'bank_id' => Yii::t('common', 'Bank ID'),
            'account_name' => Yii::t('common', 'Account Name'),
            'account_number' => Yii::t('common', 'Account Number'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    public function getOrderList()
    {
        return $this->hasOne(PpOrderList::className(), ['transfer_confirmation' => 'id']);
    }
}
