<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Product Custom');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mar-btm-20 mar-top-20">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('common', 'Product Custom List') ?></h1>
                </div>
                <div class="panel-body">
                    <?php
                    if (Yii::$app->session->hasFlash('product_custom')) {
                        echo '<div class="alert alert-info">'. Yii::$app->session->getFlash('product_custom') .'</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <?= Html::beginForm(['product-custom/order']) ?>
                        <table class="table table-condensed table-striped table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order</th>
                                <th><?= Yii::t('common', 'Name') ?></th>
                                <th><?= Yii::t('common', 'Created At') ?></th>
                                <th>Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($productCustom): ?>
                            <?php foreach ($productCustom as $key => $value): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <input type="checkbox" name="product_custom_no[]" value="<?= $value->no ?>">
                                </td>
                                <td><?= $value->name ?></td>
                                <td><?= date('d-m-Y', strtotime($value->created_at)) ?></td>
                                <td align="right">
                                    <a class="btn btn-pink-cake btn-xs" href="<?= Url::toRoute(['product-custom/remove', 'no' => $value->no]) ?>" data-confirm="<?= Yii::t('common', 'Are you sure you want to remove this item?') ?>">&times;</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="5" align="center">
                                    <?= Html::submitButton(Yii::t('common', 'Order'), ['class' => 'btn btn-pink-cake']) ?>
                                </td>
                            </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">
                                        <h2 align="center"><?= Yii::t('common', 'No Product Custom') ?></h2>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?= Html::endForm() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= $this->title ?></h1>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('common', 'Name')]) ?>
                    <?= $form->field($model, 'description')->textInput(['placeholder' => Yii::t('common', 'Description')]) ?>
                    <div class="form-group" align="center">
                        <img class="profile-user-img img-responsive img-square"
                             src="<?= Yii::$app->myLibrary->getProductCustomImage($model->image1) ?>"
                             alt="<?= $model->name . ' (' . $model->name . ')' ?>" id="image_thumb1">
                    </div>
                    <?= $form->field($model, 'image1')->fileInput(['maxlength' => true, 'class' => 'input_images', 'data-no' => 1])->hint(Yii::t('common', 'Image size 1:1/1024x1024')) ?>
                    <?php if ($model->image1): ?>
                        <?= $form->field($model, 'removeImage1')->checkbox() ?>
                    <?php endif; ?>
                    <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-pink-cake']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
