<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * This is the model class for table "cake_our_team".
 *
 * @property string $id
 * @property string $fullname
 * @property string $username
 * @property int $gender
 * @property string $description
 * @property string $image1
 * @property string $created_at
 * @property string $updated_at
 */
class CakeOurTeam extends \yii\db\ActiveRecord
{
    public $imageName1;
    public $imageTemp1;
    public $removeImage1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cake_our_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'gender'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['fullname', 'username'], 'string', 'max' => 64],
            [['gender'], 'string', 'max' => 1],
            ['removeImage1', 'boolean'],
            ['image1', 'image', 'minSize' => 1000, 'maxSize' => 2000000, 'minWidth' => 278, 'minHeight' => 278, 'maxWidth' => 1024, 'maxHeight' => 1024, 'mimeTypes' => ['image/*']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'fullname' => Yii::t('common', 'Fullname'),
            'username' => Yii::t('common', 'Username'),
            'gender' => Yii::t('common', 'Gender'),
            'description' => Yii::t('common', 'Description'),
            'image1' => Yii::t('common', 'Image1'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'removeImage1' => Yii::t('common', 'Remove Image1'),
        ];
    }

    public function behaviors()
    {
        return [
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'fullname',
                'slugAttribute' => 'username',
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

                Image::make($this->imageTemp1->tempName)->save('img/cake_our_team/origi/' . $this->imageName1, 95);
                Image::make($this->imageTemp1->tempName)->save('img/cake_our_team/thumb/' . $this->imageName1, 75);

                $this->image1 = $this->imageName1;
            }


            return true;
        }

        return false;
    }

    public function removeImage($existingImage)
    {
        if ($existingImage) {
            unlink('img/cake_our_team/origi/' . $existingImage);
            unlink('img/cake_our_team/thumb/' . $existingImage);

            return true;
        }

        return false;
    }
}
