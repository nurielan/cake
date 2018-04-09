<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Order List');
$this->params['breadcrumbs'][] = $this->title;
?>



<section class="order-cake">
    <div class="container">
        <!--div class="product-tittle">
            <img alt="Cake-Purple" src="<?= Url::to('@web/cake/images/cake-purple.png') ?>">
            <h2>
                <?= $this->title ?>
            </h2>
        </div-->

        <?= $this->render('user-menu') ?>

        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-12">
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
                                        <a href="<?= Url::toRoute(['site/order-item', 'order_list_no' => str_replace('/', '-', $value->no)]) ?>" target="_blank"><?= $value->no ?></a>
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
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value->orderConfirm->status == 0) {
                                            echo Html::a(Yii::t('common', 'Payment Confirm'), ['site/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs']);
                                        } elseif ($value->orderConfirm->status == 1) {
                                            echo Html::a(Yii::t('common', 'Payment Check'), ['site/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs disabled']);
                                        } elseif ($value->orderConfirm->status == 2) {
                                            echo Html::a(Yii::t('common', 'Payment Confirmed'), ['site/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs disabled']);
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
        </div>
    </div>
</section>
