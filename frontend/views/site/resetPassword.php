<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div class="container">
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <h1><?= Html::encode($this->title) ?></h1>

                <p><?= Yii::t('app', 'Please choose your new password') ?>:</p>

                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-pink-cake']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
