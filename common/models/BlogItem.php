<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_item".
 *
 * @property string $id
 * @property string $no
 * @property string $blog_category_no
 * @property string $blog_tag_no
 * @property string $name
 * @property string $alias
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class BlogItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['no', 'blog_category_no', 'blog_tag_no', 'name', 'alias', 'image1', 'image2', 'image3'], 'string', 'max' => 64],
            [['status'], 'string', 'max' => 1],
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
            'blog_category_no' => Yii::t('common', 'Blog Category No'),
            'blog_tag_no' => Yii::t('common', 'Blog Tag No'),
            'name' => Yii::t('common', 'Name'),
            'alias' => Yii::t('common', 'Alias'),
            'image1' => Yii::t('common', 'Image1'),
            'image2' => Yii::t('common', 'Image2'),
            'image3' => Yii::t('common', 'Image3'),
            'description' => Yii::t('common', 'Description'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
