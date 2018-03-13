<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlogCategory */

$this->title = Yii::t('common', 'Update Blog Category: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = Yii::t('common', 'Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Blog Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
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
        <div class="blog-category-update">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </section>
    <!-- /.content -->
</div>
