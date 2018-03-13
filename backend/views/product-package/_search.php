<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductPackageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-package-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'image1') ?>

    <?php // echo $form->field($model, 'image2') ?>

    <?php // echo $form->field($model, 'image3') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discount_price') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <?php // echo $form->field($model, 'tax_price') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'in_stock') ?>

    <?php // echo $form->field($model, 'out_stock') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'product_item_1') ?>

    <?php // echo $form->field($model, 'product_item_2') ?>

    <?php // echo $form->field($model, 'product_item_3') ?>

    <?php // echo $form->field($model, 'product_item_4') ?>

    <?php // echo $form->field($model, 'product_item_5') ?>

    <?php // echo $form->field($model, 'product_item_6') ?>

    <?php // echo $form->field($model, 'product_item_7') ?>

    <?php // echo $form->field($model, 'product_item_8') ?>

    <?php // echo $form->field($model, 'product_item_9') ?>

    <?php // echo $form->field($model, 'product_item_10') ?>

    <?php // echo $form->field($model, 'custom') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('common', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
