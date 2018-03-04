<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_config".
 *
 * @property string $id
 * @property string $user_no
 * @property string $primary_address
 * @property string $created_at
 * @property string $updated_at
 */
class UserConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['user_no', 'primary_address'], 'string', 'max' => 64],
            [['user_no'], 'unique'],
            [['primary_address'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'user_no' => Yii::t('common', 'User No'),
            'primary_address' => Yii::t('common', 'Primary Address'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['no' => 'user_no']);
    }

    public function getUserAddress()
    {
        return $this->hasOne(UserAddress::className(), ['no' => 'primary_address']);
    }
}
