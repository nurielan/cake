<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Checkout');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="checkout-cake">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center"><?= Yii::t('common', $this->title) ?></h1>
                <h4 align="center"><?= Yii::t('common', 'Order No') ?>
                    : <?= Yii::$app->session->get('order_list_no') ?></h4>
                <hr>
                <h3><?= Yii::t('common', 'Order Item') ?></h3>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                No.
                                            </th>
                                            <th>
                                                <?= Yii::t('common', 'Send to') ?>
                                            </th>
                                            <th>
                                                <?= Yii::t('common', 'Product') ?>
                                            </th>
                                            <th>
                                                <?= Yii::t('common', 'Quantity') ?>
                                            </th>
                                            <th>
                                                <?= Yii::t('common', 'Price') ?>
                                            </th>
                                            <th>
                                                <?= Yii::t('common', 'Subtotal') ?>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($productItem as $key => $value): ?>
                                            <tr>
                                                <td align="center">
                                                    <?= $i++ ?>
                                                </td>
                                                <td>
                                                    <?= $value->getUserAddress()->title ?>
                                                </td>
                                                <td>
                                                    <?= $value->getProduct()->name ?>
                                                </td>
                                                <td align="center">
                                                    <?= $value->getQuantity() ?>
                                                </td>
                                                <td align="right">
                                                    Rp. <?= number_format($value->getProduct()->price, 0, '.', ',') ?>
                                                </td>
                                                <td align="right">
                                                    Rp. <?= number_format($value->getCost(), 0, '.', ',') ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="4"><b>Total</b></td>
                                            <td align="right">
                                                Rp. <?= number_format(Yii::$app->cart->getCost(), 0, '.', ',') ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <h3><?= Yii::t('common', 'User Address') ?></h3>
                    <?php foreach ($userAddress as $key => $address): ?>
                        <li style="margin-bottom: 15px;">
                            <b><?= $address->title ?></b>
                            <small><?= $address->name ?></small>
                            <br>
                            <?= $address->address ?>,
                            <?= $address->subdistrict ?>,
                            <?= $address->district ?>,
                            <?= $address->province ?>,
                            <?= $address->postal_code ?>,
                            <?= $address->phone_number ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <?= Html::a(Yii::t('common', 'Cart'), ['cart/index'], ['class' => 'btn btn-pink-cake']) ?>
            </div>
            <div class="col-xs-6" align="right">
                <?= Html::a(Yii::t('common', 'Payment Method'), ['cart/payment-method'], ['class' => 'btn btn-pink-cake']) ?>
            </div>
        </div>
    </div>
</section>
