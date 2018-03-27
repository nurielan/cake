<?php

namespace frontend\controllers;

use common\models\ProductBrand;
use common\models\ProductCategory;
use common\models\ProductItem;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex($brand = null, $category = null)
    {
        if ($brand) {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->leftJoin('product_category', 'product_item.product_category_no = product_category.no')->leftJoin('product_brand', 'product_category.product_brand_no = product_brand.no')->where(['product_item.status' => 1, 'product_brand.alias' => $brand]), 10, 'DESC');
        } elseif ($brand && $category) {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->leftJoin('product_category', 'product_item.product_category_no = product_category.no')->leftJoin('product_brand', 'product_category.product_brand_no = product_brand.no')->where(['product_item.status' => 1, 'product_brand.alias' => $brand, 'product_category.alias' => $category]), 10, 'DESC');
        } else {
            $pagination = Yii::$app->myLibrary->pagiNation(ProductItem::find()->where(['status' => 1]), 10, 'DESC');
        }

        $data['productItem'] = $pagination['data'];
        $data['pagination'] = $pagination['pagination'];
        $data['productBrand'] = ProductBrand::find()->all();
        $data['productCategory'] = ProductCategory::find()->all();

        $dataSearch = ProductItem::find()->joinWith(['productCategory', 'productCategory.productBrand'])->all();
        $dataSearchItem = [];

        foreach ($dataSearch as $key => $value) {
            $dataSearchItem[] = $value->productCategory->productBrand->name . ' - ' . $value->productCategory->name . ' - ' . $value->name;
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