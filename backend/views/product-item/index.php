<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Product Items');
$this->params['breadcrumbs'][] = Yii::t('common', 'Product');
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

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('common', 'Create Product Item'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'no',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'product_category_no',
                        'content' => function ($model) {
                            if ($model->productCategory) {
                                $productCategoryName = Html::a($model->productCategory->name, ['product-brand/view', 'id' => $model->productCategory->id]);
                            } else {
                                $productCategoryName = Yii::t('common', 'No Product Category');
                            }

                            return $productCategoryName;
                        }
                    ],
                    'name',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'status',
                        'content' => function ($model, $key, $index, $column) {
                            if ($model->status == 0) {
                                $status = '<label class="label label-danger">' . Yii::t('common', 'Non Active') . '</label>';
                            } else {
                                $status = '<label class="label label-success">' . Yii::t('common', 'Active') . '</label>';
                            }

                            return $status;
                        }
                    ],
                    'discount',
                    'tax',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'type',
                        'content' => function ($model, $key, $index, $column) {
                            if ($model->type == 1) {
                                $status = '<label class="label label-danger">' . Yii::t('common', 'Real') . '</label>';
                            } elseif ($model->type == 2) {
                                $status = '<label class="label label-warning">' . Yii::t('common', 'Virtual') . '</label>';
                            }

                            return $status;
                        }
                    ],
                    'in_stock',
                    'out_stock',
                    'price:currency',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'weight',
                        'label' => Yii::t('common', 'Weight (g/grams)')
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </section>
    <!-- /.content -->
</div>
