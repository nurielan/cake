<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ProductPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getProductPackageImage($model->image1) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb1">
            <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/1024x1024')) ?>
            <?php if ($model->image1): ?>
                <?= $form->field($model, 'removeImage1')->checkbox() ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getProductPackageImage($model->image2) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb2">
            <?= $form->field($model, 'image2')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 2])->hint(Yii::t('common', 'Image size 9:16/512x1024')) ?>
            <?php if ($model->image2): ?>
                <?= $form->field($model, 'removeImage2')->checkbox() ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getProductPackageImage($model->image3) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb3">
            <?= $form->field($model, 'image3')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 3])->hint(Yii::t('common', 'Image size 1:1/128x128')) ?>
            <?php if ($model->image3): ?>
                <?= $form->field($model, 'removeImage3')->checkbox() ?>
            <?php endif; ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control bootstrap-textarea', 'width' => '100%']) ?>

    <?= $form->field($model, 'status')->checkbox()->hint(Yii::t('common', 'Active') . '/' . Yii::t('common', 'Non Active')) ?>

    <?= $form->field($model, 'discount', [
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="discount_addon">%</span></div>'
    ])->textInput(['aria-describedby' => 'discount_addon']) ?>

    <?= $form->field($model, 'tax', [
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="tax_addon">%</span></div>'
    ])->textInput(['aria-describedby' => 'tax_addon']) ?>

    <?= $form->field($model, 'type')->dropDownList([
        1 => Yii::t('common', 'Real'),
        2 => Yii::t('common', 'Virtual')
    ], [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'in_stock')->textInput() ?>

    <?= $form->field($model, 'price', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon" id="price_addon">Rp</span>{input}</div>'
    ])->textInput(['aria-describedby' => 'price_addon']) ?>

    <?= $form->field($model, 'weight', [
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="weight_addon">g/grams</span></div>'
    ])->textInput(['aria-describedby' => 'weight_addon']) ?>

    <?= $form->field($model, 'product_item_1')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_2')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_3')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_4')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_5')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_6')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_7')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_8')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_9')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'product_item_10')->dropDownList(ArrayHelper::map($productItem, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
