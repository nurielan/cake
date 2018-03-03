<?php

namespace backend\models;

use common\models\User;
use Yii;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileSettingsForm extends \yii\base\Model {

    public $username, $email, $image, $imageTemp, $removeImage, $imageName;
    public $fullname, $gender, $description;

    public function rules()
    {
        return [
            [['username', 'email', 'fullname', 'gender', 'description'], 'required'],
            [['username', 'email', 'fullname', 'imageName'], 'string', 'min' => 4, 'max' => 64],
            ['gender', 'number'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => User::className(), 'when' => function($model) {
                return $model->username != Yii::$app->user->identity->username;
            }],
            ['email', 'unique', 'targetClass' => User::className(), 'when' => function($model) {
                return $model->email != Yii::$app->user->identity->email;
            }],
            ['image', 'image', 'minSize' => 1000, 'maxSize' => 1000000, 'minWidth' => 64, 'minHeight' => 64, 'maxWidth' => 215, 'maxHeight' => 215, 'mimeTypes' => ['image/*']],
            ['removeImage', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'E-Mail'),
            'image' => Yii::t('common', 'Image'),
            'gender' => Yii::t('common', 'Gender'),
            'fullname' => Yii::t('common', 'Fullname'),
            'description' => Yii::t('common', 'Description'),
            'removeImage' => Yii::t('common', 'Hapus Gambar/Foto'),
        ];
    }

    public function uploadImage()
    {
        if ($this->validate() && $this->imageTemp) {
            $this->imageName = Yii::$app->user->identity->no . '_' . strtotime(date('Y-m-d h:i:s')) . '.' . $this->imageTemp->getExtension();

            Image::make($this->imageTemp->tempName)->save('img/user/origi/' . $this->imageName, 95);
            Image::make($this->imageTemp->tempName)->save('img/user/thumb/' . $this->imageName, 75);

            return true;
        }

        return false;
    }

    public function removeImage($existingImage)
    {
        if ($existingImage) {
            unlink('img/user/origi/' . $existingImage);
            unlink('img/user/thumb/' . $existingImage);

            return true;
        }

        return false;
    }
}