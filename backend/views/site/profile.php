<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= Yii::t('common', 'User Profile') ?>
        </h1>
        <?= $this->render('@backend/views/layouts/breadcrumb.php') ?>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="<?= Yii::$app->myLibrary->getUserImage(Yii::$app->user->identity) ?>"
                             alt="<?= Yii::$app->user->identity->userDetail->fullname . ' (' . Yii::$app->user->identity->username . ')' ?>">

                        <h3 class="profile-username text-center"><?= Yii::$app->user->identity->userDetail->fullname ?></h3>

                        <p class="text-muted text-center"><?= Yii::$app->user->identity->username ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('common', 'About Me') ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-transgender margin-r-5"></i> <?= Yii::t('common', 'Gender') ?></strong>

                        <p class="text-muted">
                            <?= Yii::$app->myLibrary->getUserGender(Yii::$app->user->identity) ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> <?= Yii::t('common', 'Address') ?></strong>

                        <p class="text-muted">
                            <?php
                            $userAddress = Yii::$app->user->identity->userConfig->userAddress;

                            echo $userAddress->address . ', ' . $userAddress->subdistrict . ', ' . $userAddress->district . ', ' . $userAddress->province . ', ' . $userAddress->postal_code . ', ' . $userAddress->phone_number;
                            ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file margin-r-5"></i> <?= Yii::t('common', 'Description') ?></strong>

                        <p class="text-muted">
                            <?= Yii::$app->user->identity->userDetail->description ?>
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab"><?= Yii::t('common', 'Settings') ?></a></li>
                        <li><a href="#password" data-toggle="tab"><?= Yii::t('common', 'Password') ?></a></li>
                        <li><a href="#address" data-toggle="tab"><?= Yii::t('common', 'Address') ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <?php $form = ActiveForm::begin(['class' => "form-horizontal"]); ?>
                            <?= $form->field($modelPSF, 'username')->textInput(['placeholder' => Yii::t('common', 'Name')]) ?>
                            <?= $form->field($modelPSF, 'email')->textInput(['placeholder' => Yii::t('common', 'E-Mail')]) ?>
                            <?= $form->field($modelPSF, 'fullname')->textInput(['placeholder' => Yii::t('common', 'Fullname')]) ?>
                            <?= $form->field($modelPSF, 'gender')->dropDownList([
                                    1 => Yii::t('common', 'Male'),
                                    2 => Yii::t('common', 'Female')
                            ], [
                                    'prompt' => Yii::t('common', 'Select one')
                            ]) ?>
                            <?= $form->field($modelPSF, 'description')->textarea(['placeholder' => Yii::t('common', 'Description')]) ?>

                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('common', 'Update'), ['class' => 'btn btn-danger']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="password">
                            <?php
                            if (Yii::$app->session->hasFlash('alert-password')) {
                                echo $this->render('@backend/views/layouts/alert.php', ['data' => Yii::$app->session->getFlash('alert-password')]);
                            }
                            ?>
                            <?php $form2 = ActiveForm::begin(['class' => "form-horizontal"]); ?>
                            <?= $form2->field($modelPPF, 'password_hash')->passwordInput(['placeholder' => Yii::t('common', 'Password'), 'class' => 'form-control reveal-password']) ?>
                            <?= $form2->field($modelPPF, 'password_hash2')->passwordInput(['placeholder' => Yii::t('common', 'New Password'), 'class' => 'form-control reveal-password']) ?>
                            <?= $form2->field($modelPPF, 'password_hash3')->passwordInput(['placeholder' => Yii::t('common', 'Repeat New Password'), 'class' => 'form-control reveal-password']) ?>

                            <div class="form-group">
                                <div class="checkbox">
                                    <?= Html::checkbox('reveal-password', false, ['label' => Yii::t('common', 'Reveal Password')]) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('common', 'Update'), ['class' => 'btn btn-danger']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="address">
                            <?php
                            if (Yii::$app->session->hasFlash('alert-config-address')) {
                                echo $this->render('@backend/views/layouts/alert.php', ['data' => Yii::$app->session->getFlash('alert-config-address')]);
                            }
                            ?>
                            <?php $form3_1 = ActiveForm::begin(); ?>
                            <?= $form3_1->field($modelPCAF, 'primary_address')->dropDownList(ArrayHelper::map(\common\models\UserAddress::find()->all(), 'no', 'title'), [
                                'prompt' => Yii::t('common', 'Select one')
                            ]) ?>
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-danger']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>

                            <hr>

                            <?php $form3 = ActiveForm::begin(['class' => "form-horizontal"]); ?>
                            <?= $form3->field($modelPAF, 'title')->textInput(['placeholder' => Yii::t('common', 'Title')]) ?>
                            <?= $form3->field($modelPAF, 'name')->textInput(['placeholder' => Yii::t('common', 'Name')]) ?>
                            <?= $form3->field($modelPAF, 'address')->textInput(['placeholder' => Yii::t('common', 'Address')]) ?>
                            <?= $form3->field($modelPAF, 'subdistrict')->textInput(['placeholder' => Yii::t('common', 'Subdistrict')]) ?>
                            <?= $form3->field($modelPAF, 'district')->textInput(['placeholder' => Yii::t('common', 'District')]) ?>
                            <?= $form3->field($modelPAF, 'province')->textInput(['placeholder' => Yii::t('common', 'Province')]) ?>
                            <?= $form3->field($modelPAF, 'postal_code')->textInput(['placeholder' => Yii::t('common', 'Postal Code')]) ?>
                            <?= $form3->field($modelPAF, 'phone_number')->textInput(['placeholder' => Yii::t('common', 'Phone Number')]) ?>
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('common', 'Add or Update'), ['class' => 'btn btn-danger']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->