<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\BlogItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blog_category_no')->dropDownList(ArrayHelper::map($blogCategory, 'no', 'name'), [
        'prompt' => Yii::t('common', 'Select one'),
        'class' => 'form-control select2'
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getBlogItemImage($model->image1) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb1">
            <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/1024x1024')) ?>
            <?php if ($model->image1): ?>
                <?= $form->field($model, 'removeImage1')->checkbox() ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getBlogItemImage($model->image2) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb2">
            <?= $form->field($model, 'image2')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 2])->hint(Yii::t('common', 'Image size 9:16/512x1024')) ?>
            <?php if ($model->image2): ?>
                <?= $form->field($model, 'removeImage2')->checkbox() ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <img class="profile-user-img img-responsive img-square"
                 src="<?= Yii::$app->myLibrary->getBlogItemImage($model->image3) ?>"
                 alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb3">
            <?= $form->field($model, 'image3')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 3])->hint(Yii::t('common', 'Image size 1:1/128x128')) ?>
            <?php if ($model->image3): ?>
                <?= $form->field($model, 'removeImage3')->checkbox() ?>
            <?php endif; ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control bootstrap-textarea', 'width' => '100%']) ?>

    <?= $form->field($model, 'status')->checkbox()->hint(Yii::t('common', 'Active') . '/' . Yii::t('common', 'Non Active')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
