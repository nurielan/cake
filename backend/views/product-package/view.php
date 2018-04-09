<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductPackage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Product Packages'), 'url' => ['index']];
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

        <div class="product-package-view">

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
                    'discount_price',
                    'tax',
                    'tax_price',
                    [
                        'attribute' => 'type',
                        'value' => function ($model) {
                            if ($model->type == 1) {
                                $status = Yii::t('common', 'Real');
                            } elseif ($model->type == 2) {
                                $status = Yii::t('common', 'Virtual');
                            }

                            return $status;
                        }
                    ],
                    'in_stock',
                    'out_stock',
                    'price:currency',
                    'weight',
                    [
                        'attribute' => 'product_item_1',
                        'value' => function ($model) {
                            if ($model->productItem1) {
                                $productItemName = $model->productItem1->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_2',
                        'value' => function ($model) {
                            if ($model->productItem2) {
                                $productItemName = $model->productItem2->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_3',
                        'value' => function ($model) {
                            if ($model->productItem3) {
                                $productItemName = $model->productItem3->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_4',
                        'value' => function ($model) {
                            if ($model->productItem4) {
                                $productItemName = $model->productItem4->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_5',
                        'value' => function ($model) {
                            if ($model->productItem5) {
                                $productItemName = $model->productItem5->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_6',
                        'value' => function ($model) {
                            if ($model->productItem6) {
                                $productItemName = $model->productItem6->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_7',
                        'value' => function ($model) {
                            if ($model->productItem7) {
                                $productItemName = $model->productItem7->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_8',
                        'value' => function ($model) {
                            if ($model->productItem8) {
                                $productItemName = $model->productItem8->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_9',
                        'value' => function ($model) {
                            if ($model->productItem9) {
                                $productItemName = $model->productItem9->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'product_item_10',
                        'value' => function ($model) {
                            if ($model->productItem10) {
                                $productItemName = $model->productItem10->name;
                            } else {
                                $productItemName = Yii::t('common', 'No Product Item');
                            }

                            return $productItemName;
                        }
                    ],
                    [
                        'attribute' => 'custom',
                        'value' => function ($model) {
                            if ($model->custom == 1) {
                                $custom = Yii::t('common', 'Yes');
                            } elseif ($model->custom == 0) {
                                $custom = Yii::t('common', 'No');
                            }

                            return $custom;
                        }
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>

        </div>
    </section>
</div>
<!-- /.content -->
