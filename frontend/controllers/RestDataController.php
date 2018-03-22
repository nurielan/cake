<?php

namespace frontend\controllers;

use common\models\ProductItem;
use Yii;
use yii\web\Response;

class RestDataController extends \yii\web\Controller
{
    public function actionSearchProduct()
    {
        //$productItem = ProductItem::find()->leftJoin('product_category', 'product_item.product_category_no = product_category.no')->leftJoin('product_brand', 'product_category.product_brand_no = product_brand.no')->asArray()->all();
        $productItem = ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->with(['productCategory', 'productCategory.productBrand'])->asArray()->all();

        $productItems = [];

        foreach ($productItem as $key => $value) {
            $productItems[] = $value['productCategory']['name'] . ' ' . $value['productCategory']['productBrand']['name'] . ' ' . $value['name'];
        }

        return Yii::createObject([
            'class' => Response::className(),
            'format' => Response::FORMAT_JSON,
            'data' => $productItems
        ]);
    }
}