<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl ?>"><b>Admin</b>CAKE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Yii::t('common', 'Sign in to start your session') ?></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'username', [
                'inputTemplate' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>'
            ])->textInput(['autofocus' => true, 'placeholder' => Yii::t('common', 'Username or E-Mail')]) ?>
        </div>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'password', [
                'inputTemplate' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>'
            ])->passwordInput(['placeholder' => Yii::t('common', 'Password')]) ?>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton($this->title, ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>

        <a href="#"><?= Yii::t('common', 'I forgot my password') ?></a><br>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
