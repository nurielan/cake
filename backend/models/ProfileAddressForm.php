<?php

namespace backend\models;

use Yii;

class ProfileAddressForm extends \yii\base\Model
{
    public $title, $name, $address, $subdistrict, $district, $province, $postal_code, $phone_number;
    public $editable_form = false;

    public function rules()
    {
        return [
            [['title', 'name', 'address', 'subdistrict', 'district', 'province', 'postal_code', 'phone_number'], 'required'],
            [['title', 'name', 'subdistrict', 'district', 'province'], 'string', 'min' => 4, 'max' => 64],
            [['postal_code', 'phone_number'], 'string', 'min' => 4, 'max' => 24],
            ['editable_form', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => Yii::t('common', 'Judul'),
            'name' => Yii::t('common', 'Name'),
            'address' => Yii::t('common', 'Address'),
            'subdistrict' => Yii::t('common', 'Subdistrict'),
            'district' => Yii::t('common', 'District'),
            'province' => Yii::t('common', 'Province'),
            'postal_code' => Yii::t('common', 'Postal Code'),
            'phone_number' => Yii::t('common', 'Phone Number'),
            'editable_form' => Yii::t('common', 'New Address'),
        ];
    }
}