<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * This is the model class for table "product_category".
 *
 * @property string $id
 * @property string $no
 * @property string $product_brand_no
 * @property string $name
 * @property string $alias
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $description
 * @property int $status
 * @property int $discount
 * @property string $discount_price
 * @property string $created_at
 * @property string $updated_at
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    public $imageName1, $imageName2, $imageName3;
    public $imageTemp1, $imageTemp2, $imageTemp3;
    public $removeImage1, $removeImage2, $removeImage3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['discount'], 'integer'],
            [['discount_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'product_brand_no', 'name', 'alias', 'image1', 'image2', 'image3', 'imageName1', 'imageName2', 'imageName3'], 'string', 'max' => 64],
            [['status', 'removeImage1', 'removeImage2', 'removeImage3'], 'string', 'max' => 1],
            [['no'], 'unique'],
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
            'product_brand_no' => Yii::t('common', 'Product Brand No'),
            'name' => Yii::t('common', 'Name'),
            'alias' => Yii::t('common', 'Alias'),
            'image1' => Yii::t('common', 'Image1'),
            'image2' => Yii::t('common', 'Image2'),
            'image3' => Yii::t('common', 'Image3'),
            'description' => Yii::t('common', 'Description'),
            'status' => Yii::t('common', 'Status'),
            'discount' => Yii::t('common', 'Discount'),
            'discount_price' => Yii::t('common', 'Discount Price'),
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

                Image::make($this->imageTemp1->tempName)->save('img/product_category/origi/' . $this->imageName1, 95);
                Image::make($this->imageTemp1->tempName)->save('img/product_category/thumb/' . $this->imageName1, 75);

                $this->image1 = $this->imageName1;
            } elseif ($no == 2) {
                $this->imageName2 = $this->no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp2->getExtension();

                Image::make($this->imageTemp2->tempName)->save('img/product_category/origi/' . $this->imageName2, 95);
                Image::make($this->imageTemp2->tempName)->save('img/product_category/thumb/' . $this->imageName2, 75);

                $this->image2 = $this->imageName2;
            } elseif ($no == 3) {
                $this->imageName3 = $this->no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp3->getExtension();

                Image::make($this->imageTemp3->tempName)->save('img/product_category/origi/' . $this->imageName3, 95);
                Image::make($this->imageTemp3->tempName)->save('img/product_category/thumb/' . $this->imageName3, 75);

                $this->image3 = $this->imageName3;
            }


            return true;
        }

        return false;
    }

    public function removeImage($existingImage)
    {
        if ($existingImage) {
            unlink('img/product_category/origi/' . $existingImage);
            unlink('img/product_category/thumb/' . $existingImage);

            return true;
        }

        return false;
    }

    public function getProductBrand()
    {
        return $this->hasOne(ProductBrand::className(), ['no' => 'product_brand_no']);
    }

    public function getProductCategory()
    {
        return $this->hasMany(ProductCategory::className(), ['no' => 'product_category_no']);
    }
}
