<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_list_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_image1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_image2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_image3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_discount')->textInput() ?>

    <?= $form->field($model, 'product_item_discount_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_tax')->textInput() ?>

    <?= $form->field($model, 'product_item_tax_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_type')->textInput() ?>

    <?= $form->field($model, 'product_item_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_item_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_item_weight')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'sub_discount')->textInput() ?>

    <?= $form->field($model, 'sub_discount_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_tax')->textInput() ?>

    <?= $form->field($model, 'sub_tax_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_weight')->textInput() ?>

    <?= $form->field($model, 'sub_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_address_subdistrict')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_subdistrict_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_district_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_province_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_postal_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
