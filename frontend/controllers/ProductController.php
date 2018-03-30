<?php

namespace frontend\controllers;

use common\models\ProductBrand;
use common\models\ProductCategory;
use common\models\ProductItem;
use Yii;
use yii\base\DynamicModel;
use yii\helpers\Url;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $pagination = null;
        $price_min = 0;
        $price_max = 999999999999;

        if (Yii::$app->request->isPost) {
            $brand = Yii::$app->request->post('brand');
            $category = Yii::$app->request->post('category');
            $price_min = Yii::$app->request->post('price_min');
            $price_max = Yii::$app->request->post('price_max');

            if ($brand) {
                $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->where(['product_item.status' => 1, 'product_brand.alias' => $brand])->andWhere(['between', 'product_item.price', $price_min, $price_max]), 10, 'DESC');
            } elseif ($category) {
                $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->where(['product_item.status' => 1, 'product_category.alias' => $category])->andWhere(['between', 'product_item.price', $price_min, $price_max]), 10, 'DESC');
            } elseif ($brand && $category) {
                $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->where(['product_item.status' => 1, 'product_brand.alias' => $brand, 'product_category.alias' => $category])->andWhere(['between', 'product_item.price', $price_min, $price_max]), 10, 'DESC');
            } else {
                $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->where(['product_item.status' => 1])->andWhere(['between', 'product_item.price', $price_min, $price_max]), 10, 'DESC');
            }
        } else {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->where(['product_item.status' => 1])->andWhere(['between', 'product_item.price', $price_min, $price_max]), 10, 'DESC');
        }

        $data['productItem'] = $pagination['data'];
        $data['pagination'] = $pagination['pagination'];
        $data['productBrand'] = ProductBrand::find()->all();
        $data['productCategory'] = ProductCategory::find()->all();

        $dataSearch = ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->all();
        $dataSearchItem = [];

        foreach ($dataSearch as $key => $value) {
            $dataSearchItem[$key] = [
                'name' => $value->productCategory->productBrand->name . ' - ' . $value->productCategory->name . ' - ' . $value->name,
                'link' => Url::toRoute(['product/detail', 'alias' => $value->alias])
            ];
        }
        $data['dataSearchItem'] = $dataSearchItem;

        $search = new DynamicModel([
            'product_name' => Yii::$app->request->post('product_name')
        ]);
        $search->addRule('product_name', 'required');
        $search->addRule('product_name', 'string', ['min' => 1]);
        $data['search'] = $search;

        if ($search->load(Yii::$app->request->post()) && $search->validate()) {

        }

        return $this->render('index', $data);
    }

    public function actionDetail($alias)
    {
        $data['productItem'] = ProductItem::findOne(['alias' => $alias]);

        if (! Yii::$app->user->isGuest) {
            $data['userAddress'] = Yii::$app->user->identity->userAddress;
        }

        return $this->render('detail', $data);
    }
}