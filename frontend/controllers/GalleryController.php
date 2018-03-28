<?php

namespace frontend\controllers;

use common\models\Gallery;
use Yii;
use yii\web\Controller;

class GalleryController extends Controller
{
    public function actionIndex()
    {
        $galleryItem = Yii::$app->myLibrary->pagiNation(Gallery::find()->where(['status' => 1]), 20, 'DESC');
        $data['gallery'] = $galleryItem['data'];
        $data['pagination'] = $galleryItem['pagination'];

        return $this->render('index', $data);
    }

    public function actionDetail($alias)
    {
        $data['gallery'] = Gallery::findOne(['alias' => $alias]);

        return $this->render('detail', $data);
    }
}