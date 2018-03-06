<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductBrand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getProductBrandImage($model->image1) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb1">
            <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/1024x1024')) ?>
            <?php if ($model->image1): ?>
                <?= $form->field($model, 'removeImage1')->checkbox() ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getProductBrandImage($model->image2) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb2">
            <?= $form->field($model, 'image2')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 2])->hint(Yii::t('common', 'Image size 9:16/512x1024')) ?>
            <?php if ($model->image2): ?>
                <?= $form->field($model, 'removeImage2')->checkbox() ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getProductBrandImage($model->image3) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb3">
            <?= $form->field($model, 'image3')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 3])->hint(Yii::t('common', 'Image size 1:1/128x128')) ?>
            <?php if ($model->image3): ?>
                <?= $form->field($model, 'removeImage3')->checkbox() ?>
            <?php endif; ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
