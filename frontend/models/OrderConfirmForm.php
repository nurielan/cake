<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class OrderConfirmForm extends Model
{
    public $order_list_no, $via, $amount, $bank, $account_number, $account_name;

    public function rules()
    {
        return [
            [['order_list_no', 'via', 'amount', 'bank', 'account_number', 'account_name'], 'required'],
            [['amount', 'account_number'], 'integer'],
            ['amount', 'validateAmount']
        ];
    }

    public function attributeLabels()
    {
        return [
            'order_list_no' => Yii::t('common', 'No. Order'),
            'amount' => Yii::t('common', 'Amount'),
            'account_number' => Yii::t('common', 'Account Number'),
            'account_number' => Yii::t('common', 'Account Name'),
        ];
    }

    public function validateAmount($attribute, $params) {
        if (!$this->hasErrors() && $params < $this->amount) {
            $this->addError($attribute, Yii::t('common', 'Amount below expectation.'));
        }
    }
}