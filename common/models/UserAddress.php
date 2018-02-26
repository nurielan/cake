<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property string $id
 * @property string $no
 * @property string $user_no
 * @property string $title
 * @property string $name
 * @property string $address
 * @property string $subdistrict
 * @property string $subdistrict_no
 * @property string $district
 * @property string $district_no
 * @property string $province
 * @property string $province_no
 * @property string $postal_code
 * @property string $phone_number
 * @property string $created_at
 * @property string $updated_at
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'name', 'address', 'subdistrict', 'district', 'province', 'postal_code', 'phone_number'], 'required'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'user_no', 'title', 'name', 'subdistrict', 'district', 'province'], 'string', 'max' => 64],
            [['subdistrict_no', 'district_no', 'province_no', 'postal_code', 'phone_number'], 'string', 'max' => 24],
            [['phone_number'], 'unique'],
            [['no'], 'unique'],
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
            'user_no' => Yii::t('common', 'User No'),
            'title' => Yii::t('common', 'Title'),
            'name' => Yii::t('common', 'Name'),
            'address' => Yii::t('common', 'Address'),
            'subdistrict' => Yii::t('common', 'Subdistrict'),
            'subdistrict_no' => Yii::t('common', 'Subdistrict No'),
            'district' => Yii::t('common', 'District'),
            'district_no' => Yii::t('common', 'District No'),
            'province' => Yii::t('common', 'Province'),
            'province_no' => Yii::t('common', 'Province No'),
            'postal_code' => Yii::t('common', 'Postal Code'),
            'phone_number' => Yii::t('common', 'Phone Number'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['no' => 'user_no']);
    }
}
