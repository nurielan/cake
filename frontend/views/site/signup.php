<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12" align="center">
                <h1><?= Html::encode($this->title) ?></h1>

                <p><?= Yii::t('common', 'Please fill out the following fields to signup') ?>:</p>
            </div>
        </div>
        <div class="row" style="margin-bottom: 100px;">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <legend><?= Yii::t('common', 'User') ?></legend>
                        <?= $form->field($model, 'username', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="username_addon"><i class="glyphicon glyphicon-user"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'username_addon', 'autofocus' => true]) ?>

                        <?= $form->field($model, 'email', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="email_addon">@</span></div>'
                        ])->textInput(['aria-describedby' => 'email_addon']) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'password2')->passwordInput() ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <legend><?= Yii::t('common', 'User Details') ?></legend>
                        <?= $form->field($model, 'uDFullname', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uDFullname_addon"><i class="glyphicon glyphicon-user"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uDFullname_addon']) ?>

                        <?= $form->field($model, 'uDGender', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uAAddress_addon"><i class="glyphicon glyphicon-user"></i></span></div>'
                        ])->dropDownList([
                            1 => Yii::t('common', 'Male'),
                            2 => Yii::t('common', 'Female')
                        ], [
                            'prompt' => Yii::t('common', 'Select one')
                        ]) ?>

                        <?= $form->field($model, 'uAAddress', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uAAddress_addon"><i class="glyphicon glyphicon-map-marker"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uAAddress_addon']) ?>
                        <?= $form->field($model, 'uASubdistrict', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uASubdistrict_addon"><i class="glyphicon glyphicon-map-marker"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uASubdistrict_addon']) ?>
                        <?= $form->field($model, 'uADistrict', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uADistrict_addon"><i class="glyphicon glyphicon-map-marker"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uADistrict_addon']) ?>
                        <?= $form->field($model, 'uAProvince', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uAProvince_addon"><i class="glyphicon glyphicon-map-marker"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uAProvince_addon']) ?>
                        <?= $form->field($model, 'uAPostalCode', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uAPostalCode_addon"><i class="glyphicon glyphicon-envelope"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uAPostalCode_addon']) ?>
                        <?= $form->field($model, 'uAPhoneNumber', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" id="uAPhoneNumber_addon"><i class="glyphicon glyphicon-phone"></i></span></div>'
                        ])->textInput(['aria-describedby' => 'uAPhoneNumber_addon']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <?= Html::submitButton(Yii::t('common', 'Signup'), ['class' => 'btn btn-pink-cake', 'name' => 'signup-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
