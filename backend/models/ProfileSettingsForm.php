<?php

namespace backend\models;

use common\models\User;
use Yii;

class ProfileSettingsForm extends \yii\base\Model {

    public $username, $email;
    public $fullname, $gender, $description;

    public function rules()
    {
        return [
            [['username', 'email', 'fullname', 'gender', 'description'], 'required'],
            [['username', 'email', 'fullname'], 'string', 'min' => 4, 'max' => 64],
            ['gender', 'number'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => User::className(), 'when' => function($model) {
                return $model->username != Yii::$app->user->identity->username;
            }],
            ['email', 'unique', 'targetClass' => User::className(), 'when' => function($model) {
                return $model->email != Yii::$app->user->identity->email;
            }]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'E-Mail'),
            'gender' => Yii::t('common', 'Gender'),
            'fullname' => Yii::t('common', 'Fullname'),
            'description' => Yii::t('common', 'Description'),
        ];
    }
}