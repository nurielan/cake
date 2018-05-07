<?php

namespace frontend\controllers;

use common\models\Bank;
use common\models\ProductPackage;
use yii\web\MethodNotAllowedHttpException;
use common\models\PpOrderConfirm;
use common\models\PpOrderList;
use common\models\PpOrderItem;
use Yii;
use yii\web\Controller;

class CartPpController extends Controller
{
    public function actionPut()
    {
        if (Yii::$app->request->isPost && Yii::$app->request->post('product_package_no')) {
            foreach (Yii::$app->request->post('product_package_no') as $item) {
                $model = ProductPackage::findOne(['no' => $item]);

                Yii::$app->cartPp->put($model->getCartPosition(), Yii::$app->request->post('qty')[$item]);
            }

            return $this->redirect(['product-package/index']);
            //print_r(Yii::$app->cartPp->getPositions());
            //print_r(Yii::$app->request->post('qty')['PROCUS0000000000002']);
        } else {
            return $this->redirect(['product-package/index']);
        }
    }

    public function actionRemove($cart_id)
    {
        if (Yii::$app->request->isPost) {
            //if (Yii::$app->request->post('cart_position')) {
            //Yii::$app->cart->remove(Yii::$app->request->post('cart_position'));
            Yii::$app->cartPp->removeById($cart_id);
            //}

            return $this->redirect(['product-package/index']);
        }

        throw new MethodNotAllowedHttpException;
    }

    public function actionSaveOrder()
    {
        # Order Confirm
        $bank = Bank::findOne(['id' => 1]);
        $orderConfirm = new PpOrderConfirm;
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
        $cartPp = Yii::$app->cartPp->getPositions();
        $quantities = [];

        foreach ($cartPp as $item) {
            $quantities[] = $item->getQuantity();
        }

        $order_list_no = Yii::$app->myLibrary->getAutoNoPpOrderlist();
        $orderList = new PpOrderList;
        $orderList->no = $order_list_no;
        $orderList->cashier = Yii::t('common', 'Cashier');
        $orderList->quantity = array_sum($quantities);
        $orderList->discount = 0;
        $orderList->tax = 0;
        $orderList->weight = 0;
        $orderList->price = Yii::$app->cartPp->getCost();
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

        foreach ($cartPp as $key => $position) {
            $orderItem = new PpOrderItem;
            $orderItem->pp_order_list_no = $orderList->no;
            $orderItem->product_package_no = $position->getProductPackage()->no;
            $orderItem->product_package_name = $position->getProductPackage()->name;
            $orderItem->product_package_alias = $position->getProductPackage()->alias;
            $orderItem->product_package_image1 = $position->getProductPackage()->image1;
            $orderItem->product_package_image2 = $position->getProductPackage()->image2;
            $orderItem->product_package_image3 = $position->getProductPackage()->image3;
            $orderItem->product_package_discount = $position->getProductPackage()->discount;
            $orderItem->product_package_discount_price = $position->getProductPackage()->discount_price;
            $orderItem->product_package_tax = $position->getProductPackage()->tax;
            $orderItem->product_package_tax_price = $position->getProductPackage()->tax_price;
            $orderItem->product_package_type = $position->getProductPackage()->type;
            $orderItem->product_package_description = $position->getProductPackage()->description;
            $orderItem->product_package_price = $position->getProductPackage()->price;
            $orderItem->product_package_weight = $position->getProductPackage()->weight;
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

        Yii::$app->cartPp->removeAll();

        Yii::$app->mailer->compose('payment-package', [
            'bank' => $bank,
            'orderList' => $orderList,
        ])->setFrom('no-reply@cakeaway.id')->setTo(Yii::$app->user->identity->email)->setSubject(Yii::$app->name . ': ' . Yii::t('common', 'Payment'))->send();

        return $this->redirect(['product-package/index']);
    }
}