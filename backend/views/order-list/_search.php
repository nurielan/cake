<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no') ?>

    <?= $form->field($model, 'cashier') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discount_price') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <?php // echo $form->field($model, 'tax_price') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'user_no') ?>

    <?php // echo $form->field($model, 'user_username') ?>

    <?php // echo $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'user_image') ?>

    <?php // echo $form->field($model, 'user_role') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('common', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
