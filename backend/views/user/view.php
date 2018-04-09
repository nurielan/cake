<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User2 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = Yii::t('common', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'User2s'), 'url' => ['index']];
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
        <div class="user2-view">

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
                    'username',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                    'email:email',
                    'image',
                    [
                        'attribute' => 'role',
                        'value' => function ($model) {
                            if ($model->role == 1) {
                                $role = Yii::t('common', 'Super Admin');
                            } elseif ($model->role == 2) {
                                $role = Yii::t('common', 'Admin');
                            } elseif ($model->role == 3) {
                                $role = Yii::t('common', 'Cashier');
                            } elseif ($model->role == 6) {
                                $role = Yii::t('common', 'Customer');
                            }

                            return $role;
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($model, $key) {
                            if ($model->status == 0) {
                                $status = Yii::t('common', 'Non Active');
                            } else {
                                $status = Yii::t('common', 'Active');
                            }

                            return $status;
                        },
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]) ?>

        </div>
    </section>
    <!-- /.content -->
</div>
