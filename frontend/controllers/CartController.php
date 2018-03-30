<?php

namespace frontend\controllers;

use common\models\Bank;
use common\models\ProductItem;
use Yii;
use yii\base\DynamicModel;
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
            } else {
                throw new NotFoundHttpException;
            }

            return $this->redirect(['cart/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionUpdate()
    {
        if (Yii::$app->request->isPost) {
            foreach (Yii::$app->request->post('cart_position') as $key => $value) {
                $position = Yii::$app->cart->getPositionById($value);

                if (Yii::$app->request->post('user_address')) {
                    $position->user_address_no = Yii::$app->request->post('user_address')[$key];
                }

                if ($position) {
                    Yii::$app->cart->update($position, Yii::$app->request->post('qty')[$key]);
                } else {
                    throw new NotFoundHttpException;
                }
            }

            return $this->redirect(['cart/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionRemove()
    {
        if (Yii::$app->request->isPost) {
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

        if (! Yii::$app->user->isGuest) {
            $data['userAddress'] = Yii::$app->user->identity->userAddress;
        }

        return $this->render('index', $data);
        //print_r(Yii::$app->cart->getPositions());
    }

    public function actionCheckout()
    {
        Yii::$app->user->setReturnUrl(['cart/checkout']);

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $data['userAddress'] = Yii::$app->user->identity->userAddress;
        $data['bank'] = Bank::find()->all();

        $model = new DynamicModel([
            'user_address',
            'bank'
        ]);
        $model->addRule(['user_address', 'bank'], 'required');
        $data['model'] = $model;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->set('user_address', Yii::$app->request->post('user_address'));
            Yii::$app->session->set('bank', Yii::$app->request->post('bank'));

            return $this->redirect(['cart/complete']);
        }

        return $this->render('checkout', $data);
    }

    public function actionComplete()
    {
        Yii::$app->user->setReturnUrl(['cart/complete']);

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $data['cart'] = Yii::$app->cart->getPositions();
        $data['user_address'] = Yii::$app->session->get('user_address');
        $data['bank'] = Yii::$app->session->get('bank');

        return $this->render('complete', $data);
    }
}