<?php

namespace frontend\controllers;

use common\models\ProductItem;
use Yii;
use yii\web\Controller;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{
    public function actionPut()
    {
        if (Yii::$app->request->post()) {
            $model = ProductItem::findOne(['no' => Yii::$app->request->post('product_item_no')]);
            $qty = Yii::$app->request->post('qty') ? Yii::$app->request->post('qty') : 1;

            if ($model) {
                Yii::$app->cart->put($model->getCartPosition(), $qty);

                return $this->redirect(['cart/index']);
            } else {
                throw new NotFoundHttpException;
            }
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionUpdate()
    {
        if (Yii::$app->request->post()) {
            $model = ProductItem::findOne(['no' => Yii::$app->request->post('product_item_no')]);
            $qty = Yii::$app->request->post('qty') ? Yii::$app->request->post('qty') : 1;

            if ($model) {
                Yii::$app->cart->update($model->getCartPosition(), $qty);

                return $this->redirect(['cart/index']);
            } else {
                throw new NotFoundHttpException;
            }
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionRemove()
    {
        if (Yii::$app->request->post()) {
            if (Yii::$app->request->post('product_item_no')) {
                $model = ProductItem::findOne(['no' => Yii::$app->request->post('product_item_no')]);

                Yii::$app->cart->remove($model->getCartPosition());
            } else {
                Yii::$app->cart->removeAll();
            }

            return $this->redirect(['cart/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionIndex()
    {
        $data['productItem'] = Yii::$app->cart->getPositions();

        return $this->render('index', $data);
    }

    public function actionCheckout()
    {
        if (! Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        
    }
}