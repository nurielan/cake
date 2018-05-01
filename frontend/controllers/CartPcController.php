<?php

namespace frontend\controllers;

use common\models\Bank;
use common\models\PcOrderConfirm;
use common\models\PcOrderItem;
use common\models\PcOrderList;
use common\models\ProductCustom;
use Yii;
use yii\web\Controller;

class CartPcController extends Controller
{
    public function actionPut()
    {
        if (Yii::$app->request->isPost && Yii::$app->request->post('product_custom_no')) {
            foreach (Yii::$app->request->post('product_custom_no') as $item) {
                $model = ProductCustom::findOne(['no' => $item]);

                Yii::$app->cartPc->put($model->getCartPosition(), Yii::$app->request->post('qty')[$item]);
            }

            return $this->redirect(['product-custom/index']);
            //print_r(Yii::$app->cartPc->getPositions());
            //print_r(Yii::$app->request->post('qty')['PROCUS0000000000002']);
        } else {
            return $this->redirect(['product-custom/index']);
        }
    }

    public function actionRemove($cart_id)
    {
        if (Yii::$app->request->isPost) {
            //if (Yii::$app->request->post('cart_position')) {
            //Yii::$app->cart->remove(Yii::$app->request->post('cart_position'));
            Yii::$app->cartPc->removeById($cart_id);
            //}

            return $this->redirect(['product-custom/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionSaveOrder()
    {
        # Order Confirm
        $bank = Bank::findOne(['id' => 1]);
        $orderConfirm = new PcOrderConfirm;
        $orderConfirm->via = 'Bank Transfer';
        $orderConfirm->amount = 0;
        $orderConfirm->bank = $bank->name;
        $orderConfirm->bank_id = $bank->id;
        $orderConfirm->account_number = null;
        $orderConfirm->status = 0;
        $orderConfirm->created_at = date('Y-m-d h:i:s');
        $orderConfirm->updated_at = date('Y-m-d h:i:s');
        $orderConfirm->save(0);

        # Order List
        $cartPc = Yii::$app->cartPc->getPositions();
        $quantities = [];

        foreach ($cartPc as $item) {
            $quantities[] = $item->getQuantity();
        }

        $order_list_no = Yii::$app->myLibrary->getAutoNoPcOrderlist();
        $orderList = new PcOrderList;
        $orderList->no = $order_list_no;
        $orderList->cashier = Yii::t('common', 'Cashier');
        $orderList->quantity = array_sum($quantities);
        $orderList->discount = 0;
        $orderList->tax = 0;
        $orderList->weight = 0;
        $orderList->price = Yii::$app->cartPc->getCost();
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
        $userAddress = Yii::$app->user->identity->userConfig->userAddress;
        
        foreach ($cartPc as $key => $position) {
            $orderItem = new PcOrderItem;
            $orderItem->pc_order_list_no = $orderList->no;
            $orderItem->product_custom_no = $position->getProductCustom()->no;
            $orderItem->product_custom_name = $position->getProductCustom()->name;
            $orderItem->product_custom_alias = $position->getProductCustom()->alias;
            $orderItem->product_custom_image1 = $position->getProductCustom()->image1;
            $orderItem->product_custom_image2 = $position->getProductCustom()->image2;
            $orderItem->product_custom_image3 = $position->getProductCustom()->image3;
            $orderItem->product_custom_discount = $position->getProductCustom()->discount;
            $orderItem->product_custom_discount_price = $position->getProductCustom()->discount_price;
            $orderItem->product_custom_tax = $position->getProductCustom()->tax;
            $orderItem->product_custom_tax_price = $position->getProductCustom()->tax_price;
            $orderItem->product_custom_type = $position->getProductCustom()->type;
            $orderItem->product_custom_description = $position->getProductCustom()->description;
            $orderItem->product_custom_price = $position->getProductCustom()->price;
            $orderItem->product_custom_weight = $position->getProductCustom()->weight;
            $orderItem->quantity = $position->getQuantity();
            $orderItem->sub_discount = 0;
            $orderItem->sub_discount_price = 0;
            $orderItem->sub_tax = 0;
            $orderItem->sub_tax_price = 0;
            $orderItem->sub_weight = 0;
            $orderItem->sub_price = $position->getCost();
            $orderItem->user_address_title =  $userAddress->title;
            $orderItem->user_address_name = $userAddress->name;
            $orderItem->user_address_address = $userAddress->address;
            $orderItem->user_address_subdistrict = $userAddress->subdistrict;
            $orderItem->user_address_subdistrict_no = $userAddress->subdistrict_no;
            $orderItem->user_address_district_no = $userAddress->district_no;
            $orderItem->user_address_province = $userAddress->province;
            $orderItem->user_address_province_no = $userAddress->province_no;
            $orderItem->user_address_postal_code = $userAddress->postal_code;
            $orderItem->user_address_phone_number = $userAddress->phone_number;
            $orderItem->created_at = date('Y-m-d h:i:s');
            $orderItem->updated_at = date('Y-m-d h:i:s');
            $orderItem->save(false);
        }

        Yii::$app->cartPc->removeAll();

        Yii::$app->mailer->compose('payment-custom', [
            'bank' => $bank,
            'orderList' => $orderList,
        ])->setFrom('no-reply@cakeaway.id')->setTo(Yii::$app->user->identity->email)->setSubject(Yii::$app->name . ': ' . Yii::t('common', 'Payment'))->send();

        return $this->redirect(['product-custom/index']);
    }
}