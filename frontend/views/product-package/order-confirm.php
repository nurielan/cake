<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Confirm');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="checkout-cake">
    <div class="container">
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <h2 align="center"><?= $this->title ?></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin() ?>
                        <?= $form->field($model, 'order_list_no')->textInput(['disabled' => true]) ?>
                        <?= $form->field($model, 'via')->textInput(['disabled' => true]) ?>
                        <?= $form->field($model, 'bank')->textInput(['disabled' => true]) ?>
                        <?= $form->field($model, 'account_name')->textInput() ?>
                        <?= $form->field($model, 'account_number')->textInput() ?>
                        <?= $form->field($model, 'amount', [
                            'inputTemplate' => '<div class="input-group"><span class="input-group-addon" id="price_addon">Rp</span>{input}</div>'
                        ])->textInput(['min' => 1, 'type' => 'number'])->hint(Yii::t('common', 'Your price order: ') . 'Rp. ' . number_format($orderConfirm->orderList->price, 0)) ?>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= Html::a(Yii::t('common', 'Order List'), ['product-package/index'], ['class' => 'btn btn-pink-cake']) ?>
                            </div>
                            <div class="col-xs-6" align="right">
                                <?= Html::submitButton(Yii::t('common', 'Send'), ['class' => 'btn btn-pink-cake']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
