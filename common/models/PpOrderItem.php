<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pp_order_item".
 *
 * @property string $id
 * @property string $pp_order_list_no
 * @property string $product_package_no
 * @property string $product_package_name
 * @property string $product_package_alias
 * @property string $product_package_image1
 * @property string $product_package_image2
 * @property string $product_package_image3
 * @property int $product_package_discount
 * @property string $product_package_discount_price
 * @property int $product_package_tax
 * @property string $product_package_tax_price
 * @property int $product_package_type
 * @property string $product_package_description
 * @property string $product_package_price
 * @property int $product_package_weight
 * @property string $product_package_pi_1
 * @property string $product_package_pi_2
 * @property string $product_package_pi_3
 * @property string $product_package_pi_4
 * @property string $product_package_pi_5
 * @property string $product_package_pi_6
 * @property string $product_package_pi_7
 * @property string $product_package_pi_8
 * @property string $product_package_pi_9
 * @property string $product_package_pi_10
 * @property int $quantity
 * @property int $sub_discount
 * @property string $sub_discount_price
 * @property int $sub_tax
 * @property string $sub_tax_price
 * @property int $sub_weight
 * @property string $sub_price
 * @property string $user_address_title
 * @property string $user_address_name
 * @property string $user_address_address
 * @property string $user_address_subdistrict
 * @property string $user_address_subdistrict_no
 * @property string $user_address_district
 * @property string $user_address_district_no
 * @property string $user_address_province
 * @property string $user_address_province_no
 * @property string $user_address_postal_code
 * @property string $user_address_phone_number
 * @property string $created_at
 * @property string $updated_at
 */
class PpOrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pp_order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_package_discount', 'product_package_tax', 'product_package_weight', 'quantity', 'sub_discount', 'sub_tax', 'sub_weight'], 'integer'],
            [['product_package_discount_price', 'product_package_tax_price', 'product_package_price', 'sub_discount_price', 'sub_tax_price', 'sub_price'], 'number'],
            [['product_package_description', 'user_address_address'], 'string'],
            [['user_address_title', 'user_address_name', 'user_address_address', 'user_address_subdistrict', 'user_address_district', 'user_address_province', 'user_address_postal_code', 'user_address_phone_number'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['pp_order_list_no', 'product_package_no', 'product_package_name', 'product_package_alias', 'product_package_image1', 'product_package_image2', 'product_package_image3', 'product_package_pi_1', 'product_package_pi_2', 'product_package_pi_3', 'product_package_pi_4', 'product_package_pi_5', 'product_package_pi_6', 'product_package_pi_7', 'product_package_pi_8', 'product_package_pi_9', 'product_package_pi_10', 'user_address_title', 'user_address_name', 'user_address_subdistrict', 'user_address_district', 'user_address_province'], 'string', 'max' => 64],
            [['product_package_type'], 'string', 'max' => 1],
            [['user_address_subdistrict_no', 'user_address_district_no', 'user_address_province_no', 'user_address_postal_code', 'user_address_phone_number'], 'string', 'max' => 24],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'pp_order_list_no' => Yii::t('common', 'Pp Order List No'),
            'product_package_no' => Yii::t('common', 'Product Package No'),
            'product_package_name' => Yii::t('common', 'Product Package Name'),
            'product_package_alias' => Yii::t('common', 'Product Package Alias'),
            'product_package_image1' => Yii::t('common', 'Product Package Image1'),
            'product_package_image2' => Yii::t('common', 'Product Package Image2'),
            'product_package_image3' => Yii::t('common', 'Product Package Image3'),
            'product_package_discount' => Yii::t('common', 'Product Package Discount'),
            'product_package_discount_price' => Yii::t('common', 'Product Package Discount Price'),
            'product_package_tax' => Yii::t('common', 'Product Package Tax'),
            'product_package_tax_price' => Yii::t('common', 'Product Package Tax Price'),
            'product_package_type' => Yii::t('common', 'Product Package Type'),
            'product_package_description' => Yii::t('common', 'Product Package Description'),
            'product_package_price' => Yii::t('common', 'Product Package Price'),
            'product_package_weight' => Yii::t('common', 'Product Package Weight'),
            'product_package_pi_1' => Yii::t('common', 'Product Package Pi 1'),
            'product_package_pi_2' => Yii::t('common', 'Product Package Pi 2'),
            'product_package_pi_3' => Yii::t('common', 'Product Package Pi 3'),
            'product_package_pi_4' => Yii::t('common', 'Product Package Pi 4'),
            'product_package_pi_5' => Yii::t('common', 'Product Package Pi 5'),
            'product_package_pi_6' => Yii::t('common', 'Product Package Pi 6'),
            'product_package_pi_7' => Yii::t('common', 'Product Package Pi 7'),
            'product_package_pi_8' => Yii::t('common', 'Product Package Pi 8'),
            'product_package_pi_9' => Yii::t('common', 'Product Package Pi 9'),
            'product_package_pi_10' => Yii::t('common', 'Product Package Pi 10'),
            'quantity' => Yii::t('common', 'Quantity'),
            'sub_discount' => Yii::t('common', 'Sub Discount'),
            'sub_discount_price' => Yii::t('common', 'Sub Discount Price'),
            'sub_tax' => Yii::t('common', 'Sub Tax'),
            'sub_tax_price' => Yii::t('common', 'Sub Tax Price'),
            'sub_weight' => Yii::t('common', 'Sub Weight'),
            'sub_price' => Yii::t('common', 'Sub Price'),
            'user_address_title' => Yii::t('common', 'User Address Title'),
            'user_address_name' => Yii::t('common', 'User Address Name'),
            'user_address_address' => Yii::t('common', 'User Address Address'),
            'user_address_subdistrict' => Yii::t('common', 'User Address Subdistrict'),
            'user_address_subdistrict_no' => Yii::t('common', 'User Address Subdistrict No'),
            'user_address_district' => Yii::t('common', 'User Address District'),
            'user_address_district_no' => Yii::t('common', 'User Address District No'),
            'user_address_province' => Yii::t('common', 'User Address Province'),
            'user_address_province_no' => Yii::t('common', 'User Address Province No'),
            'user_address_postal_code' => Yii::t('common', 'User Address Postal Code'),
            'user_address_phone_number' => Yii::t('common', 'User Address Phone Number'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    public function getOrderList()
    {
        return $this->hasOne(PpOrderList::className(), ['no' => 'pp_order_list_no']);
    }
}
