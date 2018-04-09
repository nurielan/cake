<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <img class="profile-user-img img-responsive img-circle"
             src="<?= Yii::$app->myLibrary->getUserImage($model) ?>"
             alt="<?= $model->username . ' (' . $model->username . ')' ?>" id="image_thumb">
    </div>
    <?php if (Yii::$app->user->identity->image): ?>
        <?= $form->field($model, 'removeImage')->checkbox() ?>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput(['placeholder' => Yii::t('common', 'Image'), 'id' => 'input_image']) ?>

    <?= $form->field($model, 'role')->dropDownList([
        1 => Yii::t('common', 'Super Admin'),
        2 => Yii::t('common', 'Admin'),
        6 => Yii::t('common', 'Customer'),
        3 => Yii::t('common', 'Cashier')
    ], [
        'prompt' => Yii::t('common', 'Select one')
    ]) ?>

    <?= $form->field($model, 'status')->checkbox()->hint(Yii::t('common', 'Active') . '/' . Yii::t('common', 'Non Active')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
