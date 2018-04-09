<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = Yii::t('common', 'Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Product Categories'), 'url' => ['index']];
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
        <div class="table-responsive">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'no',
                    [
                        'attribute' => 'product_brand_no',
                        'value' => function ($model) {
                            if ($model->productBrand) {
                                $productBrandName = $model->productBrand->name;
                            } else {
                                $productBrandName = Yii::t('common', 'No Product Brand');
                            }

                            return $productBrandName;
                        }
                    ],
                    'name',
                    'alias',
                    'image1',
                    'image2',
                    'image3',
                    'description:ntext',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            if ($model->status == 0) {
                                $status = Yii::t('common', 'Non Active');
                            } else {
                                $status = Yii::t('common', 'Active');
                            }

                            return $status;
                        }
                    ],
                    'discount',
                    'discount_price:currency',
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>

        </div>
    </section>
    <!-- /.content -->
</div>
