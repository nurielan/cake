<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Order List');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="about-cake">
    <div class="container">
        <h2 class="hide">
            &nbsp;
        </h2>

        <?= $this->render('user-menu') ?>

        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-condensed table-striped table-hover">
                        <thead style="color: #fff;">
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($orderList): ?>
                            <?php foreach ($orderList as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <a href="<?= Url::toRoute(['site/order-item', 'order_list_no' => $value->no]) ?>"><?= $value->no ?></a>
                                    </td>
                                    <td><?= $value->cashier->username ?></td>
                                    <td align="center"><?= $value->quantity ?></td>
                                    <td align="center"><?= $value->discount ?></td>
                                    <td align="center"><?= $value->tax ?></td>
                                    <td align="center"><?= $value->weight ?></td>
                                    <td align="right">Rp. <?= number_format($value->price, 0, '.', ',') ?></td>
                                    <td align="center">
                                        <?php
                                        if ($value->status == 0) {
                                            $status = '<label class="label label-default">' . Yii::t('common', 'Ordered') . '</label>';
                                        } elseif ($value->status == 1) {
                                            $status = '<label class="label label-warning">' . Yii::t('common', 'Checking Order') . '</label>';
                                        } elseif ($value->status == 2) {
                                            $status = '<label class="label label-success">' . Yii::t('common', 'Processing Order') . '</label>';
                                        } elseif ($value->status == 3) {
                                            $status = '<label class="label label-info">' . Yii::t('common', 'Sending Order') . '</label>';
                                        } elseif ($value->status == 4) {
                                            $status = '<label class="label label-success">' . Yii::t('common', 'Order Sent') . '</label>';
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
