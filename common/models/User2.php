<?php

namespace common\models;

use Yii;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $no
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $image
 * @property int $role
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class User2 extends \yii\db\ActiveRecord
{
    public $imageTemp, $removeImage, $imageName, $usernameTemp, $emailTemp;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'role'], 'required'],
            [['removeImage'], 'boolean'],
            ['status', 'boolean', 'trueValue' => 11, 'falseValue' => 10],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'username', 'imageName'], 'string', 'max' => 64],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['role'], 'integer', 'max' => 1],
            [['username'], 'unique'],
            ['username', 'unique', 'when' => function($model) {
                return $model->username != $this->usernameTemp;
            }],
            ['email', 'unique', 'when' => function($model) {
                return $model->username != $this->emailTemp;
            }],
            [['no'], 'unique'],
            [['password_reset_token'], 'unique'],
            ['email', 'email'],
            ['image', 'image', 'minSize' => 1000, 'maxSize' => 1000000, 'minWidth' => 64, 'minHeight' => 64, 'maxWidth' => 215, 'maxHeight' => 215, 'mimeTypes' => ['image/*']],
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
            'username' => Yii::t('common', 'Username'),
            'auth_key' => Yii::t('common', 'Auth Key'),
            'password_hash' => Yii::t('common', 'Password Hash'),
            'password_reset_token' => Yii::t('common', 'Password Reset Token'),
            'email' => Yii::t('common', 'Email'),
            'image' => Yii::t('common', 'Image'),
            'role' => Yii::t('common', 'Role'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'removeImage' => Yii::t('common', 'Hapus Gambar/Foto'),
        ];
    }

    public function uploadImage($no)
    {
        if ($this->validate()) {
            $this->imageName = $this->no . '_' . strtotime(date('Y-m-d h:i:s')) . '_' . $no . '.' . $this->imageTemp->getExtension();

            Image::make($this->imageTemp->tempName)->save('img/blog_item/origi/' . $this->imageName, 95);
            Image::make($this->imageTemp->tempName)->save('img/blog_item/thumb/' . $this->imageName, 75);

            $this->image = $this->imageName;


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

    public function getUserDetail()
    {
        return $this->hasOne(UserDetail::className(), ['user_no' => 'no']);
    }

    public function getUserAddress()
    {
        return $this->hasMany(UserAddress::className(), ['user_no' => 'no']);
    }
}
