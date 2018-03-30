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
        <div class="product-tittle">
            <img alt="Cake-Purple" src="<?= Url::to('@web/cake/images/cake-purple.png') ?>">
            <h2>
                <?= Yii::t('common', 'Checkout') ?>
            </h2>
        </div>
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'user_address', [])->radioList(ArrayHelper::map($userAddress, 'no', 'name'))->label(Yii::t("common", 'User Address')) ?>
                <?= $form->field($model, 'bank', [])->radioList(ArrayHelper::map($bank, 'id', 'name')) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</section>
