<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_list_no') ?>

    <?= $form->field($model, 'product_item_no') ?>

    <?= $form->field($model, 'product_item_name') ?>

    <?= $form->field($model, 'product_item_alias') ?>

    <?php // echo $form->field($model, 'product_item_image1') ?>

    <?php // echo $form->field($model, 'product_item_image2') ?>

    <?php // echo $form->field($model, 'product_item_image3') ?>

    <?php // echo $form->field($model, 'product_item_discount') ?>

    <?php // echo $form->field($model, 'product_item_discount_price') ?>

    <?php // echo $form->field($model, 'product_item_tax') ?>

    <?php // echo $form->field($model, 'product_item_tax_price') ?>

    <?php // echo $form->field($model, 'product_item_type') ?>

    <?php // echo $form->field($model, 'product_item_description') ?>

    <?php // echo $form->field($model, 'product_item_price') ?>

    <?php // echo $form->field($model, 'product_item_weight') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'sub_discount') ?>

    <?php // echo $form->field($model, 'sub_discount_price') ?>

    <?php // echo $form->field($model, 'sub_tax') ?>

    <?php // echo $form->field($model, 'sub_tax_price') ?>

    <?php // echo $form->field($model, 'sub_weight') ?>

    <?php // echo $form->field($model, 'sub_price') ?>

    <?php // echo $form->field($model, 'user_address_title') ?>

    <?php // echo $form->field($model, 'user_address_name') ?>

    <?php // echo $form->field($model, 'user_address_address') ?>

    <?php // echo $form->field($model, 'user_address_subdistrict') ?>

    <?php // echo $form->field($model, 'user_address_subdistrict_no') ?>

    <?php // echo $form->field($model, 'user_address_district') ?>

    <?php // echo $form->field($model, 'user_address_district_no') ?>

    <?php // echo $form->field($model, 'user_address_province') ?>

    <?php // echo $form->field($model, 'user_address_province_no') ?>

    <?php // echo $form->field($model, 'user_address_postal_code') ?>

    <?php // echo $form->field($model, 'user_address_phone_number') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('common', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
