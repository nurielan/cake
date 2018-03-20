<?php

namespace frontend\controllers;

use common\models\Gallery;
use Yii;
use yii\web\Controller;

class GalleryController extends Controller
{
    public function actionIndex()
    {
        $data['gallery'] = Gallery::find()->where(['status' => 1])->orderBy('created_at DESC')->all();

        return $this->render('index', $data);
    }

    public function actionDetail($alias)
    {
        $data['gallery'] = Gallery::findOne(['alias' => $alias]);

        return $this->render('detail', $data);
    }
}