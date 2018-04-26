<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Galleries');
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
        <div class="gallery-index table-responsive">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('common', 'Create Gallery'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'image1',
                        'content' => function ($model, $key, $index, $column) {
                            return Html::img(Yii::$app->myLibrary->getGalleryImage($model->image1), ['height' => 32, 'class' => 'profile-user-img img-responsive img-square']);
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
