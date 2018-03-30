<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CakeProductItemHighlight */

$this->title = Yii::t('common', 'Update Cake Product Item Highlight: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = Yii::t('common', 'Cake');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Cake Product Item Highlights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= Html::encode($this->title) ?>
        </h1>
        <?= $this->render('@backend/views/layouts/breadcrumb.php') ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="cake-product-item-highlight-update">

            <?= $this->render('_form', [
                'model' => $model,
                'productItem' => $productItem
            ]) ?>

        </div>
    </section>
    <!-- /.content -->
</div>