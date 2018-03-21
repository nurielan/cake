<?php

namespace frontend\controllers;

use common\models\ProductBrand;
use common\models\ProductItem;
use Yii;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex($brand = null, $category = null)
    {
        if ($brand) {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->leftJoin('p')->where(['status' => 1, 'product_brand.no' => $brand]), 10, 'DESC');
        } elseif ($brand && $category) {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->leftJoin('product_category', 'product_item.product_category_no = product_category.no')->leftJoin('product_brand', 'product_category.product_brand_no = product_brand.no')->where(['status' => 1, 'product_brand.no' => $brand, 'product_category.no' => $category]), 10, 'DESC');
        } else {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->where(['status' => 1]), 10, 'DESC');
        }

        $data['productItem'] = $pagination['data'];
        $data['pagination'] = $pagination['pagination'];
        $data['productBrand'] = ProductBrand::find()->all();

        return $this->render('index', $data);
    }

    public function actionDetail($alias)
    {
        $data['productItem'] = ProductItem::findOne(['alias' => $alias]);

        return $this->render('detail', $data);
    }
}