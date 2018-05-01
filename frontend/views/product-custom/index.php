<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Product Custom');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mar-btm-20 mar-top-20">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('common', 'Product Custom List') ?></h1>
                </div>
                <div class="panel-body">
                    <?php
                    if (Yii::$app->session->hasFlash('product_custom')) {
                        echo '<div class="alert alert-info">' . Yii::$app->session->getFlash('product_custom') . '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <?= Html::beginForm(['cart-pc/put']) ?>
                        <table class="table table-condensed table-striped table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th><?= Yii::t('common', 'Name') ?></th>
                                <th><?= Yii::t('common', 'Created At') ?></th>
                                <th>Order</th>
                                <th>Qty</th>
                                <th>Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($productCustom): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($productCustom as $key => $value): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= date('d-m-Y', strtotime($value->created_at)) ?></td>
                                        <td>
                                            <input type="checkbox" name="product_custom_no[]" value="<?= $value->no ?>">
                                        </td>
                                        <td>
                                            <input type="number" name="qty[<?= $value->no ?>]" value="1" min="1"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <a class="btn btn-pink-cake btn-xs"
                                               href="<?= Url::toRoute(['product-custom/remove', 'no' => $value->no]) ?>"
                                               data-confirm="<?= Yii::t('common', 'Are you sure you want to remove this item?') ?>">&times;</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="6" valign="middle" align="center">
                                        <?= Html::submitButton(Yii::t('common', 'Add to Cart'), ['class' => 'btn btn-pink-cake']) ?>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <h2 align="center"><?= Yii::t('common', 'No Product Custom') ?></h2>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?= Html::endForm() ?>
                    </div>
                </div>

                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('common', 'Product Custom Cart') ?></h1>
                </div>
                <div class="panel-body">
                    <?php
                    if (Yii::$app->session->hasFlash('cartPc')) {
                        echo '<div class="alert alert-info">' . Yii::$app->session->getFlash('cartPc') . '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <?= Html::beginForm(['product-custom/order']) ?>
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
                            <?php if ($cartPc): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($cartPc as $key => $item): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item->getProductCustom()->name ?></td>
                                        <td><?= $item->getProductCustom()->price ?></td>
                                        <td><?= $item->getQuantity() ?></td>
                                        <td><?= $item->getCost() ?></td>
                                        <td>
                                            <a class="btn btn-pink-cake btn-xs" href="<?= Url::toRoute(['cart-pc/remove', 'cart_id' => $key]) ?>" data-confirm="<?= Yii::t('common', 'Are you sure you want to remove this item?') ?>" data-method="post">
                                                &times;
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="6" valign="middle" align="center">
                                        <a class="btn btn-pink-cake" href="<?= Url::toRoute(['cart-pc/save-order']) ?>"><?= Yii::t('common', 'Save Order') ?></a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" valign="middle" align="center">
                                        <strong><?= Yii::t('common', 'No Product') ?></strong>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?= Html::endForm() ?>
                    </div>
                </div>

                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('common', 'Product Custom Order List') ?></h1>
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
                                            <a href="<?= Url::toRoute(['product-custom/order-item', 'order_list_no' => str_replace('/', '-', $value->no)]) ?>" target="_blank"><?= $value->no ?></a>
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
                                                echo Html::a(Yii::t('common', 'Payment Confirm'), ['product-custom/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs']);
                                            } elseif ($value->orderConfirm->status == 1) {
                                                echo Html::a(Yii::t('common', 'Payment Check'), ['product-custom/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs disabled']);
                                            } elseif ($value->orderConfirm->status == 2) {
                                                echo Html::a(Yii::t('common', 'Payment Confirmed'), ['product-custom/order-confirm', 'order_list_no' => str_replace('/', '-', $value->no)], ['class' => 'btn btn-pink-cake btn-xs disabled']);
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

        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= $this->title ?></h1>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('common', 'Name')]) ?>
                    <?= $form->field($model, 'description')->textarea(['placeholder' => Yii::t('common', 'Description')]) ?>
                    <div class="form-group" align="center">
                        <img class="profile-user-img img-responsive img-square"
                             src="<?= Yii::$app->myLibrary->getProductCustomImage($model->image1) ?>"
                             alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb1">
                    </div>
                    <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/3048x3048')) ?>
                    <?php if ($model->image1): ?>
                        <?= $form->field($model, 'removeImage1')->checkbox() ?>
                    <?php endif; ?>
                    <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-pink-cake']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
