<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CakeOurTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cake-our-team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([
        1 => Yii::t('common', 'Male'),
        2 => Yii::t('common', 'Female')
    ], [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control bootstrap-textarea', 'width' => '100%']) ?>

    <img class="profile-user-img img-responsive img-rounded"
         src="<?= Yii::$app->myLibrary->getCakeOurTeamImage($model->image1) ?>"
         alt="<?= $model->fullname . ' (' . $model->fullname . ')' ?>" id="image_thumb1">
    <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/1024x1024')) ?>
    <?php if ($model->image1): ?>
        <?= $form->field($model, 'removeImage1')->checkbox() ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
