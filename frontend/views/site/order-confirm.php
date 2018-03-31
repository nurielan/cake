<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Order Confirm');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="checkout-cake">
    <div class="container">
        <div class="product-tittle">
            <img alt="Cake-Purple" src="<?= Url::to('@web/cake/images/cake-purple.png') ?>">
            <h2>
                <?= $this->title ?>
            </h2>
        </div>
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin() ?>
                        <?= $form->field($model, 'via')->textInput(['disabled' => true]) ?>
                        <?= $form->field($model, 'amount')->textInput(['min' => 1, 'type' => 'number']) ?>
                        <?= $form->field($model, 'bank')->textInput(['disabled' => true]) ?>
                        <?= $form->field($model, 'account_number')->textInput() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?= Html::a(Yii::t('common', 'Order List'), ['site/order-list'], ['class' => 'btn btn-pink-cake']) ?>
                            </div>
                            <div class="col-md-6" align="right">
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
