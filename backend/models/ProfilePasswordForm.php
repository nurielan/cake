<?php

namespace backend\models;

use Yii;

class ProfilePasswordForm extends \yii\base\Model
{

    public $password_hash, $password_hash2, $password_hash3;

    public function rules()
    {
        return [
            [['password_hash', 'password_hash2', 'password_hash3'], 'required'],
            [['password_hash', 'password_hash2', 'password_hash3'], 'string', 'min' => 4, 'max' => 64],
            ['password_hash2', 'compare', 'compareAttribute' => 'password_hash'],
            ['password_hash', 'validatePassword']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password_hash' => Yii::t('common', 'Password'),
            'password_hash2' => Yii::t('common', 'Password Repeat'),
            'password_hash3' => Yii::t('common', 'New Password'),
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!Yii::$app->security->validatePassword($this->password_hash2, Yii::$app->user->identity->password_hash)) {
                $this->addError($attribute, Yii::t('common', 'Incorrect Password'));
            }
        }

        return false;
    }
}