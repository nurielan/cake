<?php

namespace frontend\controllers;

use common\models\ProductItem;
use Yii;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->where(['status' => 1]), 10, 'DESC');
        $data['productItem'] = $pagination['data'];
        $data['pagination'] = $pagination['pagination'];

        return $this->render('index', $data);
    }

    public function actionDetail($alias)
    {
        $data['productItem'] = ProductItem::findOne(['alias' => $alias]);

        return $this->render('detail', $data);
    }
}