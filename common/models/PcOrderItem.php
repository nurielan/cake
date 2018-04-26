<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pc_order_item".
 *
 * @property int $id
 * @property string $pc_order_list_no
 * @property string $product_custom_no
 * @property string $product_custom_name
 * @property string $product_custom_alias
 * @property string $product_custom_image1
 * @property string $product_custom_image2
 * @property string $product_custom_image3
 * @property int $product_custom_discount
 * @property string $product_custom_discount_price
 * @property int $product_custom_tax
 * @property string $product_custom_tax_price
 * @property int $product_custom_type
 * @property string $product_custom_description
 * @property string $product_custom_price
 * @property int $product_custom_weight
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
class PcOrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pc_order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_custom_discount', 'product_custom_tax', 'product_custom_weight', 'quantity', 'sub_discount', 'sub_tax', 'sub_weight'], 'integer'],
            [['product_custom_discount_price', 'product_custom_tax_price', 'product_custom_price', 'sub_discount_price', 'sub_tax_price', 'sub_price'], 'number'],
            [['product_custom_description', 'user_address_address'], 'string'],
            [['user_address_title', 'user_address_name', 'user_address_address', 'user_address_subdistrict', 'user_address_district', 'user_address_province', 'user_address_postal_code', 'user_address_phone_number'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['pc_order_list_no', 'product_custom_no', 'product_custom_name', 'product_custom_alias', 'product_custom_image1', 'product_custom_image2', 'product_custom_image3', 'user_address_title', 'user_address_name', 'user_address_subdistrict', 'user_address_district', 'user_address_province'], 'string', 'max' => 64],
            [['product_custom_type'], 'string', 'max' => 1],
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
            'pc_order_list_no' => Yii::t('common', 'Pc Order List No'),
            'product_custom_no' => Yii::t('common', 'Product Custom No'),
            'product_custom_name' => Yii::t('common', 'Product Custom Name'),
            'product_custom_alias' => Yii::t('common', 'Product Custom Alias'),
            'product_custom_image1' => Yii::t('common', 'Product Custom Image1'),
            'product_custom_image2' => Yii::t('common', 'Product Custom Image2'),
            'product_custom_image3' => Yii::t('common', 'Product Custom Image3'),
            'product_custom_discount' => Yii::t('common', 'Product Custom Discount'),
            'product_custom_discount_price' => Yii::t('common', 'Product Custom Discount Price'),
            'product_custom_tax' => Yii::t('common', 'Product Custom Tax'),
            'product_custom_tax_price' => Yii::t('common', 'Product Custom Tax Price'),
            'product_custom_type' => Yii::t('common', 'Product Custom Type'),
            'product_custom_description' => Yii::t('common', 'Product Custom Description'),
            'product_custom_price' => Yii::t('common', 'Product Custom Price'),
            'product_custom_weight' => Yii::t('common', 'Product Custom Weight'),
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
}
