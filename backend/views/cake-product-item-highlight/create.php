<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CakeProductItemHighlight */

$this->title = Yii::t('common', 'Create Cake Product Item Highlight');
$this->params['breadcrumbs'][] = Yii::t('common', 'Cake');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Cake Product Item Highlights'), 'url' => ['index']];
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
        <div class="cake-product-item-highlight-create">

            <?= $this->render('_form', [
                'model' => $model,
                'productItem' => $productItem
            ]) ?>

        </div>
    </section>
    <!-- /.content -->
</div>
