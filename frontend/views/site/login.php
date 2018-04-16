<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div class="container">
        <div class="row" style="margin-bottom: 100px; margin-top: 50px;">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 align="center"><?= Html::encode($this->title) ?></h1>

                        <p align="center"><?= Yii::t('common', 'Please fill out the following fields to login') ?>:</p>

                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?php //$form->field($model, 'rememberMe')->checkbox() ?>

                        <div style="margin:1em 0">
                            <?= Yii::t('common', 'If you forgot your password you can') ?> <?= Html::a(Yii::t('common', 'Reset Password'), ['site/request-password-reset']) ?>
                            .
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton($this->title, ['class' => 'btn btn-pink-cake', 'name' => 'login-button']) ?>
                        </div>

                        <div class="form-group">
                            <?= Yii::t('common', 'You do not have account yet? Register') ?>&nbsp;<a
                                    href="<?= Url::toRoute(['site/signup']) ?>"><?= Yii::t('common', 'here') ?></a>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
