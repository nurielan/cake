<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="about-cake">
    <div class="container">
        <h2 class="hide">
            &nbsp;
        </h2>
        <div class="site-reset-password about-content" style="margin-bottom: 100px;">
            <h1><?= Html::encode($this->title) ?></h1>

            <p><?= Yii::t('app', 'Please choose your new password') ?>:</p>

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-pink-cake']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
