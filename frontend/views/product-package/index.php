<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Product Package');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mar-btm-20 mar-top-20">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('common', 'Product Package Cart') ?></h1>
                </div>
                <div class="panel-body">
                    <?php
                    if (Yii::$app->session->hasFlash('cartPp')) {
                        echo '<div class="alert alert-info">' . Yii::$app->session->getFlash('cartPp') . '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <?= Html::beginForm(['product-package/order']) ?>
                        <table class="table table-condensed table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    <?= Yii::t('common', 'Product') ?>
                                </th>
                                <th>
                                    <?= Yii::t('common', 'Price') ?>
                                </th>
                                <th>
                                    <?= Yii::t('common', 'Quantity') ?>
                                </th>
                                <th>
                                    <?= Yii::t('common', 'Subtotal') ?>
                                </th>
                                <th>
                                    <?= Yii::t('common', 'Remove') ?>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($cartPp): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($cartPp as $key => $item): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item->getProductPackage()->name ?></td>
                                        <td><?= $item->getProductPackage()->price ?></td>
                                        <td><?= $item->getQuantity() ?></td>
                                        <td><?= $item->getCost() ?></td>
                                        <td>
                                            <a class="btn btn-pink-cake btn-xs"
                                               href="<?= Url::toRoute(['cart-pp/remove', 'cart_id' => $key]) ?>"
                                               data-confirm="<?= Yii::t('common', 'Are you sure you want to remove this item?') ?>"
                                               data-method="post">
                                                &times;
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="6" valign="middle" align="center">
                                        <a class="btn btn-pink-cake"
                                           href="<?= Url::toRoute(['cart-pp/save-order']) ?>"><?= Yii::t('common', 'Save Order') ?></a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" valign="middle" align="center">
                                        <h3><?= Yii::t('common', 'No Product') ?></h3>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?= Html::endForm() ?>
                    </div>
                </div>

                <?php if (!Yii::$app->user->isGuest): ?>
                    <div class="panel-heading">
                        <h1 class="panel-title"><?= Yii::t('common', 'Product Package Order List') ?></h1>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th><?= Yii::t('common', 'Order') ?></th>
                                    <th><?= Yii::t('common', 'Cashier') ?></th>
                                    <th><?= Yii::t('common', 'Quantity') ?></th>
                                    <th><?= Yii::t('common', 'Discount') ?></th>
                                    <th><?= Yii::t('common', 'Tax') ?></th>
                                    <th><?= Yii::t('common', 'Weight') ?> (g/grams)</th>
                                    <th><?= Yii::t('common', 'Price') ?> (Rp/Rupiah)</th>
                                    <th><?= Yii::t('common', 'Status') ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($orderList): ?>
                                    <?php foreach ($orderList as $key => $value): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <a href="<?= Url::toRoute(['product-package/order-item', 'order_list_no' => str_replace('/', '-', $value->no)]) ?>"
                                                   target="_blank"><?= $value->no ?></a>
                                            </td>
                                            <td><?= $value->cashier ?></td>
                                            <td align="center"><?= $value->quantity ?></td>
                                            <td align="center"><?= $value->discount ?></td>
                                            <td align="center"><?= $value->tax ?></td>
                                            <td align="center"><?= $value->weight ?></td>
                                            <td align="right">Rp. <?= number_format($value->price, 0, '.', ',') ?></td>
                                            <td align="center">
                                                <?php
                                                if ($value->status == 0) {
                                                    echo '<label class="label label-default">' . Yii::t('common', 'Ordered') . '</label>';
                                                } elseif ($value->status == 1) {
                                                    echo '<label class="label label-warning">' . Yii::t('common', 'Checking Order') . '</label>';
                                                } elseif ($value->status == 2) {
                                                    echo '<label class="label label-success">' . Yii::t('common', 'Processing Order') . '</label>';
                                                } elseif ($value->status == 3) {
                                                    echo '<label class="label label-info">' . Yii::t('common', 'Sending Order') . '</label>';
                                                } elseif ($value->status == 4) {
                                                    echo '<label class="label label-success">' . Yii::t('common', 'Order Sent') . '</label>';
                                                } elseif ($value->status == 10) {
                                                    echo '<label class="label label-danger">' . Yii::t('common', 'Order Rejected') . '</label>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->orderConfirm->status == 0) {
                                                    echo Html::a(Yii::t('common', 'Payment Confirm'), ['product-package/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs']);
                                                } elseif ($value->orderConfirm->status == 1) {
                                                    echo Html::a(Yii::t('common', 'Payment Check'), ['product-package/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs disabled']);
                                                } elseif ($value->orderConfirm->status == 2) {
                                                    echo Html::a(Yii::t('common', 'Payment Confirmed'), ['product-package/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs disabled']);
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" align="center">
                                            <h3><?= Yii::t('common', 'No Order List') ?></h3>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
