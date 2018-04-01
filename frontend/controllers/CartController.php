<?php

namespace frontend\controllers;

use common\models\Bank;
use common\models\OrderConfirm;
use common\models\OrderItem;
use common\models\OrderList;
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
                $position->user_address_no = Yii::$app->request->post('user_address')[$key];

                if ($position) {
                    Yii::$app->cart->removeById($value);
                    Yii::$app->cart->update($position, Yii::$app->request->post('qty')[$key]);
                } else {
                    throw new NotFoundHttpException;
                }
            }

            return $this->redirect(['cart/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionRemove($cart_id)
    {
        if (Yii::$app->request->isPost) {
            //if (Yii::$app->request->post('cart_position')) {
                //Yii::$app->cart->remove(Yii::$app->request->post('cart_position'));
                Yii::$app->cart->removeById($cart_id);
            //}

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

        $no_user_address = [];
        $quantities = [];

        foreach (Yii::$app->cart->getPositions() as $key => $value) {
            if (!$value->getUserAddress()) {
                $no_user_address[] = $value->getProduct()->name;
            }

            $quantities[] = $value->getQuantity();
        }

        Yii::$app->session->set('quantities', array_sum($quantities));

        if (count($no_user_address) > 0) {
            Yii::$app->session->setFlash('no_user_address', $no_user_address);

            return $this->redirect(['cart/index']);
        }

        $data['bank'] = Bank::find()->all();
        $data['productItem'] = Yii::$app->cart->getPositions();
        $data['userAddress'] = Yii::$app->user->identity->userAddress;

        $model = new DynamicModel([
            'bank'
        ]);
        $model->addRule(['bank'], 'required');
        $data['model'] = $model;

        Yii::$app->session->set('order_list_no', Yii::$app->myLibrary->getAutoNoOrderList());

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->set('bank', Yii::$app->request->post('bank'));

            return $this->redirect(['cart/complete']);
        }

        return $this->render('checkout', $data);
    }

    public function actionPaymentMethod()
    {
        Yii::$app->user->setReturnUrl(['cart/payment-method']);

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $data['bank'] = Bank::find()->all();

        if (Yii::$app->request->isPost) {
            # Order Confirm
            $orderConfirm = new OrderConfirm;
            $orderConfirm->via = 'Bank Transfer';
            $orderConfirm->amount = 0;
            $orderConfirm->bank = Yii::$app->request->post('bank_name');
            $orderConfirm->account_number = null;
            $orderConfirm->status = 0;
            $orderConfirm->created_at = date('Y-m-d h:i:s');
            $orderConfirm->updated_at = date('Y-m-d h:i:s');
            $orderConfirm->save(0);

            # Order List
            $orderList = new OrderList;
            $orderList->no = Yii::$app->session->get('order_list_no');
            $orderList->cashier = Yii::t('common', 'Cashier');
            $orderList->quantity = Yii::$app->session->get('quantities');
            $orderList->discount = 0;
            $orderList->tax = 0;
            $orderList->weight = 0;
            $orderList->price = Yii::$app->cart->getCost();
            $orderList->user_no = Yii::$app->user->identity->no;
            $orderList->user_username = Yii::$app->user->identity->username;
            $orderList->user_email = Yii::$app->user->identity->email;
            $orderList->user_image = Yii::$app->user->identity->image;
            $orderList->user_role = Yii::$app->user->identity->role;
            $orderList->status = 0;
            $orderList->transfer_confirmation = $orderConfirm->id;
            $orderList->created_at = date('Y-m-d h:i:s');
            $orderList->updated_at = date('Y-m-d h:i:s');
            $orderList->save(false);

            # Order Item
            foreach (Yii::$app->cart->getPositions() as $key => $position) {
                $orderItem = new OrderItem;
                $orderItem->order_list_no = $orderList->no;
                $orderItem->product_item_no = $position->getProduct()->no;
                $orderItem->product_item_name = $position->getProduct()->name;
                $orderItem->product_item_alias = $position->getProduct()->alias;
                $orderItem->product_item_image1 = $position->getProduct()->image1;
                $orderItem->product_item_image2 = $position->getProduct()->image2;
                $orderItem->product_item_image3 = $position->getProduct()->image3;
                $orderItem->product_item_discount = $position->getProduct()->discount;
                $orderItem->product_item_discount_price = $position->getProduct()->discount_price;
                $orderItem->product_item_tax = $position->getProduct()->tax;
                $orderItem->product_item_tax_price = $position->getProduct()->tax_price;
                $orderItem->product_item_type = $position->getProduct()->type;
                $orderItem->product_item_description = $position->getProduct()->description;
                $orderItem->product_item_price = $position->getProduct()->price;
                $orderItem->product_item_weight = $position->getProduct()->weight;
                $orderItem->quantity = $position->getQuantity();
                $orderItem->sub_discount = 0;
                $orderItem->sub_discount_price = 0;
                $orderItem->sub_tax = 0;
                $orderItem->sub_tax_price = 0;
                $orderItem->sub_weight = 0;
                $orderItem->sub_price = $position->getCost();
                $orderItem->user_address_title =  $position->getUserAddress()->title;
                $orderItem->user_address_name = $position->getUserAddress()->name;
                $orderItem->user_address_address = $position->getUserAddress()->address;
                $orderItem->user_address_subdistrict = $position->getUserAddress()->subdistrict;
                $orderItem->user_address_subdistrict_no = $position->getUserAddress()->subdistrict_no;
                $orderItem->user_address_district_no = $position->getUserAddress()->district_no;
                $orderItem->user_address_province = $position->getUserAddress()->province;
                $orderItem->user_address_province_no = $position->getUserAddress()->province_no;
                $orderItem->user_address_postal_code = $position->getUserAddress()->postal_code;
                $orderItem->user_address_phone_number = $position->getUserAddress()->phone_number;
                $orderItem->created_at = date('Y-m-d h:i:s');
                $orderItem->updated_at = date('Y-m-d h:i:s');
                $orderItem->save(false);
            }

            Yii::$app->session->remove('order_list_no');
            Yii::$app->session->remove('quantities');
            Yii::$app->cart->removeAll();

            return $this->redirect(['site/order-list']);
        }

        return $this->render('payment', $data);
    }
}