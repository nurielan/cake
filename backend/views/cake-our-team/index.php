<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CakeOurTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Cake Our Teams');
$this->params['breadcrumbs'][] = Yii::t('common', 'Cake');
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
        <div class="cake-our-team-index table-responsive">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('common', 'Create Cake Our Team'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'fullname',
                    'username',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'gender',
                        'content' => function ($model) {
                            if ($model->gender == 1) {
                                $gender = '<label class="label label-danger">' . Yii::t('common', 'Male') . '</label>';
                            } elseif ($model->gender == 2) {
                                $gender = '<label class="label label-success">' . Yii::t('common', 'Female') . '</label>';
                            }

                            return $gender;
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
