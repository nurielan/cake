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
                <div class="col-lg-6 col-lg-offset-3">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('common', 'Signup'), ['class' => 'btn btn-pink-cake', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
