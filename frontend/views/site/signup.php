<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('common', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="about-cake">
    <div class="container">
        <h2 class="hide">
            &nbsp;
        </h2>
        <div class="site-signup about-content" style="margin-bottom: 100px;">
            <h1><?= Html::encode($this->title) ?></h1>

            <p><?= Yii::t('common', 'Please fill out the following fields to signup') ?>:</p>

            <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="col-lg-6">
                    <h3><?= Yii::t('common', 'User') ?></h3>

                    <hr>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'password2')->passwordInput() ?>

                </div>
                <div class="col-lg-6">
                    <h3><?= Yii::t('common', 'User Details') ?></h3>

                    <hr>

                    <?= $form->field($model, 'uDFullname') ?>
                    <?= $form->field($model, 'uDGender')->dropDownList([
                        1 => Yii::t('common', 'Male'),
                        2 => Yii::t('common', 'Female')
                    ], [
                        'prompt' => Yii::t('common', 'Select one')
                    ]) ?>

                    <?= $form->field($model, 'uAAddress') ?>
                    <?= $form->field($model, 'uASubdistrict') ?>
                    <?= $form->field($model, 'uADistrict') ?>
                    <?= $form->field($model, 'uAProvince') ?>
                    <?= $form->field($model, 'uAPostalCode') ?>
                    <?= $form->field($model, 'uAPhoneNumber') ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <?= Html::submitButton(Yii::t('common', 'Signup'), ['class' => 'btn btn-pink-cake', 'name' => 'signup-button']) ?>
                </div>
            </div>
        </div>
    </div>
</section>
