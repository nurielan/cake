<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use Intervention\Image\ImageManagerStatic as Image;
use yz\shoppingcart\CartPositionProviderInterface;

/**
 * This is the model class for table "product_package".
 *
 * @property string $id
 * @property string $no
 * @property string $name
 * @property string $alias
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $description
 * @property int $status
 * @property int $discount
 * @property string $discount_price
 * @property int $tax
 * @property string $tax_price
 * @property int $type
 * @property int $in_stock
 * @property int $out_stock
 * @property string $price
 * @property int $weight
 * @property string $product_item_1
 * @property string $product_item_2
 * @property string $product_item_3
 * @property string $product_item_4
 * @property string $product_item_5
 * @property string $product_item_6
 * @property string $product_item_7
 * @property string $product_item_8
 * @property string $product_item_9
 * @property string $product_item_10
 * @property int $custom
 * @property string $created_at
 * @property string $updated_at
 */
class ProductPackage extends \yii\db\ActiveRecord implements CartPositionProviderInterface
{
    public $imageName1, $imageName2, $imageName3;
    public $imageTemp1, $imageTemp2, $imageTemp3;
    public $removeImage1, $removeImage2, $removeImage3;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['discount', 'tax', 'in_stock', 'out_stock', 'weight', 'type'], 'integer'],
            [['discount_price', 'tax_price', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'name', 'alias', 'image1', 'image2', 'image3', 'product_item_1', 'product_item_2', 'product_item_3', 'product_item_4', 'product_item_5', 'product_item_6', 'product_item_7', 'product_item_8', 'product_item_9', 'product_item_10', 'imageName1', 'imageName2', 'imageName3'], 'string', 'max' => 64],
            [['status', 'custom'], 'boolean'],
            ['image1', 'image', 'minSize' => 1000, 'maxSize' => 2000000, 'minWidth' => 278, 'minHeight' => 278, 'maxWidth' => 1024, 'maxHeight' => 1024, 'mimeTypes' => ['image/*']],
            ['image2', 'image', 'minSize' => 1000, 'maxSize' => 2000000, 'minWidth' => 285, 'minHeight' => 570, 'maxWidth' => 512, 'maxHeight' => 1024, 'mimeTypes' => ['image/*']],
            ['image3', 'image', 'minSize' => 1000, 'maxSize' => 2000000, 'minWidth' => 64, 'minHeight' => 64, 'maxWidth' => 128, 'maxHeight' => 128, 'mimeTypes' => ['image/*']]
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
            'name' => Yii::t('common', 'Name'),
            'alias' => Yii::t('common', 'Alias'),
            'image1' => Yii::t('common', 'Image1'),
            'image2' => Yii::t('common', 'Image2'),
            'image3' => Yii::t('common', 'Image3'),
            'description' => Yii::t('common', 'Description'),
            'status' => Yii::t('common', 'Status'),
            'discount' => Yii::t('common', 'Discount'),
            'discount_price' => Yii::t('common', 'Discount Price'),
            'tax' => Yii::t('common', 'Tax'),
            'tax_price' => Yii::t('common', 'Tax Price'),
            'type' => Yii::t('common', 'Type'),
            'in_stock' => Yii::t('common', 'In Stock'),
            'out_stock' => Yii::t('common', 'Out Stock'),
            'price' => Yii::t('common', 'Price'),
            'weight' => Yii::t('common', 'Weight'),
            'product_item_1' => Yii::t('common', 'Product Item 1'),
            'product_item_2' => Yii::t('common', 'Product Item 2'),
            'product_item_3' => Yii::t('common', 'Product Item 3'),
            'product_item_4' => Yii::t('common', 'Product Item 4'),
            'product_item_5' => Yii::t('common', 'Product Item 5'),
            'product_item_6' => Yii::t('common', 'Product Item 6'),
            'product_item_7' => Yii::t('common', 'Product Item 7'),
            'product_item_8' => Yii::t('common', 'Product Item 8'),
            'product_item_9' => Yii::t('common', 'Product Item 9'),
            'product_item_10' => Yii::t('common', 'Product Item 10'),
            'custom' => Yii::t('common', 'Custom'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'removeImage1' => Yii::t('common', 'Remove Image1'),
            'removeImage2' => Yii::t('common', 'Remove Image2'),
            'removeImage3' => Yii::t('common', 'Remove Image3'),
        ];
    }

    public function behaviors()
    {
        return [
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'alias',
                'ensureUnique' => true,
                'immutable' => true,
            ]
        ];
    }

    public function uploadImages($no)
    {
        if ($this->validate()) {
            if ($no == 1) {
                $this->imageName1 = $this->no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp1->getExtension();

                Image::make($this->imageTemp1->tempName)->save('img/product_package/origi/' . $this->imageName1, 95);
                Image::make($this->imageTemp1->tempName)->save('img/product_package/thumb/' . $this->imageName1, 75);

                $this->image1 = $this->imageName1;
            } elseif ($no == 2) {
                $this->imageName2 = $this->no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp2->getExtension();

                Image::make($this->imageTemp2->tempName)->save('img/product_package/origi/' . $this->imageName2, 95);
                Image::make($this->imageTemp2->tempName)->save('img/product_package/thumb/' . $this->imageName2, 75);

                $this->image2 = $this->imageName2;
            } elseif ($no == 3) {
                $this->imageName3 = $this->no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp3->getExtension();

                Image::make($this->imageTemp3->tempName)->save('img/product_package/origi/' . $this->imageName3, 95);
                Image::make($this->imageTemp3->tempName)->save('img/product_package/thumb/' . $this->imageName3, 75);

                $this->image3 = $this->imageName3;
            }


            return true;
        }

        return false;
    }

    public function removeImage($existingImage)
    {
        if ($existingImage) {
            unlink('img/product_package/origi/' . $existingImage);
            unlink('img/product_package/thumb/' . $existingImage);

            return true;
        }

        return false;
    }

    public function getProductItem1()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_1']);
    }

    public function getProductItem2()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_2']);
    }

    public function getProductItem3()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_3']);
    }

    public function getProductItem4()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_4']);
    }

    public function getProductItem5()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_5']);
    }

    public function getProductItem6()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_6']);
    }

    public function getProductItem7()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_7']);
    }

    public function getProductItem8()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_8']);
    }
    public function getProductItem9()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_9']);
    }
    public function getProductItem10()
    {
        return $this->hasOne(ProductItem::className(), ['no' => 'product_item_10']);
    }

    public function getCartPosition($params = [])
    {
        // TODO: Implement getCartPosition() method.
        return Yii::createObject([
            'class' => ProductPackageCartPosition::className(),
            'no' => $this->no,
            'price' => $this->price,
            'weight' => $this->weight
        ]);
    }
}
