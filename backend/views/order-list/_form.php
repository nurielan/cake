<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\OrderList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cashier', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon fa fa-user-circle" id="cashier_addon"></span>{input}</div>'
    ])->dropDownList(ArrayHelper::map($cashier, 'no', 'username'), [
            'prompt' => Yii::t('common', 'Select one'),
            'aria-describedby' => 'cashier_addon'
    ]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'discount', [
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="discount_addon">%</span></div>'
    ])->textInput(['aria-describedby' => 'discount_addon']) ?>

    <?= $form->field($model, 'tax', [
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="tax_addon">%</span></div>'
    ])->textInput(['aria-describedby' => 'tax_addon']) ?>

    <?= $form->field($model, 'weight', [
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="weight_addon">g/grams</span></div>'
    ])->textInput(['aria-describedby' => 'weight_addon']) ?>

    <?= $form->field($model, 'price', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon" id="price_addon">Rp</span>{input}</div>'
    ])->textInput(['aria-describedby' => 'price_addon']) ?>

    <?= $form->field($model, 'user_no')->dropDownList(ArrayHelper::map($buyer, [
        'prompt' => Yii::t('common', 'Select one'),
    ])) ?>

    <?= $form->field($model, 'user_username')->textInput(['maxlength' => true, 'id' => 'user_username', 'readonly' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true, 'id' => 'user_email', 'readonly' => true]) ?>

    <?= $form->field($model, 'user_image')->textInput(['maxlength' => true, 'id' => 'user_image', 'readonly' => true]) ?>

    <?= $form->field($model, 'user_role')->textInput(['id' => 'user_role', 'readonly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        0 => Yii::t('common', 'Ordered'),
        1 => Yii::t('common', 'Checking Order'),
        2 => Yii::t('common', 'Processing Order'),
        3 => Yii::t('common', 'Sending Order'),
    ], [
        'prompt' => Yii::t('common', 'Select one'),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
