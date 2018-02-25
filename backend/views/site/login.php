<?php

/* @var $this \yii\web\View */

/* @var $content string */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use backend\assets\AdminLteAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

AdminLteAsset::register($this);

$this->title = Yii::t('common', 'Login');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<?php $this->beginBody() ?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl ?>"><b>Admin</b> <?= strtoupper(Yii::$app->name) ?></a>
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
