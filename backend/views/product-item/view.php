<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductItem */

$this->title = $model->name;
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

        <div class="product-item-view">

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
                        'attribute' => 'product_category_no',
                        'value' => function ($model) {
                            if ($model->productCategory) {
                                $productCategoryName = $model->productCategory->name;
                            } else {
                                $productCategoryName = Yii::t('common', 'No Product Category');
                            }

                            return $productCategoryName;
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
                    'tax',
                    'tax_price:currency',
                    [
                        'attribute' => 'type',
                        'value' => function ($model) {
                            if ($model->status == 1) {
                                $status = Yii::t('common', 'Real');
                            } else {
                                $status = Yii::t('common', 'Virtual');
                            }

                            return $status;
                        }
                    ],
                    'in_stock',
                    'out_stock',
                    'price:currency',
                    'weight',
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>

        </div>

</div>
</section>
<!-- /.content -->
</div>
