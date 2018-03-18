<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CakeProductItemHighlight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cake-product-item-highlight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_item_no')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
