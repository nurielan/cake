<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                            }

                            return $status;
                        }
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',

                    [
                        'class' => 'yii\grid\DataColumn',
                        'label' => Yii::t('common', 'Action'),
                        'content' => function () {
                            return '<a class="btn btn-xs"></a>';
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered table-condensed table-hover'
                ]
            ]); ?>
        </div>
    </section>
    <!-- /.content -->
</div>
