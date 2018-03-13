<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'User2s');
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
        <div class="user2-index table-responsive">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('common', 'Create User2'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'no',
                    'username',
                    'email:email',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'role',
                        'content' => function ($model) {
                            if ($model->role == 1) {
                                $role = '<label class="label label-danger">' . Yii::t('common', 'Super Admin') . '</label>';
                            } elseif ($model->role == 2) {
                                $role = '<label class="label label-warning">' . Yii::t('common', 'Admin') . '</label>';
                            } elseif ($model->role == 3) {
                                $role = '<label class="label label-info">' . Yii::t('common', 'Cashier') . '</label>';
                            } elseif ($model->role == 6) {
                                $role = '<label class="label label-default">' . Yii::t('common', 'Customer') . '</label>';
                            }

                            return $role;
                        }
                    ],
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
                    'created_at:datetime',
                    'updated_at:datetime',

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
