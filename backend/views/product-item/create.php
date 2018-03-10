<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductItem */

$this->title = Yii::t('common', 'Create Product Item');
$this->params['breadcrumbs'][] = Yii::t('common', 'Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Product Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
        <div class="product-item-create">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
                'productCategory' => $productCategory
            ]) ?>

        </div>
    </section>
    <!-- /.content -->
</div>
