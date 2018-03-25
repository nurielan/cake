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
            $model->user_address_no = Yii::$app->request->post('user_address');
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
            if (Yii::$app->request->post('product_item_no')) {
                foreach (Yii::$app->request->post('product_item_no') as $key => $value) {
                    $model = ProductItem::findOne(['no' => $value]);
                    //$model->user_address_no = Yii::$app->request->post('user_address')[$key];

                    if ($model) {
                        Yii::$app->cart->update($model->getCartPosition(), Yii::$app->request->post('qty')[$key]);

                        return $this->redirect(['cart/index']);
                    } else {
                        throw new NotFoundHttpException;
                    }
                }

                return $this->redirect(['cart/index']);
            }
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionRemove()
    {
        if (Yii::$app->request->post()) {
            if (Yii::$app->request->post('cart_position')) {
                Yii::$app->cart->removeById(Yii::$app->request->post('cart_position'));
            }

            return $this->redirect(['cart/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionRemoveAll()
    {
        //if (Yii::$app->request->post()) {
            Yii::$app->cart->removeAll();

            return $this->redirect(['cart/index']);
        //}

        //throw new MethodNotAllowedHttpException;
    }

    public function actionIndex()
    {
        $data['productItem'] = Yii::$app->cart->getPositions();
        $data['userAddress'] = Yii::$app->user->identity->userAddress;

        return $this->render('index', $data);
        //print_r(Yii::$app->cart->getPositions());
    }

    public function actionCheckout()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        
    }
}