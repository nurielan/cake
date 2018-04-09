<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CakeWhatWeCan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cake-what-we-can-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <img class="profile-user-img img-responsive img-rounded"
         src="<?= Yii::$app->myLibrary->getCakeWhatWeCanImage($model->image1) ?>"
         alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb1">
    <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/1024x1024')) ?>
    <?php if ($model->image1): ?>
        <?= $form->field($model, 'removeImage1')->checkbox() ?>
    <?php endif; ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control bootstrap-textarea', 'width' => '100%']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
