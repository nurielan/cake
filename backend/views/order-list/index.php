<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Order Lists');
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

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'no',
                    /*[
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'cashier',
                        'content' => function ($model) {
                            if ($model->user) {
                                $userFullname = $model->user->userDetail->fullname;
                            } else {
                                $userFullname = Yii::t('common', 'No User');
                            }

                            return $userFullname;
                        }
                    ],*/
                    'cashier',
                    'quantity',
                    'discount',
                    //'discount_price',
                    //'tax',
                    //'tax_price',
                    'weight',
                    'price:currency',
                    //'user_no',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'user_username',
                        'label' => Yii::t('common', 'Customer'),
                        'content' => function ($model) {
                            return $model->user_username;
                        }
                    ],
                    //'user_email:email',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'status',
                        'content' => function ($model) {
                            if ($model->status == 0) {
                                $status = '<label class="label label-default">' . Yii::t('common', 'Ordered') . '</label>';
                            } elseif ($model->status == 1) {
                                $status = '<label class="label label-warning">' . Yii::t('common', 'Checking Order') . '</label>';
                            } elseif ($model->status == 2) {
                                $status = '<label class="label label-success">' . Yii::t('common', 'Processing Order') . '</label>';
                            } elseif ($model->status == 3) {
                                $status = '<label class="label label-info">' . Yii::t('common', 'Sending Order') . '</label>';
                            } elseif ($model->status == 4) {
                                $status = '<label class="label label-success">' . Yii::t('common', 'Order Sent') . '</label>';
                            } elseif ($model->status == 10) {
                                $status = '<label class="label label-danger">' . Yii::t('common', 'Order Rejected') . '</label>';
                            }

                            return $status;
                        }
                    ],
                    [
                        'class' => 'yii\grid\DataColumn',
                        'label' => Yii::t('common', 'Already Paid'),
                        'content' => function ($model) {
                            if ($model->orderConfirm->status == 0) {
                                $status = '<label class="label label-danger">' . Yii::t('common', 'No') . '</label>';
                            } elseif ($model->orderConfirm->status == 1) {
                                $status = '<label class="label label-warning">' . Yii::t('common', 'Check') . '</label>';
                            } elseif ($model->orderConfirm->status == 2) {
                                $status = '<label class="label label-success">' . Yii::t('common', 'Yes') . '</label>';
                            }

                            return $status;
                        }
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',

                    [
                        'class' => 'yii\grid\DataColumn',
                        'label' => Yii::t('common', 'Action'),
                        'content' => function ($model) {
                            if ($model->status == 10) {
                                $url = '<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'unban']) . '"><i class="fa fa-thumbs-up"></i></a>';
                            } elseif ($model->status == 0) {
                                $url = '<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'up']) . '"><i class="fa fa-arrow-circle-up"></i></a>&nbsp;<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'ban']) . '"><i class="fa fa-ban"></i></a>';
                            } elseif ($model->status == 4) {
                                $url = '<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'down']) . '"><i class="fa fa-arrow-circle-down"></i></a>&nbsp;<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'ban']) . '"><i class="fa fa-ban"></i></a>';
                            } else {
                                $url = '<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'down']) . '"><i class="fa fa-arrow-circle-down"></i></a>&nbsp;<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'up']) . '"><i class="fa fa-arrow-circle-up"></i></a>&nbsp;<a href="' . Url::toRoute(['order-list/status', 'no' => str_replace('/', '-', $model->no), 'action' => 'ban']) . '"><i class="fa fa-ban"></i></a>';
                            }

                            return $url;
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn', 'visibleButtons' => ['view', 'delete']],
                ],
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered table-condensed table-hover'
                ]
            ]); ?>
        </div>
    </section>
    <!-- /.content -->
</div>
