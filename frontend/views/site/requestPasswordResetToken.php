<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div class="container">
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <h1><?= Html::encode($this->title) ?></h1>

                <p><?= Yii::t('common', 'Please fill out your email. A link to reset password will be sent there.') ?></p>

                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('common', 'Send'), ['class' => 'btn btn-pink-cake']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
