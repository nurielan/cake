<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_detail".
 *
 * @property string $id
 * @property string $user_no
 * @property string $fullname
 * @property int $gender
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_no', 'fullname'], 'string', 'max' => 64],
            [['gender'], 'string', 'max' => 1],
            [['user_no'], 'unique'],
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
            'fullname' => Yii::t('common', 'Fullname'),
            'gender' => Yii::t('common', 'Gender'),
            'description' => Yii::t('common', 'Description'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['no' => 'user_no']);
    }
}
