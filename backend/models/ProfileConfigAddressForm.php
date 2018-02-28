<?php

namespace backend\models;

use Yii;

class ProfileConfigAddressForm extends \yii\base\Model
{
    public $primary_address;

    public function rules()
    {
        return [
            [['primary_address'], 'required'],
            [['primary_address'], 'string', 'min' => 4, 'max' => 64]
        ];
    }

    public function attributeLabels()
    {
        return [
            'primary_address' => Yii::t('common', 'Primary Address')
        ];
    }
}