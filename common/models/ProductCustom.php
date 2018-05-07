<?php

namespace common\models;

use Yii;
use Intervention\Image\ImageManagerStatic as Image;
use yii\behaviors\SluggableBehavior;
use yz\shoppingcart\CartPositionProviderInterface;

/**
 * This is the model class for table "product_custom".
 *
 * @property int $id
 * @property string $user_no
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
 * @property string $price
 * @property int $weight
 * @property string $created_at
 * @property string $updated_at
 */
class ProductCustom extends \yii\db\ActiveRecord implements CartPositionProviderInterface
{
    public $imageName1, $imageName2, $imageName3;
    public $imageTemp1, $imageTemp2, $imageTemp3;
    public $removeImage1, $removeImage2, $removeImage3;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_custom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_no', 'name'], 'required'],
            [['description'], 'string'],
            [['discount', 'tax', 'weight'], 'integer'],
            [['discount_price', 'tax_price', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_no', 'no', 'name', 'alias', 'image1', 'image2', 'image3'], 'string', 'max' => 64],
            [['status', 'type', 'removeImage1', 'removeImage2', 'removeImage3'], 'boolean'],
            [['no'], 'unique'],
            //['image1', 'image', 'minSize' => 1000, 'maxSize' => 2000000, 'minWidth' => 278, 'minHeight' => 278, 'maxWidth' => 1024, 'maxHeight' => 1024, 'mimeTypes' => ['image/*']],
            ['image1', 'image', 'minSize' => 1000, 'maxSize' => 2000000, 'minWidth' => 64, 'minHeight' => 64, 'maxWidth' => 3084, 'maxHeight' => 3084, 'mimeTypes' => ['image/*']],
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
            'user_no' => Yii::t('common', 'User No'),
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
            'price' => Yii::t('common', 'Price'),
            'weight' => Yii::t('common', 'Weight'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
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
                $this->imageName1 = $no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp1->getExtension();

                Image::make($this->imageTemp1->tempName)->save('img/product_custom/origi/' . $this->imageName1, 95);
                Image::make($this->imageTemp1->tempName)->save('img/product_custom/thumb/' . $this->imageName1, 75);

                $this->image1 = $this->imageName1;
            } elseif ($no == 2) {
                $this->imageName2 = $no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp2->getExtension();

                Image::make($this->imageTemp2->tempName)->save('img/product_custom/origi/' . $this->imageName2, 95);
                Image::make($this->imageTemp2->tempName)->save('img/product_custom/thumb/' . $this->imageName2, 75);

                $this->image2 = $this->imageName2;
            } elseif ($no == 3) {
                $this->imageName3 = $no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp3->getExtension();

                Image::make($this->imageTemp3->tempName)->save('img/product_custom/origi/' . $this->imageName3, 95);
                Image::make($this->imageTemp3->tempName)->save('img/product_custom/thumb/' . $this->imageName3, 75);

                $this->image3 = $this->imageName3;
            }


            return true;
        }

        return false;
    }

    public function removeImage($existingImage)
    {
        if ($existingImage) {
            unlink('img/product_custom/origi/' . $existingImage);
            unlink('img/product_custom/thumb/' . $existingImage);

            return true;
        }

        return false;
    }

    public function getCartPosition($params = [])
    {
        // TODO: Implement getCartPosition() method.
        return Yii::createObject([
            'class' => ProductCustomCartPosition::className(),
            'no' => $this->no,
            'price' => $this->price,
            'weight' => $this->weight
        ]);
    }
}
