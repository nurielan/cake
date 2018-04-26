<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property int $id
 * @property string $name
 * @property string $account_number
 * @property string $account_name
 * @property string $branch
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'account_number', 'account_name', 'branch', 'image'], 'string', 'max' => 255],
            [['account_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'account_number' => Yii::t('common', 'Account Number'),
            'account_name' => Yii::t('common', 'Account Name'),
            'branch' => Yii::t('common', 'Branch'),
            'image' => Yii::t('common', 'Image'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
