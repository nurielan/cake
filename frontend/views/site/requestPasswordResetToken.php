<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="about-cake">
    <div class="container">
        <h2 class="hide">
            &nbsp;
        </h2>
        <div class="site-request-password-reset about-content" style="margin-bottom: 100px;">
            <h1><?= Html::encode($this->title) ?></h1>

            <p><?= Yii::t('common', 'Please fill out your email. A link to reset password will be sent there.') ?></p>

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('common', 'Send'), ['class' => 'btn btn-pink-cake']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
